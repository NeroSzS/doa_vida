<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/agendamento.php';

if(Auth::estarLogado() && !Auth::eClinica()) {
  $id_doador = $_SESSION['id_doador'];
  $campanhas_agendadas = Agendamento::listarCampanhasAgendadas($id_doador);
}
?>

<main id="conteudo-historico">
    <h1 id="title_historico">Histórico de Doações</h1>
    <div id="div_container_historico">
        <?php foreach ($campanhas_agendadas as $campanha): ?>
            <div class="card_historico">
                <div class="div_dados_historico">
                    <img src="/doa_vida/imgs/sangue.png" alt="">
                    <div class="dados_historico">
                        <h1><?= htmlspecialchars($campanha['hospital']) ?></h1>
                        <p><?= date_format(date_create($campanha['data_doacao']), 'd/m/Y') ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>