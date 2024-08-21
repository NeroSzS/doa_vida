<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_doacoes.php';

$listagem_campanha = Campanhas::listarCampanhas();
?>

<main id="conteudo-tela-inical">
  <div class="div-final-campanha">
      <div class="texto-final">
        <h2>
          <?= $campanha['hospital'] ?> Precisa de
          <br>
          Doações de Sangue do Tipo
        </h2>
        <br>

        <h3 class="links-campanha">
          <a href="link para envio de e-mails a clínica">
            <img src="imgs/icon_email.png" alt="" class="icones-campanhas"><?= $campanha['email'] ?>
          </a>
        </h3>

        <h3 class="links-campanha">
          <a href="Telefone da clínica">
            <img src="imgs/icon_telefone.png" alt="" class="icones-campanhas"><?= $campanha['telefone']?>
          </a>
        </h3>

        <h3 class="links-campanha">
          Começando no dia <?= $campanha['data_inicio']?> e terminando no dia <?= $campanha['data_fim']?> 
        </h3>
      </div>
      <div class="tipo-sanguineo">
        <h1>A+</h1>
      </div>
    </div>
</main>
</div>
</main>
</body>

</html>