<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" id="themeRoot">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Cadastro</title>
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
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
        </symbol>
    </svg>

    <main class="w-100 m-auto form-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" class="m-4" alt="Bootstrap logo" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Cadastro</h1>

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
                <input type="text" class="form-control" id="floatingName" name="name" placeholder="Seu nome" value="{{ old('name') }}" required>
                <label for="floatingName">Nome</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="Seu email" value="{{ old('email') }}" required>
                <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Senha" required>
                <label for="floatingPassword">Senha</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPasswordConfirm" name="password_confirmation" placeholder="Confirme sua senha" required>
                <label for="floatingPasswordConfirm">Confirme sua senha</label>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Cadastrar</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
