@extends('layouts.app')

@section('title', 'Artigos')

@section('content')
  <div class="d-flex justify-content-between mb-3">
    <h1>Artigos</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Novo Artigo</a>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <!--<th>ID</th>-->
        <th>Título</th>
        <th>Slug</th>
        <th>Resumo</th>
        <th>Publicado Em</th>
        <th>Status</th>
        <th>Autores</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $article)
        <tr>
          <!--<td>{{ $article->id }}</td>-->
          <td>{{ $article->title }}</td>
          <td>{{ $article->slug }}</td>
          <td>{{ $article->excerpt }}</td>
          <td>{{ $article->published_at ? $article->published_at->format('d/m/Y H:i') : '-' }}</td>
          <td>{{ ucfirst($article->status) }}</td>
          <td>
            @foreach($article->authors as $author)
              <span class="badge bg-secondary">{{ $author->name }}</span>
            @endforeach
          </td>
          <td>
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">Editar</a>
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $article->id }}">
              Excluir
            </button>
            <!-- Modal de confirmação para exclusão do artigo -->
            <div class="modal fade" id="confirmDeleteModal{{ $article->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $article->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $article->id }}">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                  </div>
                  <div class="modal-body">
                    Tem certeza que deseja excluir o artigo <strong>{{ $article->title }}</strong>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
