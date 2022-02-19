<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('student_details', 'Student_detailsController');
Route::resource('student_desire', 'Student_desireController');
Route::resource('alert_msgs', 'Alert_msgsController');
Route::resource('private_qa', 'Private_qaController');
Route::resource('public_qa', 'Public_qaController');