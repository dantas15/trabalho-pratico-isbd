<div id="alerta" class="alerta alerta-success" role="alerta">
  <span class="mensagem"><?= $mensagem ?></span>
  <button id="botaoFechar">Fechar aviso</button>
</div>

<style>
  .alerta {
    padding: 10px;

    background-color: var(--cinza-200);
    color: var(--cinza-800);
    border: 1px solid var(--cinza-500);
    border-radius: 4px;
    display: flex;
    justify-content: space-between;
    position: fixed;
    bottom: 10px;
    right: 10px;
    max-width: 100vw;
  }

  .mensagem {
    margin-right: 10px;
  }

  #botaoFechar {
    background-color: var(--cinza-500);
    color: var(--cinza-100);
    border: 1px solid var(--cinza-500);
    border-radius: 4px;
    padding: 4px 8px;
    cursor: pointer;
  }
</style>

<script>
  let alertaEl = document.getElementById("alerta");
  let botaoFechar = document.getElementById("botaoFechar");

  botaoFechar.addEventListener("click", function() {
    alertaEl.style.display = "none";
  });
</script>