<h1>Produtos</h1>

<hr />

<div class="gerenciar-todos">
  <div class="gerenciar">
    <h2>Todos os produtos</h2>
    <a href="/produto/criar" class="gerenciar-botao adicionar">Novo produto</a>
  </div>
</div>
<table class="tabela">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome do Produto</th>
      <th>Descrição</th>
      <th>Preço</th>
      <th>Quantidade em Estoque</th>
      <th>Categoria</th>
      <th>Fornecedor</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $con = conectarDb();
    $sql = "SELECT Produto.*, Categoria.nomeCat, Fornecedor.nomeForn
            FROM Produto 
            JOIN Categoria ON Produto.idCategoria = Categoria.idCategoria
            LEFT JOIN Fornece ON Produto.idProduto = Fornece.idProduto
            LEFT JOIN Fornecedor ON Fornece.idFornecedor = Fornecedor.idFornecedor";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0) {
      echo "<tr><td colspan='8'><center>Nenhum produto encontrado.</center></td></tr>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idProduto'] . "</td>";
        echo "<td>" . $row['nomeProd'] . "</td>";
        echo "<td>" . $row['descrição'] . "</td>";
        echo "<td>" . $row['preco'] . "</td>";
        echo "<td>" . $row['quantEstoque'] . "</td>";
        echo "<td>" . $row['nomeCat'] . "</td>";
        echo "<td>" . $row['nomeForn'] . "</td>";
        echo "<td><a href='/produto/editar?id=" . $row['idProduto'] . "'>Editar</a> <a href='/produto/deletar?id=" . $row['idProduto'] . "'>Deletar</a></td>";
        echo "</tr>";
      }
    }
    mysqli_close($con);
    ?>
  </tbody>
</table>