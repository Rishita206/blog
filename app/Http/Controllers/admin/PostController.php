<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class PostController extends Controller
{
    public function index()
    {
        $post = Post::with('category')->get();
        
        return view('admin.post.index', compact('post'));
    }


    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));
    }

    

    public function store(request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'body' => 'required'
            ],
            [
                'title.required' => 'Title is Required',
                'body.required' => 'Content is Required'
            ]
        );
        $post = new post();
        $post->user_id = Auth::user()->id;
        $post->image = $post->image;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->catId = $request->catId;
        $post->save();
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $id = $request ->id;
        $post = Post::find($id);
        $post->id = $request->id;
        $post->image = $request->image;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('post.index');
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->back();
    }

    public function postview($id)
    {
        $post = Post::find($id);
        return view('admin.post.view', compact('post'));
    }

    // public function postpage()
    // {
    //     $post = Post::all();
    //     return view('user.post', compact('post'));
    // }
}
