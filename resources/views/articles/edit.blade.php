@extends('layouts.app')

@section('title', 'Editar Artigo')

@section('content')
  <div class="mb-3">
    <h1>Editar Artigo</h1>
  </div>
  <form action="{{ route('articles.update', $article) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Título*</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $article->title) }}" required>
    </div>
    <div class="mb-3">
      <label for="excerpt" class="form-label">Resumo</label>
      <textarea class="form-control" name="excerpt" id="excerpt" rows="2">{{ old('excerpt', $article->excerpt) }}</textarea>
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Conteúdo*</label>
      <textarea class="form-control" name="content" id="content" rows="5" required>{{ old('content', $article->content) }}</textarea>
    </div>
    <div class="mb-3">

      <label for="published_at" class="form-label">Data de Publicação*</label>
      <input type="datetime-local" class="form-control" name="published_at" id="published_at"
             value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}" required>
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" id="status" required>
        <option value="ativado" {{ old('status', $article->status) == 'ativado' ? 'selected' : '' }}>Ativado</option>
        <option value="desativado" {{ old('status', $article->status) == 'desativado' ? 'selected' : '' }}>Desativado</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Autores</label>
      <div>
        @foreach($authors as $author)
          <div class="form-check">
            <input type="checkbox" name="authors[]" value="{{ $author->id }}" id="author{{ $author->id }}" class="form-check-input"
                   {{ in_array($author->id, $article->authors->pluck('id')->toArray()) ? 'checked' : '' }}>
            <label for="author{{ $author->id }}" class="form-check-label">{{ $author->name }}</label>
          </div>
        @endforeach
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
@endsection
