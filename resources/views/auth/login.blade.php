<html lang="pt-br" data-bs-theme="dark" id="themeRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        .form-container {
            max-width: 350px;
            padding: 1rem;
        }
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-teatiary">
    <main class="w-100 m-auto form-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" class="m-4" alt="Bootstrap logo" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="Seu email" value="{{ old('email') }}" required>
                <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Senha" required>
                <label for="floatingPassword">Senha</label>
            </div>
            <div class="form-check text-start my-3">
                <input type="checkbox" class="form-check-input" id="flexCheckDefault" name="remember">
                <label class="form-check-label" for="flexCheckDefault">Lembrar-se de mim</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100 py-2 mt-2">Não tem conta? CADASTRE-SE</a>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
