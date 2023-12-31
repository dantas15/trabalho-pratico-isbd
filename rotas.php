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
  Editar fornecedor
*/
function editarFornecedor()
{
  $idEditar = isset($_GET['id']) ? $_GET['id'] : null;
  $con = conectarDb();

  $dados = false;

  if ($_POST) {
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
      $sql = "UPDATE Fornecedor SET nomeForn='$nomeForn', numTelefone='$numTelefone', logradouro='$logradouro', cidade='$cidade', complemento='$complemento', numero='$numero', bairro='$bairro', cep='$cep', estado='$estado' WHERE idFornecedor='$idEditar'";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Fornecedor atualizado com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao atualizar fornecedor. Por favor, tente novamente. $mensagemDeErro");
      }

      // Coloque os valores do post em $dados para que o formulário não fique vazio
      $dados['nomeForn'] = $nomeForn;
      $dados['numTelefone'] = $numTelefone;
      $dados['logradouro'] = $logradouro;
      $dados['cidade'] = $cidade;
      $dados['complemento'] = $complemento;
      $dados['numero'] = $numero;
      $dados['bairro'] = $bairro;
      $dados['cep'] = $cep;
      $dados['estado'] = $estado;
    }
  } else {
    $sql = "SELECT * FROM Fornecedor WHERE idFornecedor='$idEditar'";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result, MYSQLI_ASSOC);
  }

  mysqli_close($con);

  if (!$dados) {
    exibirMensagem("Fornecedor não encontrado.");
    include __DIR__ . '/pages/404.php';
    return;
  }

  include __DIR__ . '/pages/editarFornecedor.php';
}

/*
  Deletar fornecedor
*/
function deletarFornecedor()
{
  $idDeletar = isset($_GET['id']) ? $_GET['id'] : null;

  $con = conectarDb();

  $sql = "DELETE FROM Fornecedor WHERE idFornecedor='$idDeletar'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    exibirMensagem("Fornecedor deletado com sucesso!");
  } else {
    $mensagemDeErro = mysqli_error($con);
    exibirMensagem("Erro ao deletar fornecedor. Por favor, tente novamente. $mensagemDeErro");
  }

  mysqli_close($con);

  include __DIR__ . '/pages/fornecedor.php';
}

/*
  ********** CATEGORIAS **********
*/

/*
  Listar categorias (Listar e Deletar)
*/
function categoria()
{
  include __DIR__ . '/pages/categoria.php';
}

/*
  Criar categoria
*/
function criarCategoria()
{
  $dados = [];

  if ($_POST) {
    $con = conectarDb();

    // Validar os dados do formulário
    $nomeCat = $_POST['nomeCat'];

    // Realizar a validação dos campos obrigatórios
    if (empty($nomeCat)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sql = "INSERT INTO Categoria (nomeCat) VALUES ('$nomeCat')";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Cadastro realizado com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao cadastrar categoria. Por favor, tente novamente. $mensagemDeErro");
      }
    }
    mysqli_close($con);
  }

  include __DIR__ . '/pages/criarCategoria.php';
}

/*
  Editar categoria
*/
function editarCategoria()
{
  $idEditar = isset($_GET['id']) ? $_GET['id'] : null;
  $con = conectarDb();

  $dados = false;

  if ($_POST) {
    // Validar os dados do formulário
    $nomeCat = $_POST['nomeCat'];

    // Realizar a validação dos campos obrigatórios
    if (empty($nomeCat)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sql = "UPDATE Categoria SET nomeCat='$nomeCat' WHERE idCategoria='$idEditar'";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Categoria atualizada com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao atualizar categoria. Por favor, tente novamente. $mensagemDeErro");
      }

      // Coloque os valores do post em $dados para que o formulário não fique vazio
      $dados['nomeCat'] = $nomeCat;
    }
  } else {
    $sql = "SELECT * FROM Categoria WHERE idCategoria='$idEditar'";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result, MYSQLI_ASSOC);
  }

  mysqli_close($con);

  if (!$dados) {
    exibirMensagem("Categoria não encontrada.");
    include __DIR__ . '/pages/404.php';
    return;
  }

  include __DIR__ . '/pages/editarCategoria.php';
}

/*
  Deletar categoria
*/
function deletarCategoria()
{
  $idDeletar = isset($_GET['id']) ? $_GET['id'] : null;

  $con = conectarDb();

  $sql = "DELETE FROM Categoria WHERE idCategoria='$idDeletar'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    exibirMensagem("Categoria deletada com sucesso!");
  } else {
    $mensagemDeErro = mysqli_error($con);
    exibirMensagem("Erro ao deletar categoria. Por favor, tente novamente. $mensagemDeErro");
  }

  mysqli_close($con);

  include __DIR__ . '/pages/categoria.php';
}

/*
  ********** COLABORADORES **********
*/

/*
  Listar colaboradores (Listar e Deletar)
*/
function colaborador()
{
  include __DIR__ . '/pages/colaborador.php';
}

/*
  Criar colaborador
*/
function criarColaborador()
{
  $dados = [];

  if ($_POST) {
    $con = conectarDb();

    // Validar os dados do formulário
    $cargo = $_POST['cargo'];
    $dataContratacao = $_POST['dataContratacao'];

    // Realizar a validação dos campos obrigatórios
    if (empty($cargo) || empty($dataContratacao)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sql = "INSERT INTO Colaborador (cargo, dataContratacao) VALUES ('$cargo', '$dataContratacao')";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Cadastro realizado com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao cadastrar colaborador. Por favor, tente novamente. $mensagemDeErro");
      }
    }
    mysqli_close($con);
  }

  include __DIR__ . '/pages/criarColaborador.php';
}

/*
  Editar colaborador
*/
function editarColaborador()
{
  $idEditar = isset($_GET['id']) ? $_GET['id'] : null;
  $con = conectarDb();

  $dados = false;

  if ($_POST) {
    // Validar os dados do formulário
    $cargo = $_POST['cargo'];
    $dataContratacao = $_POST['dataContratacao'];

    // Realizar a validação dos campos obrigatórios
    if (empty($cargo) || empty($dataContratacao)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sql = "UPDATE Colaborador SET cargo='$cargo', dataContratacao='$dataContratacao' WHERE idColaborador='$idEditar'";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Colaborador atualizado com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao atualizar colaborador. Por favor, tente novamente. $mensagemDeErro");
      }

      // Coloque os valores do post em $dados para que o formulário não fique vazio
      $dados['cargo'] = $cargo;
      $dados['dataContratacao'] = $dataContratacao;
    }
  } else {
    $sql = "SELECT * FROM Colaborador WHERE idColaborador='$idEditar'";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result, MYSQLI_ASSOC);
  }

  mysqli_close($con);

  if (!$dados) {
    exibirMensagem("Colaborador não encontrado.");
    include __DIR__ . '/pages/404.php';
    return;
  }

  include __DIR__ . '/pages/editarColaborador.php';
}

/*
  Deletar colaborador
*/
function deletarColaborador()
{
  $idDeletar = isset($_GET['id']) ? $_GET['id'] : null;

  $con = conectarDb();

  $sql = "DELETE FROM Colaborador WHERE idColaborador='$idDeletar'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    exibirMensagem("Colaborador deletado com sucesso!");
  } else {
    $mensagemDeErro = mysqli_error($con);
    exibirMensagem("Erro ao deletar colaborador. Por favor, tente novamente. $mensagemDeErro");
  }

  mysqli_close($con);

  include __DIR__ . '/pages/colaborador.php';
}

/*
  ********** CLIENTES **********
*/

/*
  Listar clientes (Listar e Deletar)
*/
function cliente()
{
  include __DIR__ . '/pages/cliente.php';
}

/*
  Criar cliente
*/
function criarCliente()
{
  $dados = [];

  if ($_POST) {
    $con = conectarDb();

    // Validar os dados do formulário
    $cpf = $_POST['cpf'];
    $nomeCliente = $_POST['nomeCliente'];
    $numTelefone = $_POST['numTelefone'];
    $logradouro = $_POST['logradouro'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];

    // Realizar a validação dos campos obrigatórios
    if (empty($cpf) || empty($nomeCliente) || empty($numTelefone) || empty($logradouro) || empty($cidade) || empty($numero) || empty($bairro) || empty($cep) || empty($estado)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sql = "INSERT INTO Cliente (cpf, nomeCliente, numTelefone, logradouro, cidade, complemento, numero, bairro, cep, estado) VALUES ('$cpf', '$nomeCliente', '$numTelefone', '$logradouro', '$cidade', '$complemento', '$numero', '$bairro', '$cep', '$estado')";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Cadastro realizado com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao cadastrar cliente. Por favor, tente novamente. $mensagemDeErro");
      }
    }
    mysqli_close($con);
  }

  include __DIR__ . '/pages/criarCliente.php';
}

/*
  Editar cliente
*/
function editarCliente()
{
  $idEditar = isset($_GET['id']) ? $_GET['id'] : null;
  $con = conectarDb();

  $dados = false;

  if ($_POST) {
    // Validar os dados do formulário
    $cpf = $_POST['cpf'];
    $nomeCliente = $_POST['nomeCliente'];
    $numTelefone = $_POST['numTelefone'];
    $logradouro = $_POST['logradouro'];
    $cidade = $_POST['cidade'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];

    // Realizar a validação dos campos obrigatórios
    if (empty($cpf) || empty($nomeCliente) || empty($numTelefone) || empty($logradouro) || empty($cidade) || empty($numero) || empty($bairro) || empty($cep) || empty($estado)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sql = "UPDATE Cliente SET cpf='$cpf', nomeCliente='$nomeCliente', numTelefone='$numTelefone', logradouro='$logradouro', cidade='$cidade', complemento='$complemento', numero='$numero', bairro='$bairro', cep='$cep', estado='$estado' WHERE idCliente='$idEditar'";
      $result = mysqli_query($con, $sql);

      if ($result) {
        exibirMensagem("Cliente atualizado com sucesso!");
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao atualizar cliente. Por favor, tente novamente. $mensagemDeErro");
      }

      // Coloque os valores do post em $dados para que o formulário não fique vazio
      $dados['cpf'] = $cpf;
      $dados['nomeCliente'] = $nomeCliente;
      $dados['numTelefone'] = $numTelefone;
      $dados['logradouro'] = $logradouro;
      $dados['cidade'] = $cidade;
      $dados['complemento'] = $complemento;
      $dados['numero'] = $numero;
      $dados['bairro'] = $bairro;
      $dados['cep'] = $cep;
      $dados['estado'] = $estado;
    }
  } else {
    $sql = "SELECT * FROM Cliente WHERE idCliente='$idEditar'";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result, MYSQLI_ASSOC);
  }

  mysqli_close($con);

  if (!$dados) {
    exibirMensagem("Cliente não encontrado.");
    include __DIR__ . '/pages/404.php';
    return;
  }

  include __DIR__ . '/pages/editarCliente.php';
}

/*
  Deletar cliente
*/
function deletarCliente()
{
  $idDeletar = isset($_GET['id']) ? $_GET['id'] : null;

  $con = conectarDb();

  $sql = "DELETE FROM Cliente WHERE idCliente='$idDeletar'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    exibirMensagem("Cliente deletado com sucesso!");
  } else {
    $mensagemDeErro = mysqli_error($con);
    exibirMensagem("Erro ao deletar cliente. Por favor, tente novamente. $mensagemDeErro");
  }

  mysqli_close($con);

  include __DIR__ . '/pages/cliente.php';
}

/*
  ********** PRODUTOS **********
*/

/*
  Listar produtos (Listar e Deletar)
*/
function produto()
{
  include __DIR__ . '/pages/produto.php';
}

/*
  Criar produto
*/
function criarProduto()
{
  $dados = [];

  if ($_POST) {
    $con = conectarDb();

    // Validar os dados do formulário
    $nomeProd = $_POST['nomeProd'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantEstoque = $_POST['quantEstoque'];
    $idCategoria = $_POST['idCategoria'];
    $idFornecedor = $_POST['idFornecedor'];

    // Realizar a validação dos campos obrigatórios
    if (empty($nomeProd) || empty($descricao) || empty($preco) || empty($quantEstoque) || empty($idCategoria) || empty($idFornecedor)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sqlProduto = "INSERT INTO Produto (nomeProd, descricao, preco, quantEstoque, idCategoria) 
                     VALUES ('$nomeProd', '$descricao', $preco, $quantEstoque, $idCategoria)";
      $resultProduto = mysqli_query($con, $sqlProduto);

      if ($resultProduto) {
        $idProduto = mysqli_insert_id($con);

        // Relacionar produto com fornecedor
        $sqlFornece = "INSERT INTO Fornece (idFornecedor, idProduto) VALUES ($idFornecedor, $idProduto)";
        $resultFornece = mysqli_query($con, $sqlFornece);

        if ($resultFornece) {
          exibirMensagem("Cadastro realizado com sucesso!");
        } else {
          $mensagemDeErro = mysqli_error($con);
          exibirMensagem("Erro ao relacionar produto com fornecedor. $mensagemDeErro");
        }
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao cadastrar produto. Por favor, tente novamente. $mensagemDeErro");
      }
    }
    mysqli_close($con);
  }

  // Dados do dropdown
  $con = conectarDb();
  $sqlCategorias = "SELECT * FROM Categoria";
  $resultCategorias = mysqli_query($con, $sqlCategorias);
  mysqli_close($con);

  include __DIR__ . '/pages/criarProduto.php';
}

/*
  Editar produto
*/
function editarProduto()
{
  $idEditar = isset($_GET['id']) ? $_GET['id'] : null;
  $con = conectarDb();

  $dados = false;

  if ($_POST) {
    // Validar os dados do formulário
    $nomeProd = $_POST['nomeProd'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantEstoque = $_POST['quantEstoque'];
    $idCategoria = $_POST['idCategoria'];
    $idFornecedor = $_POST['idFornecedor'];

    // Realizar a validação dos campos obrigatórios
    if (empty($nomeProd) || empty($descricao) || empty($preco) || empty($quantEstoque) || empty($idCategoria) || empty($idFornecedor)) {
      exibirMensagem("Por favor, preencha todos os campos obrigatórios.");
    } else {
      // Realizar a atualização dos dados no banco de dados
      $sqlProduto = "UPDATE Produto 
                     SET nomeProd='$nomeProd', descricao='$descricao', preco=$preco, quantEstoque=$quantEstoque, idCategoria=$idCategoria 
                     WHERE idProduto='$idEditar'";
      $resultProduto = mysqli_query($con, $sqlProduto);

      if ($resultProduto) {
        // Atualizar a relação com o fornecedor na tabela Fornece
        $sqlFornece = "UPDATE Fornece SET idFornecedor=$idFornecedor WHERE idProduto=$idEditar";
        $resultFornece = mysqli_query($con, $sqlFornece);

        if ($resultFornece) {
          exibirMensagem("Produto atualizado com sucesso!");
        } else {
          $mensagemDeErro = mysqli_error($con);
          exibirMensagem("Erro ao atualizar relação com fornecedor. $mensagemDeErro");
        }
      } else {
        $mensagemDeErro = mysqli_error($con);
        exibirMensagem("Erro ao atualizar produto. Por favor, tente novamente. $mensagemDeErro");
      }

      // Coloque os valores do post em $dados para que o formulário não fique vazio
      $dados['nomeProd'] = $nomeProd;
      $dados['descricao'] = $descricao;
      $dados['preco'] = $preco;
      $dados['quantEstoque'] = $quantEstoque;
      $dados['idCategoria'] = $idCategoria;
    }
  } else {
    $sql = "SELECT Produto.*, Fornece.idFornecedor 
            FROM Produto 
            LEFT JOIN Fornece ON Produto.idProduto = Fornece.idProduto
            WHERE Produto.idProduto='$idEditar'";
    $result = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($result, MYSQLI_ASSOC);
  }

  // Dados do dropdown
  $sqlCategorias = "SELECT * FROM Categoria";
  $resultCategorias = mysqli_query($con, $sqlCategorias);
  mysqli_close($con);

  if (!$dados) {
    exibirMensagem("Produto não encontrado.");
    include __DIR__ . '/pages/404.php';
    return;
  }

  include __DIR__ . '/pages/editarProduto.php';
}

/*
  Deletar produto
*/
function deletarProduto()
{
  $idDeletar = isset($_GET['id']) ? $_GET['id'] : null;

  $con = conectarDb();

  $sql = "DELETE FROM Produto WHERE idProduto='$idDeletar'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    exibirMensagem("Produto deletado com sucesso!");
  } else {
    $mensagemDeErro = mysqli_error($con);
    exibirMensagem("Erro ao deletar produto. Por favor, tente novamente. $mensagemDeErro");
  }

  mysqli_close($con);

  include __DIR__ . '/pages/produto.php';
}


/*
  Páginas de erro
*/
function notfound()
{
  include __DIR__ . '/pages/404.php';
}
