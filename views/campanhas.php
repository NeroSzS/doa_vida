<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_doacoes.php';

$listagem_campanha = Campanhas::listarCampanhas();
?>
<main id="conteudo-tela-inical">
  <div id="cabecalho_addCampanhas">
    <h1 class="title_campanhas">Campanhas de Doações</h1>
    <a href="cadastrarCampanhas.php" id="btn_add_campanha">
      <img src="/doa_vida/imgs/adicionar-icon.svg" alt="">
    </a>
  </div>

  <?php foreach ($listagem_campanha as $campanha): ?>
    <div class="card">
      <a href="">
        <img src="data:image; base64, <?= base64_encode($campanha['imagem_campanha']) ?> " alt="" class="img-campanhas">
      </a>
    </div>
  <?php endforeach; ?>

</main>
</div>
</main>
</body>

</html>