@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Détails de la Catégorie</h1>

        <p><strong>ID :</strong> {{ $categorie->id }}</p>
        <p><strong>Nom :</strong> {{ $categorie->nom }}</p>
        <p><strong>Description :</strong> {{ $categorie->description }}</p>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
    </div>
@endsection
