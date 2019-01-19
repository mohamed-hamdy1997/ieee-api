<?php

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;

        //login & logout
Route::POST('login', 'AuthController@login');

Route::post('register', 'AuthController@register');

Route::get('logout', 'Api\AuthController@logout');


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









