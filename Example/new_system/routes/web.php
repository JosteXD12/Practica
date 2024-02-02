<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('root'); // Changed name to 'root'

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin',function (){
return view('admin.index');

});