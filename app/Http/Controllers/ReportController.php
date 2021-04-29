<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Kuala_Lumpur');
        //status 1 means student attend the session and will only get student who booked for that counsellor
		$bookings =  Booking::where('date',date('Y-m-d'))->where('status',1)->where('counsellor_id',auth()->user()->id)->get();
		return view('report.index',compact('bookings'));
    }

    public function store(Request $request)
    {
    	$data  = $request->all();
        // dd($data);
    	Report::create($data);
    	return redirect()->back()->with('message','Report created');
    }

    public function show($userId,$date)
    {
        //grab matching record/report
        $report = Report::where('user_id',$userId)->where('date',$date)->first();
        return view('report.show',compact('report'));
    }

    //get all students from report table
    public function studentsFromReport()
    {
        $students = Report::get();
        return view('report.all',compact('students'));
    }

    // public function allAppointment()
    // {
    //     $bookings = Booking::latest()->paginate(20);
    //     return view('report.appointment',compact('bookings'));
    // }
    
    public function filterStudent(Request $request)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if($request->date){
            $bookings = Booking::latest()->where('date',$request->date)->get();
            return view('report.appointment',compact('bookings'));
        }
        $bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
        return view('report.appointment',compact('bookings'));
    }
}
