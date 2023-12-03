<?php

/*
  Funções de ajuda
*/
function exibirMensagem($mensagem) // valor de mensagem é usado no includes/mensagem.php
{
  include __DIR__ . '/includes/mensagem.php';
}

function conectarDb()
{
  include __DIR__ . '/db/config.php';
  return mysqli_connect($dbHost, $dbLogin, $dbSenha, $dbNomeBanco, $dbPorta);
}

function inicial()
{
  include __DIR__ . '/pages/inicial.php';
}

/*
  ********** FORNECEDORES **********
*/

/*
  Listar fornecedores (Listar e Deletar)
*/
function fornecedor()
{
  $con = conectarDb();
  include __DIR__ . '/pages/fornecedor.php';
}

/*
  Páginas de erro
*/
function notfound()
{
  include __DIR__ . '/pages/404.php';
}
