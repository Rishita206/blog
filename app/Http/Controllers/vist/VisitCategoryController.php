<?php

namespace App\Http\Controllers\vist;

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class VisitCategoryController extends Controller
{
    public function show($id){
        $categories = Category::where('id',$id)->with('post')->first();
        return view('visitor.category.cat',compact('categories'));
    }

    public function post(){
        $post = Post::paginate(1);
        return view('visitor.post', compact('post'));
    }

    public function comment()
    {
        // $posts = Post::find($id);
        // if($posts){

        //     $comment = Comment::where('id', $posts->comId)->get();
        // }
        // return view('visitor.postcom',compact('comment'));

        // $post = Post::with('comment')->get();
        return view('visitor.postcom');
    }

    
}
