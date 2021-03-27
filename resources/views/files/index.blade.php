@extends('layouts.app')

@section('head')
<meta name="robots" content="index,follow">
@endsection
@section('file')
active @endsection

@section('content')
  <div class="my-3 p-3 md:px-12 xl:px-52 flex flex-wrap">
    <h1 class="text-center uppercase font-bold text-2xl md:w-full p-3">Réalisations & Media</h1>
    @foreach($files as $file)
    <div class="w-1/2 md:w-1/4 p-2 text-center">
      <div class="h-32 md:h-44">
        <img data-enlargeable style="cursor: pointer"src="{{ url($file->url) }}" class="max-h-32 md:max-h-44 mx-auto"alt="{{$file->desc}}" loading="lazy"/>
      </div>
      <p>{{$file->desc}}</p>
    </div>
    @endforeach
  </div>

@endsection