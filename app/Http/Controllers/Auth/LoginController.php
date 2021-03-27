<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        $links = Post::get();
        return view('auth.login',['links'=>$links]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('home');
    }
}
