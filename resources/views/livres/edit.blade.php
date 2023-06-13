@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('livres.update', $livre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titre">Title</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ $livre->titre }}" required>
            </div>
            <div class="form-group">
                <label for="annee_publication">Publication Year</label>
                <input type="text" name="annee_publication" id="annee_publication" class="form-control" value="{{ $livre->annee_publication }}" required>
            </div>
            <div class="form-group">
                <label for="nb_pages">Number of Pages</label>
                <input type="number" name="nb_pages" id="nb_pages" class="form-control" value="{{ $livre->nb_pages }}" required>
            </div>
            <div class="form-group">
                <label for="auteur_id">Author</label>
                <select name="auteur_id" id="auteur_id" class="form-control" required>
                    @foreach ($autheurs as $autheur)
                        <option value="{{ $autheur->id }}" {{ $autheur->id == $livre->auteur_id ? 'selected' : '' }}>{{ $autheur->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
@endsection
