<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trabalho prático ISBD</title>

  <link rel="stylesheet" type="text/css" media='screen' href="/estilos.css">

</head>

<body>
  <nav class="navbar">
    <div class="navbar-wrapper">
      <span class="navbar-logo">Gestão de vendas</span>
      <div class="navbar-links">
        <div class="navbar-nav">
          <a class="nav-link <?= $url[0] == '/' ? 'ativo' : '' ?>" aria-current="page" href="/">Inicial</a>
          <a class="nav-link <?= is_numeric(strpos($url[0], '/fornecedor')) ? 'ativo' : '' ?>" aria-current="page" href="/fornecedor">Fornecedor</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="conteudo-principal">