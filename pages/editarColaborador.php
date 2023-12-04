<h1>Editar Colaborador</h1>

<form method="post">
  <label for="cargo">Cargo:</label>
  <input value="<?= isset($dados['cargo']) ? $dados['cargo'] : '' ?>" type="text" name="cargo" required>

  <label for="dataContratacao">Data de Contratação:</label>
  <input value="<?= isset($dados['dataContratacao']) ? $dados['dataContratacao'] : '' ?>" type="date" name="dataContratacao" required>

  <input type="submit" value="Enviar">
</form>