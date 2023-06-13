@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Add New Book</h1>
        <form action="{{ route('livres.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Title</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="auteur_id">Author</label>
                <select name="auteur_id" id="auteur_id" class="form-control" required>
                    @foreach ($autheurs as $autheur)
                        <option value="{{ $autheur->id }}">{{ $autheur->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="annee_publication">Publication Year</label>
                <input type="date" name="annee_publication" id="annee_publication" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nb_pages">Number of Pages</label>
                <input type="number" name="nb_pages" id="nb_pages" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
