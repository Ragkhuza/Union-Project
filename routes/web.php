<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/login/{role}', 'Auth\LoginController@authenticate')->name('login.custom');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/school/home', 'SchoolController@index')->name('school.home');

Route::get('/school/profile/{school}', 'SchoolController@profile')->name('school.profile');
Route::get('/student/profile/{user}', 'StudentController@profile')->name('student.profile');

Route::post('/add/school', 'SchoolController@create')->name('add.school');

Route::view('/payments/success', 'successful-payment')->name('payment.success');

Route::get('/transfer/{school}', 'EnrollmentController@showTransfer')->name('transfer.show');
Route::post('/transfer', 'EnrollmentController@transfer')->name('transfer');

Route::get('logout', function() {
    Auth::logout();
    return redirect(route('welcome'));
});