<?php

Route::get('/', 'DashboardController@dashboard')->name('dashboard');
Route::resource('/users', 'UserController');