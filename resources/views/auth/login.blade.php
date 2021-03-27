@extends('layouts.app')

@section('content')
  <section class="w-4/12 p-6 rounded-lg">
    @if(session('status'))
    <div class="text-red-500 mt-2 text-sm">
      {{session('status')}}
    </div>
    @endif
    <form action="{{ route('login')}}" method="post">
      @csrf
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
        <div class="flex items-center">
          <label for="remember">Remember me</label>
          <input type="checkbox" name="remember" id="remember" class="mr-2">
        </div>
      </div>
      <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 mt-2 rounded font-medium w-full"> Login</button>
      </div>
    </form>
  </section>
@endsection