<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_doacoes.php';

$listagem_campanha = Campanhas::listarCampanhas();
?>
<main id="conteudo-campanhas">
  <div id="cabecalho_addCampanhas">
    <h1 class="title_campanhas">Campanhas de Doações</h1>
    <?php if (Auth::eClinica()) :?>
      <a href="cadastrarCampanhas.php" id="btn_add_campanha">
        <img src="/doa_vida/imgs/adicionar-icon.svg" alt="">
      </a>
    <?php endif; ?>
  </div>

  <div id="div_campanhas">
    <?php foreach ($listagem_campanha as $campanha): ?>
      <div class="card_campanhas">
        <a href="/doa_vida/views/mostrarCampanha.php?id=<?= $campanha['id_campanhas'] ?>" id="link_campanha">
          
          <img src="data:image; base64, <?= base64_encode($campanha['imagem_campanha']) ?> " alt="" class="img_campanhas">
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</main>
</div>
</main>
</body>

</html>