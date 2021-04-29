@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
           

            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Counsellors Appoinment Time</h5>
                    
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Counsellor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="container">
         @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
                
            </div>
                
        @endforeach
    
        
    <form action="{{route('appointment.store')}}" method="post">@csrf
 
    <div class="card">
        <div class="card-header">
            Choose date

        </div>
        <div class="card-body">
         <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Choose AM time
           <span style="margin-left: 700px">Check/Uncheck
                {{-- get multiple time to check --}}
               <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked" >
           </span>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
             
               
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><input type="checkbox" name="time[]"  value="9am">9am</td>
                  <td><input type="checkbox" name="time[]"  value="9.30am">9.30am</td>
                </tr>
                 <tr>
                  <th scope="row">2</th>
                  <td><input type="checkbox" name="time[]"  value="10am">10am</td>
                  <td><input type="checkbox" name="time[]"  value="10.30am">10.30am</td>
                </tr>
                 <tr>
                  <th scope="row">3</th>
                  <td><input type="checkbox" name="time[]"  value="11am">11am</td>
                  <td><input type="checkbox" name="time[]"  value="11.30am">11.30am</td>
                </tr>         
              </tbody>
            </table>
        </div>
    </div>

        <div class="card">
        <div class="card-header">
            Choose PM time
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
             
               
              <tbody>
                <tr>
                  <th scope="row">4</th>
                  <td><input type="checkbox" name="time[]"  value="2pm">2pm</td>
                  <td><input type="checkbox" name="time[]"  value="2.30pm">2.30pm</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td><input type="checkbox" name="time[]"  value="3pm">3pm</td>
                  <td><input type="checkbox" name="time[]"  value="3.30pm">3.30pm</td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td><input type="checkbox" name="time[]"  value="4pm">4pm</td>
                  <td><input type="checkbox" name="time[]"  value="4.30pm">4.30pm</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary" style="background-color:#4CAF50">Submit</button>
        </div>
    </div>
    </form>

</div>

<style type="text/css">
    input[type="checkbox"]{
        zoom:1.1;
   
    }
    body{
        font-size: 18px;
    }
</style>

@endsection