<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
// Start page
Route::get('/', 'HomeController@index')->name('home');

// Route View Concat Us
Route::get('/contact', function () {
    return view('messages.concat');
});
// Routes Group Form Register Student Details
Route::middleware('CheckDitls')->group(function () {
    Route::get('step1','register_detailsController@showStep1')->name('showStep1');
    Route::post('step1','register_detailsController@step1')->name('step1');
    Route::get('step2','register_detailsController@showStep2')->name('showStep2');
    Route::post('step2','register_detailsController@step2')->name('step2');
    Route::get('step3','register_detailsController@showStep3')->name('showStep3');
    Route::post('step3','register_detailsController@step3')->name('step3');
});
// Route view Profile Student
Route::resource('student_details', 'Student_detailsController');
// Route Show and Store Messages Student
Route::resource('messages', 'MessagesController');
// Route News ( View & Show & Store & Delete )
Route::resource('news', 'NewsController');
Route::post('news','NewsController@search')->name('news');
