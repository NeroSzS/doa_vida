<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador.php';

$listagem_doador = Doador::listarDoador();
?>

<main id="conteudo-doadores">
<h1 class="title_doadores">Doadores</h1>
<div id="div_doadores">
    <?php foreach ($listagem_doador as $doador): ?>
      <div class="card_doadores">
        <a href="/doa_vida/views/mostrarDoador.php?id_doador=<?= $doador['id_doador'] ?>" id="link_doador">
          <div class="cabecalho_card">
              <img src="/doa_vida/imgs/perfil-icon.svg" alt="">
              <h1><?= $doador['tipo_sanguineo'] ?></h1>
          </div>
          <h1><?= $doador['nome_doador'] ?></h1>
          <h1><?= $doador['data_nascimento'] ?></h1>
          <h1><?= $doador['email'] ?></h1>
          <h1><?= $doador['telefone'] ?></h1>
        </a>
      </div>
    <?php endforeach; ?>
</div>
</main>
</body>