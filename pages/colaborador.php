<h1>Colaborador</h1>

<hr />

<div class="gerenciar-todos">
  <div class="gerenciar">
    <h2>Todos os colaboradores</h2>
    <a href="/colaborador/criar" class="gerenciar-botao adicionar">Novo colaborador</a>
  </div>
</div>
<table class="tabela">
  <thead>
    <tr>
      <th>ID</th>
      <th>Cargo</th>
      <th>Data de Contratação</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $con = conectarDb();
    $sql = "SELECT * FROM Colaborador";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
      echo "<tr><td colspan='3'><center>Nenhum colaborador encontrado.</center></td></tr>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idColaborador'] . "</td>";
        echo "<td>" . $row['cargo'] . "</td>";
        echo "<td>" . $row['dataContratacao'] . "</td>";
        echo "<td><a href='/colaborador/editar?id=" . $row['idColaborador'] . "'>Editar</a> <a href='/colaborador/deletar?id=" . $row['idColaborador'] . "'>Deletar</a></td>";
        echo "</tr>";
      }
    }
    mysqli_close($con);
    ?>
  </tbody>
</table>