@extends('layouts.app')

@section('content')
  <section class="w-4/12 p-6 rounded-lg">
    <form action="{{ route('register')}}" method="post">
      @csrf
      <div class="mb-4">
        <label for="name" class="sr-only">Nom</label>
      <input type="text" name="name" id="name" placeholder="Nom" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name')}}">
        @error('name')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="name" class="sr-only">Prénom</label>
        <input type="text" name="firstname" id="firstname" placeholder="Prénom" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('firstname') border-red-500 @enderror" value="{{ old('firstname')}}">
        @error('firstname')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" placeholder="adresse-mail" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email')}}">
        @error('email')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="password" class="sr-only">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
        @error('password')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
        @enderror

      </div>
      <div class="mb-4">
        <label for="password_confirmation" class="sr-only">Mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Mot de passe" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">
        @error('password_confirmation')
        <div class="text-red-500 mt-2 text-sm">
          {{$message}}
        </div>
        @enderror
      </div>
      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"> Register</button>
      </div>
    </form>
  </section>
@endsection