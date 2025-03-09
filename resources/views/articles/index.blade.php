@extends('layouts.app')

@section('title', 'Lista de Artigos')

@section('content')
    <h1>Artigos</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Novo Artigo</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autores</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                        {{ $article->authors->pluck('name')->join(', ') }}
                    </td>
                    <td>{{ ucfirst($article->status) }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline;">
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
