<h1>Criar Colaborador</h1>

<form method="post">
  <label for="cargo">Cargo:</label>
  <input value="<?= isset($_POST['cargo']) ? $_POST['cargo'] : '' ?>" type="text" name="cargo" required>

  <label for="dataContratacao">Data de Contratação:</label>
  <input value="<?= isset($_POST['dataContratacao']) ? $_POST['dataContratacao'] : '' ?>" type="date" name="dataContratacao" required>

  <input type="submit" value="Enviar">
</form>