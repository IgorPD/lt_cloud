@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2>Login</h2>

    <!-- Mensagem de erro -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Mensagem de sucesso -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Senha:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>

    <p>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se aqui</a></p>
@endsection
