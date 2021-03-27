@extends('layouts.app')

@section('content')
  <div class="p-3 md:px-12 xl:px-52">
      <form action="{{route('about.update',$id=1)}}" method="post">
        @csrf
        <div class="mb-4">
          <div class="mb-4">
            <label for="body">Presentation</label>
            <textarea name="body" id="body" cols="30" rows="6" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Body">{{ $about->body }}</textarea>
              @error('presentation')
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