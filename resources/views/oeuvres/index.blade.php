@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Liste des Œuvres d'Art</h2>
    <a href="{{ route('oeuvres.create') }}" class="btn btn-primary mb-3">Ajouter une œuvre</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Artiste</th>
                <th>Année</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($oeuvres as $oeuvre)
            <tr>
                <td><img src="{{ asset('storage/'.$oeuvre->image) }}" width="70" alt="Image"></td>
                <td>{{ $oeuvre->titre }}</td>
                <td>{{ $oeuvre->artiste }}</td>
                <td>{{ $oeuvre->annee }}</td>
                <td>{{ $oeuvre->categorie->nom }}</td>
                <td>
                    <a href="{{ route('oeuvres.show', $oeuvre) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('oeuvres.edit', $oeuvre) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('oeuvres.destroy', $oeuvre) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
