<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use App\Http\Controllers\PostsController;
use GuzzleHttp\Middleware;
use Carbon\Carbon;


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

//     Post::create(['title' => 'Method Create2',  'body' => 'wow i am method created2']);
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



// Route::get('/forcedelete', function () {

//     Post::withTrashed()->where('is_admin',0)->forceDelete ();
//     //return $post;
// });




//ELOQUENT Relationships


// relationship one to one
// Route::get('/user/{id}/post', function ($id) {

//     return User::find($id)->post->title;
// });


// Route::get('/post/{id}/user', function ($id) {

//     return Post::find($id)->user->name;
// });



// //relacionship the one to many 
// Route::get('/posts', function () {

//     $user = User::find(1);

//     foreach ($user->posts as $post) {
//         echo $post->title . "<br>";
//     }
// });

// //many to many relationship 

// Route::get('/user/{id}/role', function () {

//     $user = User::find(1)->roles()->orderBy('id', 'desc')->get();

//     return $user;
//     // foreach ($user->roles as $role){
//     //     return $role->name;
//     // }

// });

//Accesing the intermediate table / pivot


// Route::get('/user/pivot', function () {

//     $user = User::find(1);

//     foreach ($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }
// });

// Route::get('/user/country', function () {

//     $country = Country::find(1);

//     foreach ($country->posts as $post) {

//         return $post->title;
//     }
// });


//polymorphic realpath


// Route::get('/user/photos', function () {
//     $user = User::find(3);
//     $photoPaths = [];

//     foreach ($user->photos as $photo) {
//         $photoPaths[] = $photo->path();
//     }

//     return $photoPaths;
// });

// Route::get('/post/photos', function () {
//     $post = Post::find(1);
//     $photoPaths = [];

//     foreach ($post->photos as $photo) {
//         $photoPaths[] = $photo->path();
//     }

//     return $photoPaths;
// });

// Route::get('/photo/{$id}/post', function($id) {

//     $photo = Photo::findOrfail($id);

//     return $photo->imageable;

// });



// Route::get('/photo/{id}/post', function ($id) {
//     $photo = Photo::findOrFail($id);

//     if ($photo->imageable_type === 'App\Models\Post') {
//         $post = Post::find($photo->imageable_id);

//         return $post;
//     } else {
//         return "La foto no está asociada a un post.";
//     }
// });


// polimorfimo de muchos a muchos 
// Route::get('/post/tag', function () { 

//     $post = Post::find(2);

//     foreach ($post -> tags as $tag) {
//        echo $tag->name; 
//     }

// });


// Route::get('/tag/post', function () { 

//     $tag = Tag::find(1);

//     return $tag -> posts;
//     // foreach ($tag -> posts as $post) {
//     //     echo $post->title; 
//     //  }

// });

Route::get('/', function () {
    return view('welcome');
});



// Crud de aplicación



Route::group(['Middleware' => 'web'], function () {
    Route::resource('posts', PostsController::class);

    Route::get('/dates', function () {

        $date = new DateTime('+1 week');
        echo $date->format('m-d-Y');
        echo '<br>';

        echo Carbon::now()->addDay(10)->diffForHumans();
        echo '<br>';
        echo Carbon::now()->subMonth(5)->diffForHumans();

        echo '<br>';
        echo Carbon::now()->yesterday();
        echo '<br>';
    });

    Route::get('/getname', function () {
        $user = User::find(1);
        echo $user->name;
    });

    Route::get('/setname', function () {
        $user = User::find(1);
        $user->name = "Josue";
        $user->save();
        return $user;
    });
});
