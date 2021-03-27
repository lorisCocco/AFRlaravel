@extends('layouts.app')

@section('head')
<meta name="robots" content="index,follow">
@endsection

@section('post')
active @endsection

@section('content')
<div class="p-3 md:px-12 xl:px-52 md:flex flex-wrap">
  <h2 class="p-3 py-6 text-3xl uppercase text-center w-full font-bold">{{$post->title}}</h2>
  @if($files->count())
  <div class="md:w-2/3 p-3 md:p-6 order-2">
    @isset($post->def)
      <p class="mb-3 md:pb-6">{{$post->def}}</p>
    @endisset
    @isset($post->additionnal)
      <p class="mb-3">Nos domaines d'interventions :</p>
      <p class="mb-3 md:pb-6">{!!$post->additionnal!!}</p>
    @endisset
  </div>
  <div class="p-3 md:w-1/3 order-1">
    @if(file_exists( public_path().'/storage/'.$post->title.'.svg' ))
      <img src="/storage/{{$post->title}}.svg" alt="{{$post->title}} icon" class="w-32 h-32 mx-auto mb-6">
    @endif
    <div class="flex flex-wrap">
      @foreach($files as $file)
        <div class="w-1/2 p-2 mx-auto h-auto text-center">
          <div class="h-32 md:h-44">
            <img data-enlargeable style="cursor: pointer"src="{{ url($file->url) }}" class="max-h-32 md:max-h-44 mx-auto"alt="{{$file->desc}}" loading="lazy"/>
          </div>
          <p>{{$file->desc}}</p>
        </div>
      @endforeach
    </div>
  </div>
  @else
  <div class="p-3 md:p-6">
    @isset($post->def)
      <p class="mb-3 md:pb-6">{{$post->def}}</p>
    @endisset
    @isset($post->additionnal)
      <p class="mb-3">Nos domaines d'interventions :</p>
      <p class="mb-3 md:pb-6">{!!$post->additionnal!!}</p>
    @endisset
  </div>
  @endif
</div>
@endsection