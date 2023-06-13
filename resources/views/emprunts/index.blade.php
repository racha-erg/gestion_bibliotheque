@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>List des Emprunts</h1>
        <a href="{{ route('emprunts.create') }}" class="btn btn-primary">Add Loan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom d'emprunteur</th>
                    <th>Titre de Livre</th>
                    <th>Emprunt Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emprunts as $emprunt)
                    <tr>
                        <td>{{ $emprunt->nom }}</td>
                        <td>{{ $emprunt->prenom }}</td>
                        <td>{{ $emprunt->livre->titre }}</td>
                        <td>{{ $emprunt->date_emprunt }}</td>
                        <td>{{ $emprunt->date_retour }}</td>
                        <td>
                            <a href="{{ route('emprunts.edit', $emprunt->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('emprunts.destroy', $emprunt->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this loan?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
