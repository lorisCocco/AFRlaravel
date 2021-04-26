<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::take(3)->get();
        $links = Post::get();
        return view('home', ['posts' => $posts, 'links' => $links]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'firstname' => 'required|max:30',
            'tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'email' => 'email|required|max:70',
            'prestation' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());
        Mail::to('***@***.com')->send(new ContactMail($request->except('_token')));
        return back()->with('success', 'Votre formulaire a bien été validé.');
    }
}
