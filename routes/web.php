<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::view('/','home');
Route::resource('students',StudentController::class);
Route::resource('tracks',TrackController::class);