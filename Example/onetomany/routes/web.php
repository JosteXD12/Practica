<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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
    $user = User::findOrFail(1);

    $post = new Post(['title' => 'second post', 'body' => 'wowwwwwwwwwwwwwwwwwwwwwwwww']);

    $user->posts()->save($post);
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->posts as $post) {
        echo $post->title . "<br>";
    }
    // $posts = $user->posts; // Recupera los posts asociados al usuario con ID 1
    // dd($posts); // Devuelve la colección de posts en la respuesta HTTP

});

Route::get('/update', function () {
    $user = User::find(1);

    $user->posts()->whereId(1)->update([
        'title' => 'i love laravel',
        'body'  => 'soy un pedejo'
    ]);

    return "Done updating posts";
});


Route::get('/delete', function () {
    $user = User::find(1);

    // Supongamos que deseas eliminar el post con ID 1 asociado al usuario
    $user->posts()->whereId(1)->delete();

    return "Done deleting post";
});
