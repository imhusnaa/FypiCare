<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', 'App\Http\Controllers\ChatController@index');
Route::get('/communicationmessage/{id}', 'App\Http\Controllers\ChatController@receivemessage')->name('communicationmessage');
Route::post('/communicationmessage', 'App\Http\Controllers\ChatController@sendmessage');
Route::get('/dass', 'App\Http\Controllers\TestController@index');
Route::post('result', 'App\Http\Controllers\TestController@calculate');
Route::get('/booking', 'App\Http\Controllers\FrontendController@index');
Route::get('contact', 'App\Http\Controllers\ContactController@getContact');
Route::post('contact', 'App\Http\Controllers\ContactController@saveContact');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/video-chat', function () {
        // fetch all users apart from the authenticated user
        $users = User::where('id', '<>', Auth::id())->get();
        return view('video-chat', ['users' => $users]);
    });


    // WebRTC Group Call Endpoints
    // Initiate Stream, Get a shareable broadcast link
    Route::get('/streaming', 'App\Http\Controllers\WebrtcStreamingController@index');
    Route::get('/streaming/{streamId}', 'App\Http\Controllers\WebrtcStreamingController@consumer');
    Route::post('/stream-offer', 'App\Http\Controllers\WebrtcStreamingController@makeStreamOffer');
    Route::post('/stream-answer', 'App\Http\Controllers\WebrtcStreamingController@makeStreamAnswer');
});

Auth::routes();
// Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','admin']],function(){
    Route::resource('counsellor', App\Http\Controllers\CounsellorController::class);
    Route::get('/students','App\Http\Controllers\StudentlistController@index')->name('student');
    Route::get('/students/all','App\Http\Controllers\StudentlistController@allTimeAppointment')->name('all.appointments');
});

Route::group(['middleware'=>['auth','counsellor']],function(){
    Route::resource('appointment', App\Http\Controllers\AppointmentController::class);
    Route::post('/appointment/check','App\Http\Controllers\AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update','App\Http\Controllers\AppointmentController@updateTime')->name('update');
    Route::get('/status/update/{id}','App\Http\Controllers\AppointmentController@toggleStatus')->name('update.status');
    Route::get('student-today','App\Http\Controllers\AppointmentController@currentStudents')->name('students.today');
    Route::get('all-students','App\Http\Controllers\AppointmentController@allStudents')->name('all.students');
    Route::get('write-report','App\Http\Controllers\ReportController@index')->name('write.report');
    Route::post('/report','App\Http\Controllers\ReportController@store')->name('report');
    Route::get('/report/{userId}/{date}','App\Http\Controllers\ReportController@show')->name('report.show');
    Route::get('/report-students','App\Http\Controllers\ReportController@studentsFromReport')->name('report.students');
});

//current date
Route::get('/new-appointment/{counsellorId}/{date}','App\Http\Controllers\FrontendController@show')->name('create.appointment');

Route::group(['middleware'=>['auth','student']],function(){
    //store student booking
    Route::post('/book/appointment','App\Http\Controllers\FrontendController@store')->name('booking.appointment');
    Route::get('/my-booking','App\Http\Controllers\FrontendController@myBookings')->name('my.booking');
    Route::get('/user-profile','App\Http\Controllers\ProfileController@index');
    Route::post('/user-profile','App\Http\Controllers\ProfileController@store')->name('profile.store');
    Route::post('/profile-pic','App\Http\Controllers\ProfileController@profilePic')->name('profile.pic');
    Route::get('/my-report','App\Http\Controllers\FrontendController@myReport')->name('my.report');
    
    });

