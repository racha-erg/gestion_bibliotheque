@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Author</h1>
        <form action="{{ route('autheurs.update', $autheur->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $autheur->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $autheur->nationalite }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
