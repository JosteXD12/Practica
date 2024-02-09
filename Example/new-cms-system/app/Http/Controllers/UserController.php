<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{

    public function show(User $user){
        return view('admin.users.profile',['user' => $user]);
    }

    
    public function update(User $user){

        $input = request()->validate([
            'username'=>['required','string','max:255','alpha_dash'],
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>['file:png,jpg'],
            //'password'=>['min:8','max:10','confirmed']
        ]);


        if(request('avatar')){
            $inputs['avatar']=request('avatar')->store('images');
        }

        $user->update($inputs);
        return back();
    }
}
