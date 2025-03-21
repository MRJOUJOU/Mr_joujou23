@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Ajouter une Œuvre</h2>
    <form action="{{ route('oeuvres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre') }}" required>
            @error('titre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Artiste :</label>
            <input type="text" name="artiste" class="form-control" value="{{ old('artiste') }}" required>
            @error('artiste')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Année de fabrication :</label>
            <input type="number" name="annee_fabrication" class="form-control" value="{{ old('annee_fabrication') }}" required>
            @error('annee_fabrication')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Date d'acquisition :</label>
            <input type="date" name="date_acquisition" class="form-control" value="{{ old('date_acquisition') }}" required>
            @error('date_acquisition')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Prix estimé :</label>
            <input type="number" step="0.01" name="prix_estime" class="form-control" value="{{ old('prix_estime') }}" required>
            @error('prix_estime')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description :</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Catégorie :</label>
            <select name="categorie_id" class="form-control" required>
                <option value="">Sélectionnez une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
            @error('categorie_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Image :</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
