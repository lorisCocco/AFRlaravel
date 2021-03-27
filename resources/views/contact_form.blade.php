<h2 class="text-center font-bold pb-3 text-2xl text-white font-serif">Formulaire de contact</h2>
@if(session()->has('success'))
    <div class="block w-3/4 m-auto my-3 p-2 text-center text-white">
        <p>{{ session()->get('success') }}</p>
    </div>
    @else
    <form action="{{ route('home')}}" method="post">
      @csrf
      <div class="mb-4">
        <label for="name" class="sr-only">Prénom</label>
        <input type="text" name="firstname" id="firstname" placeholder="Prénom *" class="placeholder-gray-500 block w-3/4 m-auto my-3 p-2 @error('firstname') ring-4 ring-red-500 @enderror" value="{{ old('firstname')}}">
        @error('firstname')
        <div class="text-red-500 my-2 text-lg w-3/4 mx-auto">
          Veuillez rentrer votre prénom.
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="name" class="sr-only">Nom</label>
        <input type="text" name="name" id="name" placeholder="Nom *" class="placeholder-gray-500 block w-3/4 m-auto my-3 p-2 @error('name') ring-4 ring-red-500 @enderror" value="{{ old('name')}}">
        @error('name')
        <div class="text-red-500 my-2 text-lg w-3/4 mx-auto">
          Veuillez rentrer votre nom.
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="tel" class="sr-only">Tel</label>
        <input type="tel" name="tel" id="tel" placeholder="N° de téléphone *" class="placeholder-gray-500 block w-3/4 m-auto my-3 p-2 @error('tel') ring-4 ring-red-500 @enderror" value="{{ old('tel')}}">
        @error('tel')
        <div class="text-red-500 my-2 text-lg w-3/4 mx-auto">
          Veuillez rentrer votre numéro de téléphone.
        </div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" placeholder="adresse@mail.com *" class="placeholder-gray-500 block w-3/4 m-auto my-3 p-2 @error('email') ring-4 ring-red-500 @enderror" value="{{ old('email')}}">
        @error('email')
        <div class="text-red-500 my-2 text-lg w-3/4 mx-auto">
          Veuillez rentrer votre adresse e-mail.
        </div>
        @enderror
      </div>
      <select class="text-black block w-3/4 m-auto my-3 p-2" name="prestation" id="prestation">
        @if($links->count())
          @foreach ($links as $link)
            <option value="{{$link->title}}">{{$link->title}}</option>
          @endforeach
            <option value="Autre">Autre</option>
        @endif
      </select>
      <textarea class="block w-3/4 m-auto my-3 p-2 placeholder-gray-500" name="message" id="message" placeholder="Votre message *"></textarea>
    
    <input class="block w-1/2 p-2 m-auto my-6 bg-gray-400 text-xl" type="submit" value="ENVOYER" id="submit" disabled>
    </form>
@endif