@extends('layouts.app')

@section('content')
  <div class="p-3 md:px-12 xl:px-52">
    @if($contacts->count())
      @foreach($contacts as $contact)
        <div class="my-4">
          <span class="font-bold capitalize text-lg">{{$contact->firstname}} {{$contact->name}}</span>
          <span class="text-gray-700 text-lg">{{$contact->created_at->format('Y-m-d H:i')}}</span>
          <p>Tel : {{$contact->tel}} | Email : {{$contact->email}}</p>
          <h3 class="my-1 text-lg">{{$contact->prestation}}</h3>
          <p class="mb-2">{{$contact->message}}</p>
          <div class="mb-4 flex">
            <form action="{{route('contact.destroy', $contact) }}" method="post" class="px-2 mx-2">
              @csrf
              @method('DELETE')
                <button type="submit" class="py-2 px-6 rounded text-red-500 hover:bg-red-500 hover:text-white">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
    @else
      <p>There are no contacts</p>
    @endif
  </div>
@endsection