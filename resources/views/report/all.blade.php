{{-- This page will display all Students' reports --}}
@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> 
                     Appointment ({{$students->count()}})
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
                        @forelse($students as $key=>$student)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$student->user->image ?? ''}}" width="80" style="border-radius: 50%;">
                          </td>
                          <td>{{$student->date}}</td>
                          <td>{{$student->user->name ?? ''}}</td>
                          <td>{{$student->user->email ?? ''}}</td>
                          <td>{{$student->user->phone_number ?? ''}}</td>
                          <td>{{$student->user->matric_no ?? ''}}</td>
                          <td>{{$student->time}}</td>
                          <td>{{$student->counsellor->name ?? ''}}</td>
                          <td>
                            @if($student->status==1)
                            Present
                            @else
                            Absent
                            @endif
                          </td>
                          <td>                         
                            <a href="{{route('report.show',[$student->user_id,$student->date])}}" class="btn btn-secondary">View report</a>
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
