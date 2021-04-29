<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\Booking;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $myappointments = Appointment::latest()->where('user_id',auth()->user()->id)->get();
        
        return view('admin.appointment.index',compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //date n time should be unique, so that same users can't create appt date when already have create one the same date
        $this->validate($request,[
            'date'=>'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'time'=>'required'
        ]);
        $appointment = Appointment::create([
            'user_id'=> auth()->user()->id,
            'date' => $request->date
        ]);
        //store the time one by one
        foreach($request->time as $time){
            Time::create([
                'appointment_id'=> $appointment->id, //latest appt_id is the appt id in our time
                'time'=> $time,
                
            ]);
        }
        return redirect()->back()->with('message','Appointment created for '. $request->date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request $request){
        //get $date from request form or from date appt table
        $date = $request->date;
        //user_id in appt table equal to currently login user an dmatch to current user ID
        $appointment= Appointment::where('date',$date)->where('user_id',auth()->user()->id)->first();
        //if no $appt variable not exist, return user back to the page
        if(!$appointment){
            return redirect()->to('/appointment')->with('errmessage','Appointment time not available for this date');
        }
        //$apptId is simply an appt and id and from apptId can get the time
        $appointmentId = $appointment->id;
        //appt_id and $apptId should match
        $times = Time::where('appointment_id',$appointmentId)->get();

        return view('admin.appointment.index',compact('times','appointmentId','date'));
    }

    public function updateTime(Request $request){
        $appointmentId = $request->appoinmentId; //request apptId from input form index.php
        $appointment = Time::where('appointment_id',$appointmentId)->delete(); //one match, delete the appt
        foreach($request->time as $time){
            Time::create([
                'appointment_id'=>$appointmentId, //store in $pptId
                'time'=>$time,
                'status'=>0 //when time is availabe, user hasn't book the slot
            ]);
        }
        return redirect()->route('appointment.index')->with('message','Appointment time updated!');
    }

    //pass the id to the web
	public function toggleStatus($id)
    {
        $booking  = Booking::find($id);
		// click the same button to toggle status to make 0 and 1 rather than make two routes
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back();

    }
    public function currentStudents(Request $request)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if($request->date){
            $bookings = Booking::latest()->where('date',$request->date)->get();
            return view('admin.appointment.currentstudent',compact('bookings'));
        }
        $bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
        return view('admin.appointment.currentstudent',compact('bookings'));
    }

    public function allStudents()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('admin.appointment.allstudent',compact('bookings'));
    }
}
