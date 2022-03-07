<?php

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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


#########   department Route  #########

// Displye Data
Route::get('department' , 'DepartmentController@index' )->name('department.index');

// create Data
Route::get('department/create' , 'DepartmentController@create' )->name('department.create');

// store Data
Route::post('department/store' , 'DepartmentController@store' )->name('department.store');

// show Data
Route::get('student/dept/{dept}' , 'DepartmentController@show' )->name('department.show');

// edit Data
Route::get('department/edit/{id}' , 'DepartmentController@edit' )->name('department.edit');

// update Data
Route::post('department/update/{id}' , 'DepartmentController@update' )->name('department.update');

// Remove Data
Route::get('department/destroy/id/{id}' , 'DepartmentController@destroy' )->name('department.destroy');

Route::resource('student_details', 'Student_detailsController');
Route::resource('student_desire', 'Student_desireController');
Route::resource('alert_msgs', 'Alert_msgsController');
Route::resource('private_qa', 'Private_qaController');
Route::resource('public_qa', 'Public_qaController');

// map students routes
Route::get('map_students', 'StudentController@not_mapped_students')->name('map_students.index');
Route::get('map_students/map', 'StudentController@map')->name('map_students.map');
Route::resource('students', 'StudentController');
Route::post('students/search/{dept_id}', 'StudentController@search')->name('students.search');

// admin add|list routes
Route::resource('admin', 'AdminController');
