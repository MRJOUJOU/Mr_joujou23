@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Liste des Catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une Catégorie</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->nom }}</td>
                        <td>{{ $categorie->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', $categorie) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('categories.destroy', $categorie) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette catégorie ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
