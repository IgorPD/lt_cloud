@extends('layouts.app')

@section('title', 'Autores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Autores</h1>
        </div>
        <div>
            <a href="{{ route('authors.create') }}" class="btn btn-primary">Novo Autor</a>
        </div>
    </div>

    <div class="mb-3">
        <form action="{{ route('authors.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar autores..."
                    value="{{ request('search') }}">
                <select name="status" class="form-select" style="max-width: 170px;">
                    <option value="">Todos os status</option>
                    <option value="ativado" {{ request('status') == 'ativado' ? 'selected' : '' }}>Ativado</option>
                    <option value="desativado" {{ request('status') == 'desativado' ? 'selected' : '' }}>Desativado</option>
                </select>
                <button type="submit" class="btn btn-outline-primary">Buscar</button>
            </div>
        </form>
    </div>

    <div class="w-100 overflow-x-auto">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Biografia</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->short_name }}</td>
                        <td>{{ $author->email }}</td>
                        <td>{{ $author->short_bio }}</td>
                        <td>{{ ucfirst($author->status) }}</td>
                        <td class="text-nowrap">
                            <div class="d-flex gap-1">
                                <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning">Editar</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $author->id }}">
                                    Excluir
                                </button>
                            </div>

                            <!-- Modal de confirmação para exclusão -->
                            <div class="modal fade" id="confirmDeleteModal{{ $author->id }}" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel{{ $author->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $author->id }}">
                                                Confirmar Exclusão</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza que deseja excluir o autor <strong>{{ $author->name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('authors.destroy', $author) }}" method="POST"
                                                class="d-inline-block">
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
    </div>
@endsection
