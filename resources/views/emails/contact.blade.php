@component('mail::message')
<p>Réception d'une prise de contact avec les éléments suivants :</p>
<ul>
  <li><strong>Prénom</strong> : {{ $contact['firstname'] }}</li>
  <li><strong>Nom</strong> : {{ $contact['name'] }}</li>
  <li><strong>Téléphone</strong> : {{ $contact['tel'] }}</li>
  <li><strong>Email</strong> : {{ $contact['email'] }}</li>
  <li><strong>Prestation</strong> : {{ $contact['prestation'] }}</li>
  <li><strong>Message</strong> : {{ $contact['message'] }}</li>
</ul>
@endcomponent