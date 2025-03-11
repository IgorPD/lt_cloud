@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="text-center">
    <h1 class="mb-4">Bem-vindo(a) ao Sistema de Artigos</h1>
    <p class="lead">Gerencie seus artigos e autores de forma simples e intuitiva.</p>
    <div class="row mt-5">
      <div class="col-md-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Artigos</h5>
            <p class="card-text">Veja, crie, edite e exclua artigos.</p>
            <a href="{{ route('articles.index') }}" class="btn btn-primary">Ver Artigos</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Autores</h5>
            <p class="card-text">Gerencie os autores dos artigos.</p>
            <a href="{{ route('authors.index') }}" class="btn btn-primary">Ver Autores</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
