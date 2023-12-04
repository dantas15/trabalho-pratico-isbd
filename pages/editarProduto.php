<h1>Editar Produto</h1>

<form method="post">
  <label for="nomeProd">Nome:</label>
  <input value="<?= isset($dados['nomeProd']) ? $dados['nomeProd'] : '' ?>" type="text" name="nomeProd" required>

  <label for="descricao">Descrição:</label>
  <input value="<?= isset($dados['descricao']) ? $dados['descricao'] : '' ?>" type="text" name="descricao" required>

  <label for="preco">Preço:</label>
  <input value="<?= isset($dados['preco']) ? $dados['preco'] : '' ?>" type="text" name="preco" required>

  <label for="quantEstoque">Quantidade em Estoque:</label>
  <input value="<?= isset($dados['quantEstoque']) ? $dados['quantEstoque'] : '' ?>" type="text" name="quantEstoque" required>

  <label for="idCategoria">Categoria:</label>
  <select name="idCategoria" required>
    <?php
    $con = conectarDb();
    $sqlCategoria = "SELECT * FROM Categoria";
    $resultCategoria = mysqli_query($con, $sqlCategoria);

    while ($rowCategoria = mysqli_fetch_assoc($resultCategoria)) {
      $selectedCategoria = (isset($dados['idCategoria']) && $dados['idCategoria'] == $rowCategoria['idCategoria']) ? 'selected' : '';
      echo "<option value='" . $rowCategoria['idCategoria'] . "' $selectedCategoria>" . $rowCategoria['nomeCat'] . "</option>";
    }

    mysqli_close($con);
    ?>
  </select>

  <label for="idFornecedor">Fornecedor:</label>
  <select name="idFornecedor" required>
    <?php
    $con = conectarDb();
    $sqlFornecedor = "SELECT * FROM Fornecedor";
    $resultFornecedor = mysqli_query($con, $sqlFornecedor);

    while ($rowFornecedor = mysqli_fetch_assoc($resultFornecedor)) {
      $selectedFornecedor = (isset($dados['idFornecedor']) && $dados['idFornecedor'] == $rowFornecedor['idFornecedor']) ? 'selected' : '';
      echo "<option value='" . $rowFornecedor['idFornecedor'] . "' $selectedFornecedor>" . $rowFornecedor['nomeForn'] . "</option>";
    }

    mysqli_close($con);
    ?>
  </select>

  <input type="submit" value="Enviar">
</form>