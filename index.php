<?php

$url = explode('?', $_SERVER['REQUEST_URI']);

// incluir o mesmo head em todas as rotas
include __DIR__ . '/includes/head.php';

// importar as funções que vão ser utilizadas nas rotas
include 'rotas.php';

switch ($url[0]) {
  case '/':
    inicial();
    break;
  case '/fornecedor':
    fornecedor();
    break;
  case '/fornecedor/criar':
    criarFornecedor();
    break;
  default:
    notfound();
    break;
}

// incluir o mesmo head em todas as rotas (basicamente o fechamento das tags html)
include __DIR__ . '/includes/foot.php';
