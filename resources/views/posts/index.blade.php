@extends('layouts.app')

@section('content')
  <div class="p-3 md:px-12 xl:px-52">
    <form action="{{route('posts')}}" method="post">
      @csrf
      <div class="mb-4">
        <div class="mb-4">
          <label for="title" class="sr-only">Title</label>
          <input type="text" name="title" id="title" placeholder="Nom de la préstation" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('title')}}">
          @error('title')
            <div class="text-red-500 mt-2 text-sm">
              {{$message}}
            </div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="body" class="sr-only">Body</label>
          <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Details de la prestation"></textarea>
            @error('body')
              <div class="text-red-500 mt-2 text-sm">
                {{$message}}
              </div>
            @enderror
        </div>
        <div class="mb-4">
          <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-2 rounded font-medium">Create</button>
        </div>
      </div>
    </form>

    @if($posts->count())
      @foreach($posts as $post)
        <div class="my-4">
          <span class="font-bold capitalize">{{$post->user->firstname}}</span>
          <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
          <h3 class="my-1 font-bold">{{$post->title}}</h3>
          <p class="mb-2">{{$post->body}}</p>
          @isset($post->def)
            <p class="mb-2 text-xs">{{$post->def}}</p>
          @endisset
          @isset($post->additionnal)
            <p class="mb-2 text-cs">{!!$post->additionnal!!}</p>
          @endisset
          <div class="mb-4 flex">
            <a href="{{route('posts.edit',$post->id)}}" class="text-blue-400 py-2 px-6 rounded hover:bg-blue-400 hover:text-white">Edit</a>
            <form action="{{route('posts.destroy', $post) }}" method="post" class="px-2 mx-2">
              @csrf
              @method('DELETE')
                <button type="submit" class="py-2 px-6 rounded text-red-500 hover:bg-red-500 hover:text-white">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
      {{$posts->links()}}
    @else
    <p>There are no posts</p>
    @endif
  </div>
@endsection