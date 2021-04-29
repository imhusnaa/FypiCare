@extends('admin.layouts.navbar')

@section('content')

<body> 
<div class="card text-center" style="background-color:#c8cfc8">
<h1>DASS Test Calculator</h1>
</div>

<div class="row">
        <div class="col-md-3 m-auto">
            @if(session('message'))
            <div class="alert alert-warning">
                <h1 class="text-center">{{session('message')}}</h1>
            </div>
            @endif
        </div>
    </div>

<form form="result" class="new" method="POST" action ="result" enctype="multipart/form-data">@csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">1.</span> I found it hard to wind down.</p>
                    <select name="a1">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center" >
                <div class="card-body">
                    <p class="card-text">2.</span> I was aware of dryness of my mouth.</p>
                    <select name="a2">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">3.</span> I couldn’t seem to experience any positive feeling at all.</p>
                    <select name="a3">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center" >
                <div class="card-body">
                    <p class="card-text">4.</span> I experienced breathing difficulty.</p>
                    <select name="a4">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">5.</span> I found it difficult to work up the initiative to do things.</p>
                    <select name="a5">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">6.</span> I tended to over-react to situations.</p>
                    <select name="a6">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">7.</span> I experienced trembling (eg, in the hands).</p>
                    <select name="a7">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">8.</span> I felt that I was using a lot of nervous energy.</p>
                    <select name="a8">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">9.</span> I was worried about situations in which I might panic and make a fool of myself.</p>
                    <select name="a9">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">10.</span> I felt that I had nothing to look forward to.</p>
                    <select name="a10">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">11.</span> I found myself getting agitated.</p>
                    <select name="a11">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center" >
                <div class="card-body">
                    <p class="card-text">12.</span> I found it difficult to relax.</p>
                    <select name="a12">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">13.</span> I felt down-hearted and blue.</p>
                    <select name="a13">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center" >
                <div class="card-body">
                    <p class="card-text">14.</span> I was intolerant of anything that kept me from getting on with what I was doing.</p>
                    <select name="a14">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">15.</span> I felt I was close to panic.</p>
                    <select name="a15">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">16.</span> I was unable to become enthusiastic about anything.</p>
                    <select name="a16">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">17.</span> I felt I wasn’t worth much as a person.</p>
                    <select name="a17">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">18.</span> I felt that I was rather touchy.</p>
                    <select name="a18">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">19.</span> I was aware of the action of my heart in the absence of physical exertion.</p>
                    <select name="a19">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
                </div>
            </div>
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">20.</span> I felt scared without any good reason.</p>
                    <select name="a20">
                        <option value="0" selected>Never (0 points)</option>
                         <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                        </select><br><br>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-6">
                <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">21.</span> I felt that life was meaningless.</p>
                    <select name="a21">
                        <option value="0" selected>Never (0 points)</option>
                        <option value="1">Sometimes (1 point)</option>
                        <option value="2">Often (2 points)</option>
                        <option value="3">Almost always (3 points)</option>            
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text"><br>
                    {{-- <input class="btn btn-primary" type="submit" value="Calculate">
                    <input class="btn btn-primary" type="reset" value="Reset"> --}}
                    <br>     
                        <input class="calculating" type="submit" name="submit" value="Calculate" style="background-color:#4CAF50"/>
                        <input class="resetting" type="button" value="Reset" onclick="rst1()" style="background-color:#4CAF50"/>
                        <div id="errordiv"></div>
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