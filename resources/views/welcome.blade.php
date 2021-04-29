@extends('admin.layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iCare</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="header" style="background-color:#c8cfc8">
            <h1>Welcome to <b>iCare!</b></h1>
        </div><br>
        
          <div class="card text-center">
            <div class="card-body">
              <h3 class="card-title">ABOUT US</h3>
                <p class="card-text"><p><b>IIUM Counselling Appointment and Remedy System</b>, a better place to talk
                  and easy to reach your counsellors.
                  iCare ease students to book appointments 
                  with counsellors at their preferred time. iCare dedicates to improve 
                  mental wellbeing of students in struggle time with a conducive environment.</p>
                  <p><b>Our concern:</b> Choose, assist, recommend and encourage.</p>
                  <p><b>Our purpose:</b> To ease the booking process which allows two ways of communication among counsellors and students.</p>
                  <p><b>Our hope: </b>To help students’ gain support and sufficient knowledge of mental health.
                  </p>
            </div>
          </div>
        
          <div class="row">
          <div class="col-sm-6">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-text">MAKE YOUR APPOINTMENT</h3><br>
 
                <p>We provide you a better place to talk
                and ease to reach counsellors. Book at your own convenient time</p>
                
                <button class="btn btn-primary" style="background-color:green"><a href="/booking">Book Now</a>
                </button>
                                         
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title">MEASURE YOUR MENTAL HEALTH</h3><br>
                <p>We provide you a Depression Anxiety Stress Scale (DASS) to 
                    measure your emotional states .                                      
                </p>
                    <button class="btn btn-primary" style="background-color:green"><a href="/dass">Test Now</a>
                    </button>
              </div>
            </div>
          </div>
        
          <div class="card text-center" style="background-color:#c8cfc8">
            <div class="card-body">
              <h4> MENTAL HEALTH MYTHS AND FACTS</h4>
            </div>
          </div>
        
          <div class="row">
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                  <p class="card-text"><b>Myth:</b> There is no hope for people with mental health problems. 
                    Once a friend or family member develops mental health problems, he or she will never recover.</p>
                  <p class="card-text"><b>Fact:</b> Studies show that people with mental health problems get better and 
                    many recover completely. Recovery refers to the process in which people are 
                    able to live, work, learn, and participate fully in their communities. 
                    There are more treatments, services, and community support systems than ever
                    before, and they work.</p><br>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                  <p class="card-text"><b>Myth: </b> People with mental health problems are violent and unpredictable.
                  <p class="card-text"><b>Fact: </b>
                    The vast majority of people with mental health problems are no more likely to be 
                    violent than anyone else. Most people with mental illness are not violent and only 
                    3%–5% of violent acts can be attributed to individuals living with a serious mental 
                    illness. In fact, people with severe mental illnesses are over 10 times more likely 
                    to be victims of violent crime than the general population. You probably know someone
                    with a mental health problem and don't even realize it, because many people with 
                    mental health problems are highly active and productive members of our communities.
                </div>
              </div>
          </div>
        
          <div class="card text-center" style="background-color:#c8cfc8">
            <div class="card-body">
              <h4> SELF-CARE TREATMENT</h4>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-6">
              <div class="card text-center">
              <div class="card-body">
                  <p class="card-text">​<b>Mental Self-Care</b>
                  <p class="card-text"><p> Mental self-care includes doing things that keep your mind sharp, like puzzles, or learning about a subject 
                          that fascinates you. You might find reading books or watching movies that inspire 
                          you fuels your mind. Here are a few questions to consider when you think about your mental self-care: </p></li>
                      <ul>
                      <li>Are you making enough time for activities that mentally stimulate you?</li>
                      <li>Are you doing proactive things to help you stay mentally healthy?</li></ul>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                  <p class="card-text"><b>Social Self-Care</b>
                  <p class="card-text"><p> Close connections are important to your well-being. The best way to cultivate and maintain close relationships 
                          is to put time and energy into building your relationships with others. Ask yourself:</p> </li>
                      <ul>
                      <li>Are you getting enough face-to-face time with your friends?</li>
                      <li>What are you doing to nurture your relationships with friends and family?</li></ul><br>
                </div>
              </div>
          </div>
        
          <div class="row">
            <div class="col-sm-6">
              <div class="card text-center">
              <div class="card-body">
                  <p class="card-text">​<b>Physical Self-Care</b>
                  <p class="card-text"><p>How you're fueling your body, how much sleep you're getting, how much physical activity you are doing, 
                          and how well you're caring for your physical needs. Ask yourself the following questions to assess whether there might be some areas you need to improve: </p></li>
                      <ul>
                      <li>Are you getting adequate sleep?</li>
                      <li>Is your diet fueling your body well?</li>
                      <li>Are you taking charge of your health?</li>
                      <li>Are you getting enough exercise?</li></ul>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card text-center">
                <div class="card-body">
                  <p class="card-text"><b>Spiritual Self-Care</b>
                  <p class="card-text"><p> Nurturing your spirit, however, doesn't have to involve religion. It can involve anything that helps you develop a deeper sense of meaning, understanding, or connection with the universe.5﻿
                          Whether you enjoy meditation, attending a religious service, or praying, spiritual self-care is important.
                          As you consider your spiritual life, ask yourself: </p></li>
                      <ul>
                      <li>What questions do you ask yourself about your life and experience?</li>
                      <li>Are you engaging in spiritual practices that you find fulfilling?</li><br>
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
    </body>
</html>
@endsection
