<h1>Editar fornecedor</h1>


<form method="post">
  <label for="nomeForn">Nome:</label>
  <input value="<?= isset($dados['nomeForn']) ? $dados['nomeForn'] : '' ?>" type="text" name="nomeForn" required>

  <label for="numTelefone">Telefone:</label>
  <input value="<?= isset($dados['numTelefone']) ? $dados['numTelefone'] : '' ?>" type="text" name="numTelefone" required>

  <label for="logradouro">Logradouro:</label>
  <input value="<?= isset($dados['logradouro']) ? $dados['logradouro'] : '' ?>" type="text" name="logradouro" required>

  <label for="cidade">Cidade:</label>
  <input value="<?= isset($dados['cidade']) ? $dados['cidade'] : '' ?>" type="text" name="cidade" required>

  <label for="complemento">Complemento (opcional):</label>
  <input value="<?= isset($dados['complemento']) ? $dados['complemento'] : '' ?>" type="text" name="complemento">

  <label for="numero">Número:</label>
  <input value="<?= isset($dados['numero']) ? $dados['numero'] : '' ?>" type="text" name="numero" required>

  <label for="bairro">Bairro:</label>
  <input value="<?= isset($dados['bairro']) ? $dados['bairro'] : '' ?>" type="text" name="bairro" required>

  <label for="cep">CEP:</label>
  <input value="<?= isset($dados['cep']) ? $dados['cep'] : '' ?>" type="text" name="cep" required>

  <label for="estado">Estado:</label>
  <input value="<?= isset($dados['estado']) ? $dados['estado'] : '' ?>" type="text" name="estado" required>

  <input type="submit" value="Enviar">
</form>