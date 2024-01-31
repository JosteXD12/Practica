<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    // if(Auth::check()){
    //     return "the user is logged in";

    // }

    // $username = 'daxzdasdas';
    // $password = 'asdasdasd';

    // if (Auth::attempt(['username' => $username, 'password' => $password])) {

    //     return redirect()->intended('/admin');
    // }

    Auth::logout();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
