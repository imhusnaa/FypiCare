@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Counsellors/Admins</h5>
                    <span>Update User</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Counsellor/Admins</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">

        @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
        @endif

        <div class="card">
            <div class="card-header"><h3>Add Counsellor/Admins</h3></div>
            <div class="card-body">
                <form class="forms-sample" action="{{route('counsellor.update', [$user->id])}}" method="post" enctype="multipart/form-data" >@csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Full name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder="counsellor name">
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-lg-6">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{$user->phone_number}}" placeholder="phone number">
                            
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="col-lg-6">
                            <label for="">Counsellor ID</label>
                            <input type="number" name="counsellor_id" class="form-control @error('counsellor_id') is-invalid @enderror" value="{{$user->counsellor_id}}" placeholder="counsellor/admin ID">

                            @error('counsellor_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-lg-6">
                            <label for="">Specialization</label>
                            <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" value="{{$user->education}}" placeholder="specialization">

                            @error('education')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="col-lg-6">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" placeholder="email">
                        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="col-lg-6">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Image</label>
                                    {{-- <input type="file" name="img[]" class="file-upload-default"> --}}                         
                                    <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror" placeholder="Upload Image" name="image">
                                    <span class="input-group-append">
                                    </span>
                            </div>
                        </div>

                            <div class="col-md-6">
                                    <label>Role</label>
                                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                    <option value="">Please select role</option>

                                    @foreach(App\Models\Role::where('name','!=','student')->get() as $role)
                                    {{-- to get the previous choice selected --}}
                                    <option value="{{$role->id}}"@if($user->role_id==$role->id)selected @endif>{{$role->name}}</option>
                                    {{$role->name}}</option>
                                    @endforeach

                                    </select>

                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>

                        <button type="submit" class="btn btn-primary mr-2" style="background-color:#4CAF50">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection