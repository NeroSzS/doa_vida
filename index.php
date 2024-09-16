<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_doacoes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/agendamento.php';

if(Auth::estarLogado() && !Auth::eClinica()) {
  $id_doador = $_SESSION['id_doador'];
  $campanhas_agendadas = Agendamento::listarCampanhasAgendadas($id_doador);
}

$listagem_campanha = Campanhas::listarCampanhas();


?>
<main id="conteudo-tela-inical">
  <div class="carousel">
    <div class="carousel-container">
      <?php foreach ($listagem_campanha as $campanha): ?>
        <div class="carousel-slide">
            <a href="/doa_vida/views/mostrarCampanha.php?id=<?= $campanha['id_campanhas'] ?>" id="link_campanha">
            
            <img src="data:image; base64, <?= base64_encode($campanha['imagem_campanha']) ?> " alt="" class="img_campanhas">
            </a>
        </div>
      <?php endforeach; ?>
    </div>
    <button class="prev" onclick="prevSlide()">&#10094;</button>
    <button class="next" onclick="nextSlide()">&#10095;</button>
  </div>

  <?php if (!Auth::eClinica()) :?>
    <div id="conteudo-doacoes-agendadas">
      <h1>Doações Agendadas</h1>
      <?php foreach ($campanhas_agendadas as $campanha): ?>
        <div class="card_campanhas">
            <a href="/doa_vida/views/mostrarCampanha.php?id=<?= $campanha     ['id_campanhas'] ?>" id="link_campanha">
              <img src="data:image;base64, <?= base64_encode($campanha['imagem_campanha']) ?>" alt="" class="img_campanhas">
              <h2><?= htmlspecialchars($campanha['nome_campanha']) ?></h2>
              <p>Data do Agendamento: <?= date_format(date_create($campanha['data_doacao']), 'd/m/Y') ?></p>
            </a>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</main>
</main>
</body>

</html>