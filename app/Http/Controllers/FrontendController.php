<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Models\Report;
use App\Mail\AppointmentMail;

class FrontendController extends Controller
{
    public function index(){
        date_default_timezone_set('Asia/Kuala_Lumpur');
        //date come from the form frm welcome.php
        if(request('date')){
            $counsellors = $this->findCounsellorsBasedOnDate(request('date'));
            return view('booking',compact('counsellors'));
        }
        $counsellors = Appointment::where('date',date('Y-m-d'))->get();
    	return view('booking',compact('counsellors'));
    }

    public function show($counsellorId, $date){
        //user_id should match with $counsellorId and get first record
        $appointment = Appointment::where('user_id',$counsellorId)->where('date', $date)->first();
        //frm counsellorId will get times retrieved from apptId in DB, status 0 means times has not booked
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user =  User::where('id', $counsellorId)->first();
        $counsellor_id = $counsellorId;
    return view('appointment', compact('times', 'date', 'user', 'counsellor_id'));

    }

    public function findCounsellorsBasedOnDate($date)
    {
        // date is coming from welcome.php from input type
        $counsellors = Appointment::where('date',$date)->get();
        return $counsellors ;
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        //must select time
        $request->validate(['time'=>'required']); 
        //if it is true or has being booked, give the message. If not exist, create new booking
        $check=$this->checkBookingTimeInterval();
        if($check){
            return redirect()->back()->with('errmessage','You have already booked an appointment. Please book another appointment');
        }
        //store in Db table
        Booking::create([
            'user_id' => auth()->user()->id,
            'counsellor_id' => $request->counsellorId,
            'time' => $request->time,  //from time form in appt.blade
            'date'=> $request->date,
            'status'=>0
        ]);
        //appt_id from times table and request apptId from form and specify what time to update from 0 to 1(booked)
        Time::where('appointment_id',$request->appointmentId)
            ->where('time',$request->time)
            ->update(['status'=>1]);
        //send email notification
        $counsellorName = User::where('id',$request->counsellorId)->first();
        $mailData = [
                'name'=>auth()->user()->name,
                'time'=>$request->time,
                'date'=>$request->date,
                'counsellorName' => $counsellorName->name
    
            ];
        try{
            //send to user to make appt n pass array of mail data to ApptMail
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
 
         }catch(\Exception $e){
 
         }
        return redirect()->back()->with('message','Your appointment was booked');
     
    }
    // check student has make booking on the date
    public function checkBookingTimeInterval()
    {
        //to get latest booking, if both conditions true, it is exist
        return Booking::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->whereDate('created_at',date('Y-m-d'))
            ->exists();
    }
    public function myBookings()
    {
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        //pass all appointments
        return view('booking.listBooking',compact('appointments'));
    }
    public function myReport()
    {
        $reports = Report::where('user_id',auth()->user()->id)->get();
        return view('report.myreport',compact('reports'));
    }
}
