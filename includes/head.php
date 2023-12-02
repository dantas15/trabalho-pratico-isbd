<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trabalho prático ISBD</title>

  <link rel='stylesheet' type='text/css' media='screen' href='estilos.css'>

</head>

<body>
  <nav>
    <div>
      <button type="button" data-bs-toggle="collapse" data-bs-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-icon"></span>
      </button>
      <div class="collapse" id="navbar-links">
        <div class="navbar-nav">
          <a class="nav-link <?= $url == '/' ? 'active' : '' ?>" aria-current="page" href="/">Inicial</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container-sm mt-5">