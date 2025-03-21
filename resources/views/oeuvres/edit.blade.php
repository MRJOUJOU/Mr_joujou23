@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Modifier une Œuvre</h2>
    <form action="{{ route('oeuvres.update', $oeuvre) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" name="titre" class="form-control" value="{{ $oeuvre->titre }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Artiste :</label>
            <input type="text" name="artiste" class="form-control" value="{{ $oeuvre->artiste }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Année :</label>
            <input type="number" name="annee" class="form-control" value="{{ $oeuvre->annee }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Catégorie :</label>
            <select name="categorie_id" class="form-control">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $oeuvre->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Image :</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/'.$oeuvre->image) }}" width="100">
        </div>
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>
@endsection
