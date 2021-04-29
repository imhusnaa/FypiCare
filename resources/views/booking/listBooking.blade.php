@extends('admin.layouts.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your appointments({{$appointments->count()}})</div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Counsellor</th>
                          <th scope="col">Time</th>
                          <th scope="col">Book Date</th> 
                          <th scope="col">Created date</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- get from frontend --}}
                        @forelse($appointments as $key=>$appointment)
                        <tr>
                        {{-- increase numbering --}}
                          <th scope="row">{{$key+1}}</th>
                          {{-- get from Booking.php which retrieved in DB --}}
                          <td>{{$appointment->counsellor->name}}</td>
                          <td>{{$appointment->time}}</td>
                          <td>{{$appointment->date}}</td>
                          <td>{{$appointment->created_at}}</td>
                          <td>
                              @if($appointment->status==0)
                              <button class="btn btn-primary" style="background-color:#bb3f1a;">Absence</button>
                              @else 
                              <button class="btn btn-success" style="background-color:#4CAF50;">Attend</button>
                              @endif
                          </td>
                        </tr>
                        @empty
                        <td>You have no any appointments</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
