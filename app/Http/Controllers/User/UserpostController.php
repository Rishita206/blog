<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserpostController extends Controller
{
    public function blog()
    {
        return view('user.post.post');
    }
    public function postpage()
    {
        $post = Post::paginate(1);
        return view('user.post.post', compact('post'));
    }


    public function create()
    {
        $category = Category::all();
        return view('user.post.create', compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ],
            [
                'title.required' => 'Title is Required*',
                'body.required' => 'Content is Required*', 
                'image.required' => 'Image is Required*'
            ]
        );
        
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $imageName);
        
    
        $post = new post();
        $post->user_id = Auth::user()->id;
        $post->image = $imageName;



        $post->title = $request->title;
        $post->body = $request->body;
        $post->catId = $request->catId;
        $post->comId = $request->comId;

        $post->save();
        return redirect()->route('post.user');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('user.post.edit', compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id)->delete();
        return redirect()->route('index');
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            ],
            [
                'title.required' => 'Title is Required*',
                'body.required' => 'Content is Required*',
            ]
        );
        $id = $request->id;
        $post = Post::find($id);
        $post->id = $request->id;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $imageName);
            $post->image = $imageName;
        }




        $post->title = $request->title;
        $post->body = $request->body;
        
        $post->save();
        return redirect()->route('post.user');
    }



    public function index()
    {
        $post = Post::with('category')->get();
        return view('user.post.index', compact('post'));
    }

    public function postread($categoryname)
    {
        $post = Post::find($categoryname);
        return view('user.post.create');
    }

    public function mypost()
    {
        $post  = Post::where('user_id', Auth::user()->id)->get();
        return view('user.post.mypost', compact('post'));
    }

    public function postedit($id)
    {
        $post = Post::find($id);
        return view('user.post.edit', compact('post'));
    }

    public function postdelete($id)
    {
        $post = Post::find($id)->delete();
        return redirect()->back();
    }

    public function showcat($id)
    {
        $categories = Category::where('id', $id)->with('post')->first();
        return view('admin.post.view', compact('categories'));
    }
}
