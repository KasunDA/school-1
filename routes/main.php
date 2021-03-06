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
Route::domain('school.test')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
Route::domain('{account}.school.test')->group(function () {
    Route::get('/', function ($account) {
        return view('schools/welcome', ['account' => $account]);
    });
    Route::get('user/{id}', function ($account, $id) {
        return $account . ' ' . $id;
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
