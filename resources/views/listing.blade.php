@extends('template')
@section('contenu')
  <div class="col-sm-offset-3 col-sm-6">
    <table class="table">
      <thead>
        <tr>
          <td>Famille</td>
          <td>Nom</td>
          <td>Description</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($animals as $animal)
          <tr class="{{ $animal->getType()->getBootstrapCouleur() }}">
            <td>{{ $animal->getType()->getNom() }}</td>
            <td>{{ $animal->getNom() }}</td>
            <td>{{ $animal->speak() }} et m{{ $animal->getType()->getSkinType() }} {{ $animal->getSkin() }}.</td>
            <td><a class="btn btn-{{ $animal->getType()->getBootstrapCouleur() }} btn-sm" href="{{ url('animals/'.$animal->getId()) }}">Modifier</a></td>
            <td><a class="btn btn-default btn-sm" href="{{ url('animals_delete/'.$animal->getId()) }}" onclick="return confirm('Voulez-vous vraiment supprimer cet animal ?')">Supprimer</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
