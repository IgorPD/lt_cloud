@extends('layouts.app')

@section('title', 'Editar Artigo')

@section('content')
    <h1>Editar Artigo</h1>

    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" value="{{ $article->title }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Conteúdo</label>
            <textarea name="content" class="form-control">{{ $article->content }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Autores</label>
            <select name="authors[]" multiple class="form-control">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ in_array($author->id, $article->authors->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="ativado" {{ $article->status == 'ativado' ? 'selected' : '' }}>Ativado</option>
                <option value="desativado" {{ $article->status == 'desativado' ? 'selected' : '' }}>Desativado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection
