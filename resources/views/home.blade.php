@extends('layouts.app')
@section('head')
<meta name="robots" content="index,follow">
@endsection

@section('home')
active @endsection

@section('content')
  <section id="home">
    <div class="p-3 md:mx-12 md:py-24 xl:py-32 md:flex justify-around md:text-white">
      <article id="presentation" class="flex-1 p-3 my-3 bg-white md:max-w-xl md:my-0 md:max-w-md md:bg-gray-800 md:bg-opacity-90">
        <h2 class="text-center font-bold pb-3 text-2xl font-serif">Atelier de la Forge Royale</h1>
        <div class="px-5 pb-6">
          <div class="py-3 md:text-justify">
            <p>Vous avez un problème de canalisation, de plomberie, d'assainissement de votre maison ou de votre entreprise, l'Atelier de la Forge Royale œuvre pour vous aider et répondre au mieux à vos besoins.</p>
            <p>Avec plus de 20 ans d'expérience et de savoir faire, nous avons pour but de satisfaire votre demande avec un travail de qualité pour un résultat impeccable.</p>
          </div>
          <div class="py-3">
          <p><strong>Prestations</strong> : 
            @if($links->count())
            <ul>
              @foreach($links as $link)
                <li>- {{$link->title}}</li>
              @endforeach
            </ul>
            @endif
          </p>
        </div>
        <div class="py-3">
          <p><strong>Rayon de déplacement :</strong> Île-de-France</p>
        </div>
        <div class="py-3">
          <p>N'hésitez pas à nous contacter par téléphone au 
            <span class="primary"><a href="tel:0143701120" class="text-blue-300 rounded hover:bg-gray-700 focus:bg-gray-700 p-1 text-lg font-bold">01 43 70 11 20</a> /<br><a href="tel:0617910147" class="text-blue-300 rounded hover:bg-gray-700 focus:bg-gray-700 p-1 text-lg font-bold">06 17 91 01 47</a> </span> 
            ou en remplissant notre formulaire de contact.</p>
        </div>
          <p><strong>Numéro de siret :</strong> 43757319900027</p>
          <p><strong>Adresse de l'entreprise :</strong><a href="https://www.google.fr/maps/place/53+Rue+de+Montreuil,+75011+Paris" class="text-blue-300 hover:text-blue-300 rounded hover:bg-gray-700 focus:text-blue-300 focus:bg-gray-700 p-2 font-bold text-lg">53 Rue de Montreuil 75011 Paris</a></p>
        </div>
      </article>
      <div id="contact" class="flex-1 p-3 md:w-1/2 md:max-w-xl bg-gray-800 md:bg-gray-800 md:bg-opacity-90 text-black">
        @include('contact_form')
      </div>
    </section>
    </div>
  <section id="prestations" class="p-3 my-9 md:px-12 md:flex justify-between flex-wrap xl:px-52">
    <h2 class="text-center py-3 uppercase font-bold text-2xl md:w-full font-serif">Prestations</h1>
    @if($posts->count())
    <div class="md:p-6 md:flex flex-wrap">
      @foreach($posts as $post)
      <div class="p-3 m-3 md:w-1/3 md:px-8 flex-1 rounded-lg hover:bg-gray-100 bg-opacity-90 text-justify">
        <a href="{{route('post',$post->id)}}">
          @if(file_exists( public_path().'/storage/'.$post->title.'.svg' ))
            <img src="/storage/{{$post->title}}.svg" alt="{{$post->title}} icon" class="w-32 h-32 m-auto mb-6">
          @endif
          <h3 class="p-3 mb-2 text-xl uppercase text-center font-bold font-serif">{{$post->title}}</h2>
          <p class="pb-3 mb-2">{{$post->body}}</p>
        </a>
      </div>
      @endforeach
        @else
        <p>There are no posts</p>
      @endif
    <div class="w-full text-center text-white uppercase p-3 md:m-3 text-lg font-bold">
      <a href="{{  route('prestations')  }}" class="mx-auto bg-c-d p-3 hover:bg-blue-400 hover:underline focus:bg-blue-400 focus:underline">Voir toutes nos prestations</a>
    </div>
  </section>
@endsection