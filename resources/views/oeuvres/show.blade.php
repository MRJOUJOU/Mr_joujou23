@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">{{ $oeuvre->titre }}</h2>
    <div class="text-center">
        <img src="{{ asset('storage/'.$oeuvre->image) }}" width="300">
    </div>
    <p><strong>Artiste :</strong> {{ $oeuvre->artiste }}</p>
    <p><strong>Année :</strong> {{ $oeuvre->annee }}</p>
    <p><strong>Catégorie :</strong> {{ $oeuvre->categorie->nom }}</p>
    <p><strong>Description :</strong> {{ $oeuvre->description }}</p>
    <a href="{{ route('oeuvres.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
