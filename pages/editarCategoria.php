<h1>Editar categoria</h1>

<form method="post">
  <label for="nomeCat">Nome:</label>
  <input value="<?= isset($dados['nomeCat']) ? $dados['nomeCat'] : '' ?>" type="text" name="nomeCat" required>

  <input type="submit" value="Enviar">
</form>