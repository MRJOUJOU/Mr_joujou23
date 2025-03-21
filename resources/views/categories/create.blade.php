@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Ajouter une Catégorie</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection
