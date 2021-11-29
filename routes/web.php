<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/save_student', 'StudentController@save_student');
Route::get('/all_students', 'StudentController@all_students');

Route::get('/edit_student/{id}', 'StudentController@edit_student');
Route::put('/update_student', 'StudentController@update_student');
