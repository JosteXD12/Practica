<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about', function () {
//     return "Hi about page";
// });
// Route::get('/Contact', function () {
//     return "Hi i am contact";
// });

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return "This is post number " . $id . "" . $name;
// });

// Route::get('admin/posts/example', array('as' => 'admin.home', function () {
//     $url =route('admin.home');

//     return "This url is ". $url;
// }));


// Route::get('/post/{ id}', '\App\Http\Controllers\PostsController@index');

//Route::resource('posts', '\App\Http\Controllers\PostsController');





// Route::get('/contact', '\App\Http\Controllers\PostsController@contact');


// Route::get('/post/{id}/{name}/{password}', '\App\Http\Controllers\PostsController@show_post');


// Database Raw SQL queries 

// Route::get('/insert', function () {
//     DB::insert('insert into posts(title, body) values(?, ?)', ['PHP with Laravel', 'Laravel is the best']);
// });


// Route::get('/read', function () {

//     $result = DB::select('select * from posts where id = ?', [1]);

//     return var_dump($result);

//     // foreach ($result as $post) {
//     //     return $post->title;
//     // }
// });


// Route::get('/update', function () {
//     $update = DB::update('update posts set title = "update title" where id = ?', [1]);
//     return $update;
// });

// Route::get('/delete', function () {
//     $deleted = DB::delete('delete from posts where id = ?', [1]);
//     return $deleted;
// });




// ELOQUENT

// Route::get('/read', function () {

//     $posts = Post::all();

//     foreach ($posts as $post) {
//         return $post->title;
//     }
// });


// Route::get('/find', function () {

//     $posts = Post::find(1);
//     return $posts->title;
// });


// Route::get('/findwhere', function () {

//     $post = Post::where('id',4)->orderBy('id', 'desc')->take(1)->get();

//     return $post;

// });

// Route::get('/findmore', function () {

//     // $post = Post::findOrFail(2);

//     // return $post;

//     $post = Post::where('users_count', '<',50)->findOrFail();

// });


// Route::get('/basicinsert', function () {

//     $post = new Post;
//     $post->title = 'New Eloquent title insert';
//     $post->body = 'WOWWWWWWWW';

//     $post->save();
// });


// Route::get('/basicinsert2 ', function () {

//     $post = Post::find(2);
//     $post->title = 'New Eloquent title insert2';
//     $post->body = 'WOWWWWWWWW2';

//     $post->save();
// });


// Route::get('/create', function () {

//     Post::create(['title' => 'Method Create', 'body' => 'wow i am method created']);
// });


// Route::get('/update', function () {

//     Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'NEW PHP TITLE1', 'body' => 'INSTRUCTORS1']);
// });



// Route::get('delete', function () {

//     $post = Post::find(2);
//     $post->delete();
// });


// Route::get('/delete2', function () {

//     Post::destroy(3);

// });



// Route::get('/softdelete', function () {

//     Post::find(1)->delete();
// });


// Route::get('/readsoftdelete', function () {

//     // $post = Post::find(1);

//     // return $post;

//     // $post = Post::withTrashed()->where('id',1)->get();

//     // return $post;

//     $post = Post::onlyTrashed()->where('id',1)->get();

//     return $post;
// });


// Route::get('/restore', function () {

//     Post::withTrashed()->where('is_admin',0)->restore();
//     //return $post;
// });



Route::get('/forcedelete', function () {

    Post::withTrashed()->where('is_admin',0)->forceDelete();
    //return $post;
});