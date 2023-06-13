@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>List of Authors</h1>
        <a href="{{ route('autheurs.create') }}" class="btn btn-primary">Add New Author</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autheurs as $autheur)
                    <tr>
                        <td>{{ $autheur->nom }}</td>
                        <td>{{ $autheur->prenom }}</td>
                        <td>
                            <a href="{{ route('autheurs.edit', $autheur->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('autheurs.destroy', $autheur->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this author?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
