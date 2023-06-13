@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Ajouter Autheur</h1>
        <form action="{{ route('autheurs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nationalite">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
