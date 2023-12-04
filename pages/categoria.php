<h1>Categoria</h1>

<hr />

<div class="gerenciar-todos">
  <div class="gerenciar">
    <h2>Todos os categoriaes</h2>
    <a href="/categoria/criar" class="gerenciar-botao adicionar">Nova categoria</a>
  </div>
</div>
<table class="tabela">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome da Categoria</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $con = conectarDb();
    $sql = "SELECT * FROM Categoria";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
      echo "<tr><td colspan='2'><center>Nenhuma categoria encontrada.</center></td></tr>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idCategoria'] . "</td>";
        echo "<td>" . $row['nomeCat'] . "</td>";
        echo "<td><a href='/categoria/editar?id=" . $row['idCategoria'] . "'>Editar</a> <a href='/categoria/deletar?id=" . $row['idCategoria'] . "'>Deletar</a></td>";
        echo "</tr>";
      }
    }
    mysqli_close($con);
    ?>
  </tbody>
</table>
</tbody>
</table>