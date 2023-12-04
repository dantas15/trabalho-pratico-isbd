<h1>Criar Categoria</h1>

<form method="post">
  <label for="nomeCat">Nome:</label>
  <input value="<?= isset($_POST['nomeCat']) ? $_POST['nomeCat'] : '' ?>" type="text" name="nomeCat" required>

  <input type="submit" value="Enviar">
</form>