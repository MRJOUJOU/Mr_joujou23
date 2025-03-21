@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Modifier la Catégorie</h1>

        <form action="{{ route('categories.update', ['category' => $categorie->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $categorie->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $categorie->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
