@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Liste des Catégories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $categorie)
            <tr>
                <td>{{ $categorie->nom }}</td>
                <td>{{ $categorie->description ?? 'Aucune description' }}</td>
                <td>
                    <a href="{{ route('categories.show', $categorie) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Aucune catégorie trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
