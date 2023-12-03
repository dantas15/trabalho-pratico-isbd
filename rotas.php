<?php

function exibirMensagem($mensagem) // valor de mensagem é usado no includes
{
  include __DIR__ . '/includes/mensagem.php';
}

function inicial()
{
  include __DIR__ . '/pages/inicial.php';
}

function fornecedor()
{
  exibirMensagem("erro!!");
  include __DIR__ . '/pages/fornecedor.php';
}

function notfound()
{
  include __DIR__ . '/pages/404.php';
}
