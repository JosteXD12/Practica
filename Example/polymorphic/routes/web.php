<?php

use Illuminate\Support\Facades\Route;

use App\Models\Staff;
use App\Models\User;
use App\Models\Photo;

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
    $staff = Staff::find(1);
    $staff->photos()->create(['path' => 'example.png']);
});


Route::get('/read', function () {
    $staff = Staff::findOrFail(1);

    foreach ($staff->photos as $photo) {
        return $photo->path;
    }
});


Route::get('/update', function () {
    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();
    $photo->path = "updating_photo";
    $photo->save();
});
Route::get('/delete', function () {
    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(1)->delete();
});

Route::get('/assign', function () {
    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(2);

    $staff->photos()->save($photo);
});

Route::get('/un-assign', function () {
    // Encontrar al miembro del personal por su ID
    $staff = Staff::findOrFail(1);

    // Desasociar todas las fotos del miembro del personal
    $staff->photos()->update([
        'imageable_id' => null,
        'imageable_type' => null
    ]);
});