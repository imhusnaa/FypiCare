{{-- This is the page to display User's information --}}
@extends('admin.layouts.navbar')

@section('content')

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
    <div class="row ">
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><b>User Profile</b></div>

                <div class="card-body">
                    <p>Name: {{auth()->user()->name}}</p>
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Matric No: {{auth()->user()->matric_no}}</p>
                    <p>Phone Number: {{auth()->user()->phone_number}}</p>
                    <p>Address: {{auth()->user()->address}}</p>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><b>Update Profile</b></div>

                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="post">@csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}">
                            
                        </div>
                        <div class="form-group">
                            <label>Matric No</label>
                            <input type="number" name="matric_no" class="form-control @error('matric_no') is-invalid @enderror" value="{{auth()->user()->matric_no}}">
                            @error('matric_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}">
                            
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}">
                            
                        </div>
                        <div class="form-group">
                            
                            <button class="btn btn-primary" type="submit" style="background-color:#4CAF50;">Update</button>
                            
                        </div>
                            
                        
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><b>Update Image</b></div>
                <form action="{{route('profile.pic')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card-body">
                    {{-- if user does not have image, set as default --}}
                    @if(!auth()->user()->image) 
                    <img src="/images/3Dz1og01c2vXjbjmfTskpLqdVGEB2Qmpg1DLROiR.png" width="120">
                    @else 
                     <img src="/profile/{{auth()->user()->image}}" width="120">
                    @endif
                    <br>
                    <input type="file" name="file" class="form-control" required="">
                    <br>
                     @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-primary" style="background-color:#4CAF50;">Update</button>
                    
                </div>
            </form>
            </div>
        </div>

    </div>
</div>
@endsection