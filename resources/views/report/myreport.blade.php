{{-- This page display report for Student's Side --}}
@extends('admin.layouts.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Reports</div>

                <div class="card-body">
                 
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          
                          <th scope="col">Date</th>
                          <th scope="col">Counsellor</th>
                          <th scope="col">Counsellor's Feedback</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($reports as $report)
                        <tr>
                         
                          <td>{{$report->date}}</td>
                          <td>{{$report->counsellor->name ?? ''}}</td>
                          <td>{{$report->feedback}}</td>
                        </tr>
                        @empty
                        <td>You have no reports</td>
                        @endforelse
                       
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
