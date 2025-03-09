@extends('layouts.app')

@section('title', 'Editar Autor')

@section('content')
    <h1>Editar Autor</h1>

    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" value="{{ $author->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $author->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Biografia</label>
            <textarea name="bio" class="form-control">{{ $author->bio }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="ativado" {{ $author->status == 'ativado' ? 'selected' : '' }}>Ativado</option>
                <option value="desativado" {{ $author->status == 'desativado' ? 'selected' : '' }}>Desativado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection
