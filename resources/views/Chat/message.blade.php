@extends('admin.layouts.navbar')

@section('content')
{{-- <link href="{{asset('dist/css/custom.css')}}" rel="stylesheet"> --}}
<div class="container">
    <h4>CHATTING ROOM</h4>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="displayuser-wrapper">

                <ul class="displayusers">
                    @foreach($users as $user)

                    <li class="oneuser" id="{{ $user->id }}">
                        <span class="pendingmessages"></span>

                        @if($user->unread)
                        <span class="pendingmessages">{{ $user->unread }}</span>
                        @endif

                        <div class="starmedia">
                            <div class="starmedia-left">
                            <img src={{$user->image}} alt="" class="media-objects">
                        </div>

                            <div class="starmedia-body">
                                <p class="name">{{ $user->name }}</p>
                                <p class="mail">{{ $user->email }}</p>
                            </div>
                        </div>
                    </li>

                    @endforeach

                </ul>

            </div>
        </div>

        <div class="col-md-8" id="communicationmessages">
           
        </div>

    </div>
</div>
@endsection
