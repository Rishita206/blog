<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentControler extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $post = Post::where('id', $request->post_id)->first();
            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment' => $request->comment
                ]);
                return redirect()->back();
            } 
            else {
                redirect()->back();
            }
        } 
        else {
            redirect()->back();
        }


       
    }


    


    public function delete($id){
        $comment = Comment::find($id)->delete();
        return redirect()->back();
    }

   
}
