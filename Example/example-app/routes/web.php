<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
//use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});



// Crud de aplicación

Route::resource('/post', 'App\Http\Controllers\PostController');
