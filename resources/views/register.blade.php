@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
    <h2>Cadastro de Usuário</h2>

    <!-- Exibindo erros -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label>Nome:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Senha:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirmar Senha:</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>

    <p>Já tem uma conta? <a href="{{ route('login') }}">Faça login aqui</a></p>
@endsection
