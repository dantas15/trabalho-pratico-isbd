<?php

$url = explode('?', $_SERVER['REQUEST_URI']);

// incluir o mesmo head em todas as rotas
include __DIR__ . '/includes/head.php';

// iniciar conexão com o banco de dados
include('db/config.php');
$con = mysqli_connect($dbHost, $dbLogin, $dbSenha, $dbNomeBanco, $dbPorta);

// importar as funções que vão ser utilizadas nas rotas
include 'rotas.php';

switch ($url[0]) {
  case '/':
    inicial();
    break;
  default:
    notfound();
    break;
}

// fechar conexão com o banco de dados
mysqli_close($con);

// incluir o mesmo head em todas as rotas (basicamente o fechamento das tags html)
include __DIR__ . '/includes/foot.php';
