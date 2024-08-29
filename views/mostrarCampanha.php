<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_doacoes.php';

$id_campanhas = $_GET['id'];
$mostar_campanha = Campanhas::mostrarCampanhaId($id_campanhas);

?>

<main id="conteudo-mostrarCampanha">
  <div id="cabecalho_addCampanhas">
    <h1 class="title_campanhas"><?= htmlspecialchars($mostar_campanha['nome_campanha']) ?></h1>
  </div>

  <div id="div_mostrarCampanha">
    <img src="data:image;base64,<?= base64_encode($mostar_campanha['imagem_campanha']) ?>" alt="" id="img_mostrarCampanha">
    <div id="main-campanha">
      <h1 class="nome_hospital">O <?= htmlspecialchars($mostar_campanha['hospital']) ?> precisa de doação de sangue do tipo</h1>
      <span class="tipo_sanguineoCampanha"><?= htmlspecialchars($mostar_campanha['tipo_sanguineo']) ?></span>
    </div>
    <p class="paragrafo_campanha">Entre os dias <?= date_format(date_create(htmlspecialchars($mostar_campanha['data_inicio'])), 'd')  ?> a <?= date_format(date_create(htmlspecialchars($mostar_campanha['data_fim'])), 'd/m/Y') ?></p>

    <p class="paragrafo_campanha">
      Contatos:
      <a href="#" id="telefone-link"><?= htmlspecialchars($mostar_campanha['telefone']) ?></a>

      /

      <a href="mailto:<?= htmlspecialchars($mostar_campanha['email']) ?>"><?= htmlspecialchars($mostar_campanha['email']) ?></a>
    </p>

    <p class="paragrafo_campanha"><?= htmlspecialchars($mostar_campanha['descricao']) ?></p>

    <form action="/doa_vida/controllers/agendamento_controller.php" method="post" id="form_agendamento">
      <label for="data_fim">Agendamento</label>
      <div class="inputs_grupo">
        <input type="hidden" name="id_clinica" value="<?= $mostar_campanha['id_clinica']?>">
        <input type="hidden" name="id_campanhas" value="<?= ($mostar_campanha['id_campanhas']) ?>">
        <input required type="date" name="data_agendamento" min="<?= $mostar_campanha['data_inicio'] ?>" max="<?= $mostar_campanha['data_fim'] ?>" class="input_agendamento">
        <input type="submit" value="Agendar" class="input_agendamento btn_agendamento">
      </div>
    </form>
  </div>
</main>
</div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    function formatPhoneNumber(phoneNumber) {
      // Remove todos os caracteres que não são dígitos
      const cleaned = phoneNumber.replace(/\D/g, '');

      // Verifica se o número tem 11 dígitos (formato padrão para telefone no Brasil)
      if (cleaned.length !== 11) {
        return 'Número inválido';
      }

      // Usa uma expressão regular para formatar o número
      const match = cleaned.match(/^(\d{2})(\d{5})(\d{4})$/);

      if (match) {
        return `(${match[1]}) ${match[2]}-${match[3]}`;
      }

      return 'Número inválido';
    }

    // Seleciona o link do telefone
    const telefoneLink = document.getElementById('telefone-link');

    // Verifica se o elemento existe
    if (telefoneLink) {
      // Formata o número e atualiza o texto do link
      telefoneLink.textContent = formatPhoneNumber(telefoneLink.textContent);
      // Adiciona o link mailto, se desejado
      telefoneLink.href = `tel:${telefoneLink.textContent}`;
    }
  });
</script>

</script>

</body>

</html>