<h1>Criar Produto</h1>

<form method="post">
  <label for="nomeProd">Nome:</label>
  <input value="<?= isset($_POST['nomeProd']) ? $_POST['nomeProd'] : '' ?>" type="text" name="nomeProd" required>

  <label for="descricao">Descrição:</label>
  <input value="<?= isset($_POST['descricao']) ? $_POST['descricao'] : '' ?>" type="text" name="descricao" required>

  <label for="preco">Preço:</label>
  <input value="<?= isset($_POST['preco']) ? $_POST['preco'] : '' ?>" type="text" name="preco" required>

  <label for="quantEstoque">Quantidade em Estoque:</label>
  <input value="<?= isset($_POST['quantEstoque']) ? $_POST['quantEstoque'] : '' ?>" type="text" name="quantEstoque" required>

  <label for="idCategoria">Categoria:</label>
  <select name="idCategoria" required>
    <?php
    $con = conectarDb();
    $sql = "SELECT * FROM Categoria";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $selected = (isset($_POST['idCategoria']) && $_POST['idCategoria'] == $row['idCategoria']) ? 'selected' : '';
      echo "<option value='" . $row['idCategoria'] . "' $selected>" . $row['nomeCat'] . "</option>";
    }

    mysqli_close($con);
    ?>
  </select>

  <label for="idFornecedor">Fornecedor:</label>
  <select name="idFornecedor" required>
    <?php
    $con = conectarDb();
    $sql = "SELECT * FROM Fornecedor";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $selected = (isset($_POST['idFornecedor']) && $_POST['idFornecedor'] == $row['idFornecedor']) ? 'selected' : '';
      echo "<option value='" . $row['idFornecedor'] . "' $selected>" . $row['nomeForn'] . "</option>";
    }

    mysqli_close($con);
    ?>
  </select>

  <input type="submit" value="Enviar">
</form>