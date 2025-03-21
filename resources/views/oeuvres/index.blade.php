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
            @forelse($oeuvres as $oeuvre)
            <tr>
                <td>
                    @if($oeuvre->image)
                        <img src="{{ asset('storage/'.$oeuvre->image) }}" width="70" alt="{{ $oeuvre->titre }}">
                    @else
                        <span>Pas d'image</span>
                    @endif
                </td>
                <td>{{ $oeuvre->titre }}</td>
                <td>{{ $oeuvre->artiste }}</td>
                <td>{{ $oeuvre->annee_fabrication }}</td>
                <td>{{ $oeuvre->categorie->nom }}</td>
                <td>
                    <a href="{{ route('oeuvres.show', $oeuvre) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('oeuvres.edit', $oeuvre) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('oeuvres.destroy', $oeuvre) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette œuvre ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Aucune œuvre trouvée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
