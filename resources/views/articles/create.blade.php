@extends('layouts.app')

@section('title', 'Novo Artigo')

@section('content')
    <h1>Novo Artigo</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Conteúdo</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Autores</label>
            <select name="authors[]" multiple class="form-control">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="ativado">Ativado</option>
                <option value="desativado">Desativado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
