<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;
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


Route::get('/insert', function () {

    $user = User::findOrFail(1);

    $address = new Address(['name' => '1111233234 rioclaro av guayca 55558']);

    $user->Address()->save($address);
});


Route::get('/update', function () {
    $address = Address::whereUserId(1)->first();

    $address->name = "999999945445 update av puntarenans";

    $address->save(); // Corregir esta línea
});

Route::get('/read', function () {
    $user = User::findOrFail(1);
    echo $user->address->name;
});


Route::get('/delete', function () {
    // Encuentra al usuario con ID 3 (o usa el método que prefieras para encontrar al usuario)
    $user = User::findOrFail(3);

    // Elimina la relación de dirección (esto no eliminará la dirección a menos que haya configurado eliminar en cascada)
    $user->address()->delete();

    return "done";
});
