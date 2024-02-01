<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
   // Define your email data
   $data = [
      'titulo' => 'Hola a todos',
      'contenido' => 'Tengo sueño jajajja por la mañanas.'
   ];

   // Send email
   Mail::send('emails.test', $data, function ($message) {
      $message->to('jostecortes12@gmail.com', 'Edward')->subject('Hola a todos');
   });

   // Return a response after sending the email
   return "Email sent successfully!";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
