<h1>Criar Cliente</h1>

<form method="post">
  <label for="cpf">CPF:</label>
  <input value="<?= isset($_POST['cpf']) ? $_POST['cpf'] : '' ?>" type="text" name="cpf" required>

  <label for="nomeCliente">Nome:</label>
  <input value="<?= isset($_POST['nomeCliente']) ? $_POST['nomeCliente'] : '' ?>" type="text" name="nomeCliente" required>

  <label for="numTelefone">Número de Telefone:</label>
  <input value="<?= isset($_POST['numTelefone']) ? $_POST['numTelefone'] : '' ?>" type="text" name="numTelefone" required>

  <label for="logradouro">Logradouro:</label>
  <input value="<?= isset($_POST['logradouro']) ? $_POST['logradouro'] : '' ?>" type="text" name="logradouro" required>

  <label for="cidade">Cidade:</label>
  <input value="<?= isset($_POST['cidade']) ? $_POST['cidade'] : '' ?>" type="text" name="cidade" required>

  <label for="complemento">Complemento:</label>
  <input value="<?= isset($_POST['complemento']) ? $_POST['complemento'] : '' ?>" type="text" name="complemento">

  <label for="numero">Número:</label>
  <input value="<?= isset($_POST['numero']) ? $_POST['numero'] : '' ?>" type="text" name="numero" required>

  <label for="bairro">Bairro:</label>
  <input value="<?= isset($_POST['bairro']) ? $_POST['bairro'] : 'Centro' ?>" type="text" name="bairro" required>

  <label for="cep">CEP:</label>
  <input value="<?= isset($_POST['cep']) ? $_POST['cep'] : '' ?>" type="text" name="cep" required>

  <label for="estado">Estado:</label>
  <input value="<?= isset($_POST['estado']) ? $_POST['estado'] : '' ?>" type="text" name="estado" required>

  <input type="submit" value="Enviar">
</form>