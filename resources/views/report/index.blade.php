{{-- This page will display reports --}}
@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="card-header"> 
                     Appointment ({{$bookings->count()}})
                 </div>
           
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Matric No</th>

                          <th scope="col">Time</th>
                          <th scope="col">Counsellor</th>
                          <th scope="col">Status</th>
                          <th scope="col">Report</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;">
                          </td>
                          <td>{{$booking->date}}</td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{$booking->user->matric_no}}</td>
                          <td>{{$booking->time}}</td>
                          <td>{{$booking->counsellor->name}}</td>
                          <td>
                            @if($booking->status==1)
                            Attend
                            @else
                            Absence
                            @endif
                          </td>
                          <td>
                            @if(!App\Models\Report::where('date',date('Y-m-d'))->where('counsellor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}" style="background-color:#4CAF50;">
                                Write Report
                            </button>
                            @include('report.form')

                            @else 
                            <a href="{{route('report.show',[$booking->user_id,$booking->date])}}" class="btn btn-secondary">View report</a>
                            @endif

                          </td>
                        </tr>
                        @empty
                        <td>There is no any appointments !</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
