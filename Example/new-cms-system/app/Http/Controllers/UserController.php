<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all()

        ]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if (request()->hasFile('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }
        $user->update($inputs);
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('user-deleted', 'User has been deleted');
        return back();
    }

    public function attach(User $user)
    {
        //dd($role);
        $user->roles()->attach(request('role'));
        return back();
    }
    public function detach(User $user)
    {
        //dd($role);
        $user->roles()->detach(request('role'));
        return back();
    }
}
