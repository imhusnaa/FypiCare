<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class StudentlistController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        if($request->date){
            $bookings = Booking::latest()->where('date',$request->date)->get();
            return view('studentlist.index',compact('bookings'));
        }
        $bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
        return view('studentlist.index',compact('bookings'));
    }

    public function allTimeAppointment()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('studentlist.all',compact('bookings'));
    }
}
