@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Ajouter Emprunt</h1>
        <form action="{{ route('emprunts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="nom">Nom d'emprunteur</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>
                <label for="livre_id">Book</label>
                <select name="livre_id" id="livre_id" class="form-control" required>
                    @foreach ($livres as $livre)
                        <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date_emprunt">Emprunt Date</label>
                <input type="date" name="date_emprunt" id="date_emprunt" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_retour">Return Date</label>
                <input type="date" name="date_retour" id="date_retour" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Loan</button>
        </form>
    </div>
@endsection
