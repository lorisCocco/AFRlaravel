<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::get();
        $links = Post::get();
        return view('contact.index', ['contacts'=>$contacts,'links'=>$links]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back();
    }
}  
