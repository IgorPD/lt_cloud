<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark" id="themeRoot">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-body-teatiary">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
             <a class="nav-link" href="{{ route('articles.index') }}">Artigos</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="{{ route('authors.index') }}">Autores</a>
           </li>
         </ul>
         <form action="{{ route('logout') }}" method="POST" class="d-flex">
           @csrf
           <button type="submit" class="btn btn-outline-light">Sair</button>
         </form>
      </div>
    </div>
  </nav>

  <div class="container">
    @if(session('success'))
      <div class="alert alert-success">
         {{ session('success') }}
      </div>
    @endif

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function(){
      // Seleciona todos os elementos com a classe 'alert'
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(function(alert) {
        setTimeout(function(){
          alert.classList.add('fade');
          alert.style.transition = "opacity 0.5s ease-out";
          alert.style.opacity = "0";
          setTimeout(function(){
            alert.remove();
          }, 500);
        }, 3000);
      });
    });
  </script>
</body>
</html>
