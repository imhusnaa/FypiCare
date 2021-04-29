{{-- This is the main booking page --}}
@extends('admin.layouts.navbar')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

 <!--for datepicker-->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"defer></script>

 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">

<!--for datepicker-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--for datepicker-->

</head>

<body>

<div class="container">
    <div class="row">
        
        <div style="width:800px; margin:0 auto;">
            <h2>Create An Account & Book Appointment</h2>
            
            <div class="mt-5">
               <a href="{{url('/register')}}"> <button class="btn btn-success" style="background-color:#4CAF50">Register as Student</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-secondary">Login</button></a>
            </div>
        </div>
    </div>
    <hr>
<!--Search counsellor-->
<form action="{{url('/booking')}}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header" style="background-color:#a1a3a1">Find Counsellors</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="date" class="form-control" id="datepicker">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit" style="background-color:#4CAF50">Find Counsellors</button>

                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
</form>

    <!--display counsellor-->
    <div class="card">
        <div class="card-body">
            <div class="card-header" style="background-color:#a1a3a1"> Counsellors </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Book</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- check if there is counsellor available on today's date --}}
                       @forelse($counsellors as $counsellor)
                        
                        <tr>
                        <th scope="row">1</th>
                        <td>
                                <img src="{{asset('images')}}/{{$counsellor->counsellor->image}}" width="100px" style="border-radius: 50%;">
                        </td>
                        <td> {{$counsellor->counsellor->name}} </td>
                        <td> {{$counsellor->counsellor->education}}</td>
                        <td>
                            <a href="{{route('create.appointment',[$counsellor->user_id,$counsellor->date])}}"><button class="btn btn-success" style="background-color:#4CAF50">Book Appointment</button></a>
                        </td>
                        </tr>

                        @empty
                        <td>No counsellors available today</td>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<script>
    var dateToday = new Date();
  $( function() {
    $("#datepicker").datepicker({
        dateFormat:"yy-mm-dd",
        showButtonPanel:true,
        numberOfMonths:2,
        minDate:dateToday,
    });
});

  </script>

</body>
</html>
@endsection