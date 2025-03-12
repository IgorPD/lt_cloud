<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" id="themeRoot">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('articles.grid') }}">Artigos</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarArticle" aria-controls="navbarArticle" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarArticle">
         <ul class="navbar-nav me-auto">
           <li class="nav-item">
             <a class="nav-link" href="{{ route('articles.grid') }}">Ver Todos</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="{{ route('articles.create') }}">Novo Artigo</a>
           </li>
           <!-- Adicione outros links se necessário -->
         </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
