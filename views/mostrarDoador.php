<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/endereco.php';

$id_doador = $_GET['id_doador'];
$mostar_doador = Doador::mostrarDoadorId($id_doador);
$mostar_endereco = Endereco::encontrarEnderecoId($id_doador);

?>

<main id="conteudo-mostrarDoador">
    <div class="card-mostrarDoador">
        <div class="cabecalho-mostrarDoador">
            <img src="/doa_vida/imgs/perfil-icon.svg" alt="">
            <h1><?= htmlspecialchars($mostar_doador['nome_doador']) ?></h1>
        </div>
        <div class="div-dadosDoador">
            <div class="dados-mostarDoador">
                <p>
                    <span class="span-icon">
                        <img src="/doa_vida/imgs/o-email.png" alt="">
                    </span> <?= htmlspecialchars($mostar_doador['email']) ?>
                </p>
                
                <p>
                    <span class="span-icon">
                        <img src="../imgs/telefone.png" alt="">
                    </span> <?= htmlspecialchars($mostar_doador['telefone']) ?>
                </p>
                <p><?= $mostar_endereco['logradouro'] . ', nº ' . $mostar_endereco['numero'] . ', ' . $mostar_endereco['bairro'] . ', ' . $mostar_endereco['cep'] . ', ' . $mostar_endereco['cidade'] . '-' . $mostar_endereco['estado'] ?></p>
            </div>
            <span class="tipoSanguineo-mostrarDoador"><?= htmlspecialchars($mostar_doador['tipo_sanguineo']) ?></span>
        </div>
    </div>
</main>