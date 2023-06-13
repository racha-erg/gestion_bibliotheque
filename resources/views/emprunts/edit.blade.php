@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Edit Emprunt</h1>
        <form action="{{ route('emprunts.update', $emprunt->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="livre_id">Livre</label>
                <select name="livre_id" id="livre_id" class="form-control">
                    @foreach ($livres as $livre)
                        <option value="{{ $livre->id }}" @if ($livre->id == $emprunt->livre_id) selected @endif>{{ $livre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_emprunt">Date d'emprunt</label>
                <input type="date" name="date_emprunt" id="date_emprunt" class="form-control" value="{{ $emprunt->date_emprunt }}">
            </div>

            <div class="form-group">
                <label for="date_retour">Date de retour</label>
                <input type="date" name="date_retour" id="date_retour" class="form-control" value="{{ $emprunt->date_retour }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
