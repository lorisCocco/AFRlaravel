@extends('layouts.app')

@section('content')
  <div class="p-3 md:px-12 xl:px-52">
      <form action="{{route('posts.update',$post->id)}}" method="post">
        @csrf
        <div class="mb-4">
          <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Nom de la préstation" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ $post->title }}">
            @error('title')
            <div class="text-red-500 mt-2 text-sm">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="mb-4">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="6" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Details de la prestation">{{ $post->body }}</textarea>
              @error('body')
                <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
                </div>
              @enderror
          </div>
          <div class="mb-4">
            <label for="def">Definition</label>
            <textarea name="def" id="def" cols="30" rows="6" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('def') border-red-500 @enderror" placeholder="Definition">{{ $post->def }}</textarea>
              @error('def')
                <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
                </div>
              @enderror
          </div>
          <div class="mb-4">
            <label for="additionnal">Additionnal</label>
            <textarea name="additionnal" id="additionnal" cols="30" rows="6" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('additionnal') border-red-500 @enderror" placeholder="Informations additionnels">{{ $post->additionnal }}</textarea>
              @error('def')
                <div class="text-red-500 mt-2 text-sm">
                  {{$message}}
                </div>
              @enderror
          </div>
          <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-2 rounded font-medium">Update</button>
          </div>
        </div>
      </form>
  </div>
@endsection