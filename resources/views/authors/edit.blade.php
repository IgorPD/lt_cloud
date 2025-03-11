@extends('layouts.app')

@section('title', 'Editar Autor')

@section('content')
  <div class="mb-3">
    <h1>Editar Autor</h1>
  </div>
  <form action="{{ route('authors.update', $author) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $author->name) }}" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $author->email) }}" required>
    </div>
    <div class="mb-3">
      <label for="bio" class="form-label">Biografia</label>
      <textarea class="form-control" name="bio" id="bio" rows="4">{{ old('bio', $author->bio) }}</textarea>
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" id="status" required>
        <option value="ativado" {{ old('status', $author->status) == 'ativado' ? 'selected' : '' }}>Ativado</option>
        <option value="desativado" {{ old('status', $author->status) == 'desativado' ? 'selected' : '' }}>Desativado</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
@endsection
