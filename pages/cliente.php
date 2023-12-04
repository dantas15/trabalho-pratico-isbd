<h1>Clientes</h1>

<hr />

<div class="gerenciar-todos">
  <div class="gerenciar">
    <h2>Todos os clientes</h2>
    <a href="/cliente/criar" class="gerenciar-botao adicionar">Novo cliente</a>
  </div>
</div>
<table class="tabela">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome do Cliente</th>
      <th>CPF</th>
      <th>Número de Telefone</th>
      <th>Logradouro</th>
      <th>Cidade</th>
      <th>Complemento</th>
      <th>Número</th>
      <th>Bairro</th>
      <th>CEP</th>
      <th>Estado</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $con = conectarDb();
    $sql = "SELECT * FROM Cliente";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
      echo "<tr><td colspan='12'><center>Nenhum cliente encontrado.</center></td></tr>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idCliente'] . "</td>";
        echo "<td>" . $row['nomeCliente'] . "</td>";
        echo "<td>" . $row['cpf'] . "</td>";
        echo "<td>" . $row['numTelefone'] . "</td>";
        echo "<td>" . $row['logradouro'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td>" . $row['complemento'] . "</td>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['bairro'] . "</td>";
        echo "<td>" . $row['cep'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "<td><a href='/cliente/editar?id=" . $row['idCliente'] . "'>Editar</a> <a href='/cliente/deletar?id=" . $row['idCliente'] . "'>Deletar</a></td>";
        echo "</tr>";
      }
    }
    mysqli_close($con);
    ?>
  </tbody>
</table>
</tbody>
</table>