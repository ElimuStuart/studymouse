<?php

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
    return view('index');
});



// Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/', 'Auth\RegisterController@register');

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/student', 'StudentController@index')->name('student');
Route::get('/student/course/{id}', 'StudentController@show');

Route::get('/tutor', 'TutorsController@index');
Route::get('/tutor/course/{id}', 'TutorsController@show');

Route::resource('materials', 'MaterialsController');

Route::resource('plans', 'PlansController');

Route::resource('subscriptions', 'SubscriptionsController');

Route::resource('courses', 'CoursesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/attach/course/{id}', 'HomeController@store')->name('store');

Route::get('/admin/course/{id}', 'HomeController@show')->name('show');
