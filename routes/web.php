<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\authorMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,"todo"])->name('todo')->middleware(authorMiddleware::class);

Route::get('/login',[UserController::class, "login"])->name('login');
Route::post('/entering',[UserController::class,"entering"])->name('enter');

Route::get('/logout',[UserController::class,"logout"])->name('logout');