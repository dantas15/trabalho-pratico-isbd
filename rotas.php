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
  Criar fornecedor
*/
function criarFornecedor()
{
  $dados = [];

  if ($_POST) {
    $con = conectarDb();

    // Validar os dados do formulário
    $nomeForn = $_POST['nomeForn'];
    $numTelefone = $_POST['numTelefone'];
    $logradouro = $_POST['logradouro'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];

    // Realizar a validação dos campos obrigatórios
    if (empty($nomeForn) || empty($numTelefone) || empty($logradouro) || empty($cidade) || empty($numero) || empty($bairro) || empty($cep) || empty($estado)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sql = "INSERT INTO Fornecedor (nomeForn, numTelefone, logradouro, cidade, complemento, numero, bairro, cep, estado) VALUES ('$nomeForn', '$numTelefone', '$logradouro', '$cidade', '$complemento', '$numero', '$bairro', '$cep', '$estado')";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Cadastro realizado com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao cadastrar fornecedor. Por favor, tente novamente. $mensagemDeErro");
      }
    }
    mysqli_close($con);
  }

  include __DIR__ . '/pages/criarFornecedor.php';
}

/*
  Páginas de erro
*/
function notfound()
{
  include __DIR__ . '/pages/404.php';
}
