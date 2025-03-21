@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Ajouter une Œuvre</h2>
    <form action="{{ route('oeuvres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" name="titre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Artiste :</label>
            <input type="text" name="artiste" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Année :</label>
            <input type="number" name="annee" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Catégorie :</label>
            <select name="categorie_id" class="form-control">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Image :</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
