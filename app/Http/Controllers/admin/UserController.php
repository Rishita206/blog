<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Command\WhereamiCommand;


class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request){
        $id = $request -> id;
        $user = User::find($id);
        $user->name = $user->name;
        $user->email = $user->email;
        $user->password = $user->password;
        $user->save();
        return redirect()->route('user.index');
    }

    public function delete($id){
        $user = User::find($id);
        return redirect()->route('user.index');
    }

    public function show(){
        $user_id = Auth::user()->id;
        $post = Post::where('user_id',$user_id)->get();
        return view('admin.user.index',compact('post'));
    }

    

   
}
