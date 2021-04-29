{{-- This is the page where students can choose time slots--}}

@extends('admin.layouts.navbar')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Counsellor Information</h4>
                    <img  src="{{asset('images')}}/{{$user->image}}" width="100px" style="border-radius: 50%;" >
                    <p class="lead"> Name: {{ucfirst($user->name)}}</p>
                    <p class="lead"> Email: {{$user->email}}</p>
                    <p class="lead"> Specialization: {{$user->education}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            {{-- validate if time has choosen --}}
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
            @endif
            <form action="{{route('booking.appointment')}}" method="post">@csrf
            <div class="card">
                {{-- retrived date from Frontend --}}
                <div class="card-header lead">{{$date}}</div>                   
                    <div class="card-body">
                        <div class="row">
                            @foreach($times as $time)
                            <div class="col-md-3">
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="{{$time->time}}">
                                    {{-- get time from time table --}}
                                    <span>{{$time->time}}</span> 
                                </label>
                            </div>
                            {{-- send request to frontend.php controller--}}
                            <input type="hidden" name="counsellorId" value="{{$counsellor_id}}">
                            {{-- update time schedule if student has book by get id from appt table and apptid from time table --}}
                            <input type="hidden" name="appointmentId" value
                            ="{{$time->appointment_id}}">
                            <input type="hidden" name="date" value
                            ="{{$date}}"> 

                            @endforeach
                        </div>
                    </div>
            </div>
                <div class="card-footer">
                    @if(Auth::check())
                    <button type="submit" class="btn btn-success" style="width: 20%;background-color:#4CAF50;">Book Appointment</button>
                    @else 
                        <p>Please login to book an appointment</p>
                         <a href="/register">
                            <input type="button" value="Register" style="background-color:#4CAF50"/>
                         </a>
                         <a href="/login">
                            <input type="button" value="Login" style="background-color:#4CAF50"/>
                         </a>
    
                    @endif                   
                </div>
        </div>
            </form>
    </div>
</div>


@endsection