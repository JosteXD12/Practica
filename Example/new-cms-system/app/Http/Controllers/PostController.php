<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {


        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {


        return view('admin.posts.create');
    }

    public function store()
    {
        //$this->authorize('create',  Post::class);
        $inputs = request()->validate([
            'titulo' => 'required|min:8|max:255',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required'
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('image');
        }
        auth()->user()->posts()->create($inputs);

        return back();
        
    }
}
