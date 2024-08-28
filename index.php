<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/agendamento.php';


$listagem_campanha_agendadas = Agendamento::listarCampanhasAgendadas($_SESSION['id_doador']);

?>
<main id="conteudo-tela-inical">
  <div class="carousel">
        <div class="carousel-container">
            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao1.png" alt="Imagem 1">
            </div>

            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao2.jpeg" alt="Imagem 2">
            </div>

            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao3.png" alt="Imagem 3">
            </div>

            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao3.png" alt="Imagem 1">
            </div>

            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao1.png" alt="Imagem 2">
            </div>
            
            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao2.jpeg" alt="Imagem 3">
            </div>

            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao2.jpeg" alt="Imagem 1">
            </div>

            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao3.png" alt="Imagem 2">
            </div>
            
            <div class="carousel-slide">
                <img src="/doa_vida/imgs/campanha-doacao1.png" alt="Imagem 3">
            </div>
        </div>
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
  </div>

  <div id="conteudo-doacoes-agendadas">
    <h1>Doações Agendadas</h1>
    <?php foreach ($listagem_campanha_agendadas as $campanha): ?>
      <div class="card_campanhas">
        <a href="/doa_vida/views/mostrarCampanha.php?id=<?= $campanha['id_campanhas'] ?>" id="link_campanha">
        
          <img src="data:image; base64, <?= base64_encode($campanha['imagem_campanha']) ?> " alt="" class="img_campanhas">
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</main>
</main>
</body>

</html>