<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('dist/css/custom.css')}}" rel="stylesheet">

  

 
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{asset('logo/logo iCare.png')}}" class="header-brand-img" style="border-radius: 50%; width:3.5em; height:auto;"> 
     iCare
  </a>
    <div class="container">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">HOME<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dass">DASS TEST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/booking">BOOKING</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact">CONTACT US</a>
          </li>
      </ul>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            @if(auth()->check()&& auth()->user()->role->name === 'student')
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('my.booking') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Bookings') }}</a>                
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/chat" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Message') }}</a>     
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('my.report') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Reports') }}</a>     
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/streaming') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('Video Meeting') }}</a>     
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/chat') }}" style="color:green; font-size:16px; font-weight: bold;">{{ __('Chatting') }}</a>     
                </li>
                
            @endif

            @if(auth()->check()&& auth()->user()->role->name === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Dashboard') }}</a>     
                </li>
            @endif

            @if(auth()->check()&& auth()->user()->role->name === 'counsellor')
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard" style="color:green; font-size:16px; font-weight: bold;">{{ __('My Dashboard') }}</a>     
                </li>
            @endif

            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        {{-- <a class="nav-link" href="/chat" style="color:green; font-size:16px; font-weight: bold;">{{ __('Chat') }}</a> --}}
                        <a class="nav-link" href="/user-profile" style="color:green; font-size:16px; font-weight: bold;">{{ __('User Profile') }}</a>
                        
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>
</nav>

<main class="py-4">
@yield('content')
</main>
</div>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ asset('dist/js/jquery.min.js') }}"></script>

<script>
var rec_id = '';
var authuser_id = "{{ Auth::id() }}";


$(document).ready(function () {

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('08cd7d86afe2cd7f7220', {
cluster: 'ap1',
forceTLS: true
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
alert(JSON.stringify(data));

if(authuser_id == data.sender) {
//alert('authuseridsender');
$('#' + data.receiver).click();

} else if (authuser_id == data.receiver) {
if (rec_id == data.sender) {
 // if receiver is selected, reload the selected user ...
 $('#' + data.sender).click();
} else {
 // if receiver is not seleted, add notification for that user
 var pendmess = parseInt($('#' + data.sender).find('.pendingmessages').html());
  

  if(pendmess) {
     $('#' + data.sender).find('.pending').html(pendmess + 1);
  } else {
      $('#' + data.sender).append('<span class="pendingmessages">1</span>');
  }


}
}

});

$('.oneuser').click(function(){

    $('.oneuser').removeClass('active');
    $(this).addClass('active');

    rec_id = $(this).attr('id');

    // alert(rec_id)

 
    $.ajax({
    type: "get",
    url: "communicationmessage/" + rec_id, 
    data: "",
    cache: false,
    success: function (data) {              
        $('#communicationmessages').html(data);

        rooltobotttom();
    }
})

});

$(document).on('keyup','.input-text input',function (e){
    var communicationmessage = $(this).val();
    if(e.keyCode==13 && communicationmessage != " && rec_id !="){
        $(this).val('');
        var datareceive = "rec_id=" + rec_id + "&communicationmessage=" + communicationmessage;

        $.ajax({
        type: "post",
        url: "communicationmessage", // need to create this post route
        data: datareceive,
        cache: false,
        success: function (data) {

        },
        error: function (jqXHR, status, err) {
        },
        complete: function () {
           rooltobotttom(); 
        }

        })

    }
});

});

        // make a function to scroll down auto
        function rooltobotttom() {
        $('.communicationmessage-wrapper').animate({
            scrollTop: $('.communicationmessage-wrapper').get(0).scrollHeight
        }, 50);
        }

</script>

<style type="text/css">
    
    label.btn{
        padding: 0;
    }
    label.btn input{
        opacity: 0; 
        position: absolute;
    }
    label.btn span{
        text-align: center; 
        padding: 6px 12px; 
        display: block;
        min-width: 80px;
    }
    label.btn input:checked+span{
        background-color:green; 
        color: #fff;
    }
  
</style>
</body>
</html>
