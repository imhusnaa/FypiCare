@extends('admin.layouts.navbar')
@section('content')

<div class="header" style="background-color:#c8cfc8">
    <h1>Contact Us</h1>
</div><br>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-user">
       <div class="card-body">
          @if(Session::has('success'))
             <div class="alert alert-success">
             {{ Session::get('success') }}
              </div>
          @endif
          
         <form method="post" action="contact">
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label> Name </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label> Email </label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>   
            <div class="col-md-12">
               <div class="form-group">
                  <label> Phone Number </label>
                  <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number">
                  @error('phone_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
             <div class="col-md-12">
                <div class="form-group">
                  <label> Subject </label>
                  <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject">
                  @error('subject')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
             <div class="col-md-12">
               <div class="form-group">
                  <label> Message </label>
                  <textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Message" name="message"></textarea>
                  @error('message')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
             <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round" style="background-color:green;">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
    body {
      margin: 0;
      width: 100%;
      max-width: 1024px;
	    margin-right: auto; 
	    margin-left: auto; 
    }
    
    /* Style the header */
    .header {
      background-color: #f1f1f1d7;
      padding: 20px;
      text-align: center;
    }
    .column {
    float: left;
    width: 33.33%;
    padding: 15px;
    text-align: justify;
    }
    .columnn {
    float: left;
    width: 50%;
    padding: 10px;
    height: auto; /* Should be removed. Only for demonstration */
    }
    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
    </style>
@endsection