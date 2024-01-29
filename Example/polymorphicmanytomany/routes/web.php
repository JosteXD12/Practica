<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;



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
    return view('welcome');
});

Route::get('/create', function () {
    // Crear un nuevo post y asociarlo con un tag
    $post = Post::create(['name' => 'primer post']);
    $tag = Tag::find(1);
    $post->tags()->attach($tag);

    // Crear un nuevo video y asociarlo con otro tag
    $video = Video::create(['name' => 'Video.post']);
    $tag2 = Tag::find(2);
    $video->tags()->attach($tag2);
});


Route::get('/read', function () {
    $post = Post::findOrFail(2);

    foreach ($post->tags as $tag) {
        echo $tag->name . '<br>'; // Suponiendo que 'name' sea una propiedad relevante de la etiqueta
    }
});



Route::get('/update', function () {
    $post = Post::findOrFail(1);
    foreach ($post->tags as $tag) {
      return $tag->whereName('PHP')->update(['name' => 'C++']);
    }
});


Route::get('/delete', function () {
    $post = Post::find(2);
    foreach ($post->tags as $tag) {
      $tag->whereId(2)->delete();
    }
});
