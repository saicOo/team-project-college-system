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


Route::middleware('auth')->group(function () {
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

    Route::resource('public_qa', 'Public_qaController');
    // Routes Student (Show profile & Update)
    Route::resource('student_details', 'Student_detailsController');
    // Routes Messages
    Route::resource('inbox', 'MessageController');
    Route::get('ajaxFilter', 'MessageController@ajaxFilter');

    /******* Students Routes *******/
    // map students routes
    Route::get('map_students', 'StudentController@not_mapped_students')->name('map_students.index');
    Route::get('map_students/map', 'StudentController@map')->name('map_students.map');
    Route::resource('students', 'StudentController');
    Route::post('students/search/{dept_id}', 'StudentController@search')->name('students.search');
    // upload std img
    Route::post('students/upload/{id}', 'StudentController@upload')->name('students.upload');
    // download std attachment file
    Route::get('students/download/{id}', 'StudentController@download')->name('students.download');

    /******** Admins Routes *******/
    // admin add|list routes
    Route::resource('admin', 'AdminController');
    // upload admin img
    Route::post('admin/upload/{id}', 'AdminController@upload')->name('admin.upload');

    ########### routes news ###########
    Route::resource('news', 'NewsController');
    Route::get('news/destroyComment/{id}', 'NewsController@destroyComment')->name('news.destroyComment');
    Route::get('ajax_news', 'NewsController@ajax_show');
    ###########################################################################
});
