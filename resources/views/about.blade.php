@extends('layouts.app')

@section('head')
<meta name="robots" content="index,follow">
@endsection

@section('about')
active @endsection

@section('content')
  <section class="p-3 mt-6 md:px-12 xl:px-52">
    <div class="flex justify-center pb-9">
      <img src="img/lys.png" class="h-10 w-8" alt="Fleure de Lys">
      <h2 class=" uppercase px-3 my-auto relative font-serif text-3xl font-bold">Atelier de la Forge Royale</h2>
      <img src="img/lys.png" class="h-10 w-8" alt="Fleure de Lys">
    </div>
    {!!$about[0]->body!!}
  </section>
  @if($files->count())
  <div class="p-3 md:w-1/3 order-1">
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
  <section class="p-3 mt-6 md:px-12 xl:px-52 text-center">
    @if(file_exists( public_path().'/img/devanture.png'))
      <img src="/img/devanture.png" alt="Devanture du magasin" class="mx-auto mb-6 rounded-lg">
    @endif
    <div>
      <p>Devanture de notre magasin, 53 rue de Montreuil 75011 Paris</p>
    </div>
  </section>
  @endif


@endsection