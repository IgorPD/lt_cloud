@extends('layouts.app')

@section('title', 'Lista de Autores')

@section('content')
    <h1>Autores</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Novo Autor</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->email }}</td>
                    <td>{{ ucfirst($author->status) }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
