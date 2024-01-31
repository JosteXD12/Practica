<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {

        $input = $request->all();

        if ($file = $request->file('file')) {
            // Generate a unique filename
            $name = uniqid() . '_' . $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->move('images', $name);

            // Set the 'path' attribute to the filename
            $input['path'] = $name;
        }


        Post::create($input);


        // $file = $request->file('file');

        // echo "<br>";
        // echo $file->getClientOriginalName();
        // echo "<br>";
        // echo $file->getSize();

        // Post::create($request->all());
        // return redirect('/posts');



        // $this->validate($request, [

        //     'title'=>'required',

        // ]);

        // return $request->all();

        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());

        // $post = new Post;
        // $post->title = $request->title;;
        // $post->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            // Handle the case where the post with the given ID is not found
            abort(404);
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::whereId($id)->delete();


        return redirect('/posts');
    }



    //     public function contact()
    //     {

    //         $people = ['Edward','Jose','James','Bob','Peter','Maria'];
    //         return view('contact', compact('people'));
    //     }

    //     public function show_post($id,$name,$password)
    //     {
    //         // return view('post')->with('id',$id);
    //         return view('post', compact('id', 'name', 'password'));
    //     }
}
