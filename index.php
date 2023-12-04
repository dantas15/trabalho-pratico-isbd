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
  case '/fornecedor/editar':
    editarFornecedor();
    break;
  case '/fornecedor/deletar':
    deletarFornecedor();
    break;
  case '/categoria':
    categoria();
    break;
  case '/categoria/criar':
    criarCategoria();
    break;
  case '/categoria/editar':
    editarCategoria();
    break;
  case '/categoria/deletar':
    deletarCategoria();
    break;
  case '/colaborador':
    colaborador();
    break;
  case '/colaborador/criar':
    criarColaborador();
    break;
  case '/colaborador/editar':
    editarColaborador();
    break;
  case '/colaborador/deletar':
    deletarColaborador();
    break;
  case '/cliente':
    cliente();
    break;
  case '/cliente/criar':
    criarCliente();
    break;
  case '/cliente/editar':
    editarCliente();
    break;
  case '/cliente/deletar':
    deletarCliente();
    break;
  default:
    notfound();
    break;
}

// incluir o mesmo head em todas as rotas (basicamente o fechamento das tags html)
include __DIR__ . '/includes/foot.php';
