<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $links = Post::get();
        $files = File::get();
        return view('files.upload', ['links' => $links, 'files' => $files]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:40',
            'category' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $extension = $request->image->extension();
        $request->image->storeAs('/public', $request->title . "-" . date("Ymd") . "." . $extension);
        $url = Storage::url($request->title . "-" . date("Ymd") . "." . $extension);
        $file = File::create([
            'title' => $request->title,
            'category' => $request->category,
            'desc' => $request->desc,
            'url' => $url,
        ]);
        return back();
    }

    public function destroy(File $file)
    {
        $file->delete();
        return back();
    }

    public function show()
    {
        $links = Post::get();
        $files = File::get();
        return view('files.index', ['links' => $links, 'files' => $files]);
    }
}
