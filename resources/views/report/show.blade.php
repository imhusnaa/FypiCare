@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
                <div class="card-header" >                     
                  </div>
  
                  <div class="card-body">
                      <p>Date:{{$report->date}}</p>
                      <p>Student:{{$report->user->name ?? ''}}</p>
                      <p>Counsellor:{{$report->counsellor->name ?? ''}}</p>
                      <p>Report:{{$report->feedback}}</p>
                      <p>Counsellor's signature:{{$report->signature}}</p>
                     
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endsection
  