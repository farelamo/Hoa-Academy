<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'Auth\AuthController@login');
Route::post('/register', 'Auth\AuthController@register');
Route::post('/logout', 'Auth\AuthController@logout');
Route::post('/refresh', 'Auth\AuthController@refresh');
