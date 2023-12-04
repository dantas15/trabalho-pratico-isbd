<h1>Criar fornecedor</h1>


<form method="post">
  <label for="nomeForn">Nome:</label>
  <input value="<?= isset($_POST['nomeForn']) ? $_POST['nomeForn'] : '' ?>" type="text" name="nomeForn" required>

  <label for="numTelefone">Telefone:</label>
  <input value="<?= isset($_POST['numTelefone']) ? $_POST['numTelefone'] : '' ?>" type="text" name="numTelefone" required>

  <label for="logradouro">Logradouro:</label>
  <input value="<?= isset($_POST['logradouro']) ? $_POST['logradouro'] : '' ?>" type="text" name="logradouro" required>

  <label for="cidade">Cidade:</label>
  <input value="<?= isset($_POST['cidade']) ? $_POST['cidade'] : '' ?>" type="text" name="cidade" required>

  <label for="complemento">Complemento (opcional):</label>
  <input value="<?= isset($_POST['complemento']) ? $_POST['complemento'] : '' ?>" type="text" name="complemento">

  <label for="numero">Número:</label>
  <input value="<?= isset($_POST['numero']) ? $_POST['numero'] : '' ?>" type="text" name="numero" required>

  <label for="bairro">Bairro:</label>
  <input value="<?= isset($_POST['bairro']) ? $_POST['bairro'] : '' ?>" type="text" name="bairro" required>

  <label for="cep">CEP:</label>
  <input value="<?= isset($_POST['cep']) ? $_POST['cep'] : '' ?>" type="text" name="cep" required>

  <label for="estado">Estado:</label>
  <input value="<?= isset($_POST['estado']) ? $_POST['estado'] : '' ?>" type="text" name="estado" required>

  <input type="submit" value="Enviar">
</form>