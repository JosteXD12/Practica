<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Role;

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
    $user = User::find(1);

    $role = new Role(['name' => 'administradorX2']);
    $user->roles()->save($role);
});





Route::get('/read1', function () {
    $user = User::findOrfail(1);

    $roles = $user->roles; // Obtén los roles asociados al usuario

    foreach ($roles as $role) {
        echo "Nombre del Rol: " . $role->name . "<br>";
        // Puedes acceder a otras propiedades del rol según sea necesario
    }
});





Route::get('/update', function () {
    $user = User::findOrFail(1);

    // Verifica si el usuario tiene roles y actualiza directamente
    $user->roles()->where('name', 'administrador')->update(['name' => 'subscriber']);

    return "Rol actualizado correctamente";
});




Route::get('/delete', function () {
    $user = User::findOrFail(1);

    // ID del rol que deseas eliminar
    $roleId = 1; // Reemplaza con el ID del rol que desees eliminar

    // Elimina directamente el rol por su ID
    $user->roles()->findOrFail($roleId)->delete();

    return "Rol eliminado correctamente";
});



Route::get('/attach', function () {
    $user = User::findOrFail(1);
    $user->roles()->attach(2);
});



Route::get('/detach', function () {
    $user = User::findOrFail(1);
    $user->roles()->detach(2);
});


Route::get('/sync', function () {
    $user = User::findOrFail(1);
    $user->roles()->sync([1,2]);
});