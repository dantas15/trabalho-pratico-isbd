<h1>Fornecedores</h1>

<hr />

<div class="gerenciar-todos">
  <div class="gerenciar">
    <h2>Todos os fornecedores</h2>
    <a href="/fornecedor/criar" class="gerenciar-botao adicionar">Novo fornecedor</a>
  </div>
</div>
<table class="tabela">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Endereço</th>
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
    $sql = "SELECT * FROM Fornecedor";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
      echo "<tr><td colspan='10'><center>Nenhum fornecedor encontrado.</center></td></tr>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nomeForn'] . "</td>";
        echo "<td>" . $row['numTelefone'] . "</td>";
        echo "<td>" . $row['logradouro'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td>" . $row['complemento'] . "</td>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['bairro'] . "</td>";
        echo "<td>" . $row['cep'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "<td><a href='/fornecedor/editar?id=" . $row['idFornecedor'] . "'>Editar</a> <a href='/fornecedor/deletar?id=" . $row['idFornecedor'] . "'>Deletar</a></td>";
        echo "</tr>";
      }
    }
    mysqli_close($con);
    ?>
  </tbody>
</table>
</tbody>
</table>