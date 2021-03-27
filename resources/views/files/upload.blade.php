@extends('layouts.app')

@section('content')
<div class="p-3 md:px-12 xl:px-52">
  <form action="{{ route('file')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label for="title" class="sr-only">Nom du fichier</label>
      <input type="text" name="title" id="title" placeholder="Nom du fichier" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title')}}">
      @error('title')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
      @enderror
    </div>
    <div class="mb-4">
    <select class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('category') border-red-500 @enderror" name="category" id="category">
      @if($links->count())
        @foreach ($links as $link)
          <option value="{{$link->title}}">{{$link->title}}</option>
        @endforeach
        <option value="about">Qui sommes nous</option>
        <option value="autre">Autre</option>
      @endif
    </select>
    </div>
    <div class="mb-4">
      <label for="desc" class="sr-only">Description</label>
      <input type="text" name="desc" id="desc" placeholder="Description de l'image en quelques mots" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('desc') border-red-500 @enderror" value="{{ old('desc')}}">
      @error('title')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
      @enderror
    </div>
    <div class="mb-4 flex flex-wrap">
      <label for="image" class="w-full">Image : .jpg, .jpeg, .png</label>
      <input type="file" name="image" id="image" placeholder="Prénom" class="py-4 @error('image') border-red-500 @enderror">
      @error('image')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
      @enderror
    </div>
    <div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium">Ajouter</button>
    </div>
  </form>
</div>

<div class="p-3 md:px-12 xl:px-52 md:flex flex-wrap">
  @foreach($files as $file)
  <div class="p-2 md:w-1/4">
    <p class="pb-2">Nom du fichier : <span class="font-bold">{{  $file->title  }}</span></p>
    <img src="{{ url($file->url) }}" alt="{{  $file->desc }}" title="{{ $file->desc }}" class="py-2"/>
    <p class="pb-2">Description : <span class="text-gray-600 text-sm">{{  $file->desc }}</span></p>
    <p class="pb-2">Catégorie : <span class="text-gray-600 text-sm">{{  $file->category }}</span></p>

      <form action="{{route('upload.destroy', $file) }}" method="post">
        @csrf
        @method('DELETE')
          <button type="submit" class="py-2 px-6 rounded text-red-500 hover:bg-red-500 hover:text-white">Delete</button>
      </form>

  </div>
  @endforeach

</div>

@endsection