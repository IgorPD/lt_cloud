@extends('layouts.app')

@include('components.alert-message')

@section('title', 'Novo Autor')

@section('content')
  <div class="mb-3">
    <h1>Novo Autor</h1>
  </div>
  <form action="{{ route('authors.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
      <label for="bio" class="form-label">Biografia</label>
      <textarea class="form-control" name="bio" id="bio" rows="4">{{ old('bio') }}</textarea>
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-select" name="status" id="status" required>
        <option value="ativado" {{ old('status') == 'ativado' ? 'selected' : '' }}>Ativado</option>
        <option value="desativado" {{ old('status') == 'desativado' ? 'selected' : '' }}>Desativado</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection
