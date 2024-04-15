<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function authenticate(){
        if(Auth::user()->role_as == '1') //Admin Side Login
        {
            return redirect('/postall');
        }
        else if(Auth::user()->role_as == '0') //User Side Login
        {
            return redirect('/post/user');
        }
        else //visitor
        {
            return redirect('/');
        }
    }

}
