@extends('layouts.app')

@section('title', 'Novo Artigo')

@section('content')
  <div class="mb-3">
    <h1>Novo Artigo</h1>
  </div>
  <form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" required>
    </div>
    <div class="mb-3">
      <label for="excerpt" class="form-label">Resumo</label>
      <textarea class="form-control" name="excerpt" id="excerpt" rows="2">{{ old('excerpt') }}</textarea>
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Conteúdo</label>
      <textarea class="form-control" name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
    </div>

    <div class="mb-3">
      <label for="published_at" class="form-label">Data de Publicação</label>
      <input type="datetime-local" class="form-control" name="published_at" id="published_at" value="{{ old('published_at') }}">
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" id="status" required>
        <option value="ativado" {{ old('status') == 'ativado' ? 'selected' : '' }}>Ativado</option>
        <option value="desativado" {{ old('status') == 'desativado' ? 'selected' : '' }}>Desativado</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Autores</label>
      <div>
        @foreach($authors as $author)
          <div class="form-check">
            <input type="checkbox" name="authors[]" value="{{ $author->id }}" id="author{{ $author->id }}" class="form-check-input">
            <label for="author{{ $author->id }}" class="form-check-label">{{ $author->name }}</label>
          </div>
        @endforeach
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
