<?php

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;

        //login & register
Route::POST('login', 'AuthController@login');

Route::POST('logout', 'AuthController@logout');

//Route::post('register', 'AuthController@register');

Route::post('/password/reset', 'ResetPasswordController@recover')->name('password.reset');

Route::post('/password/reset/{reset_code}', 'ResetPasswordController@Reset')->name('password.reset');

        //Article routes
Route::get('articles', 'PostsController@index');

Route::get('article/{id}', 'PostsController@show');

Route::post('create-article', 'PostsController@store');

Route::PUT('update-article/{id}', 'PostsController@update');

Route::delete('/article/{id}', 'PostsController@destroy');


        //users route
Route::get('users', 'UserController@index');

Route::post('adduser', 'UserController@addUser');

Route::get('user/{id}', 'UserController@show');

Route::delete('user/{id}', 'UserController@destroy');









