@extends('layouts.app')

@section('head')
<meta name="robots" content="index,follow">
@endsection

@section('post')
active @endsection

@section('content')

@if($posts->count())
<h1 class="font-bold text-center px-3 py-6 md:px-12 xl:px-52 text-3xl uppercase">Nos préstations</h1>
<div class="p-3 py-6 md:px-12 xl:px-52 md:flex flex-wrap">
  @foreach($posts as $post)
  <div class="md:w-1/3 p-8 hover:bg-gray-100 bg-opacity-90 rounded-lg md:text-justify mx-auto" id="{{ $post->id }}">
    <a href="{{route('post',$post->id)}}">
      @if(file_exists( public_path().'/storage/'.$post->title.'.svg' ))
      <img src="/storage/{{$post->title}}.svg" alt="{{$post->title}} icon" class="w-32 h-32 m-auto mb-6">
      @endif
      <h2 class="mb-2 text-xl uppercase text-center underline">{{$post->title}}</h2>
      <p class="mb-2">{{$post->body}}</p>
      <div class="text-center text-white uppercase p-3 md:m-3 text-lg font-bold">
        <span class="mx-auto bg-c-d p-3 hover:bg-blue-400 hover:underline focus:bg-blue-400 focus:underline">Lire la suite</span>
      </div>
    </a>
  </div>
  @endforeach
</div>
{{$posts->links()}}
@else
<p>There are no posts</p>
@endif

@endsection