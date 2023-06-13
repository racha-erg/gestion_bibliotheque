@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>List of Books</h1>
        <a href="{{ route('livres.create') }}" class="btn btn-primary">Ajouter livre</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Anne de publication </th>
                    <th>Nombre de Pages</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->Autheur->nom }}</td>
                        <td>{{ $livre->anne_publication }}</td>
                        <td>{{ $livre->nb_pages }}</td>
                        <td>
                            <a href="{{ route('livres.show', $livre->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $livres->links() }}
    </div>
@endsection
