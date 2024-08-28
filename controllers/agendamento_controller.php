<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/agendamento.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_de_doacoes.php';
session_start();


// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data_doacao = $_POST['data_agendamento'];
    $id_doador = $_SESSION['id_doador'];
    $id_campanhas = $_POST['id_campanhas'];

    if ($id_doador && $id_clinica) {
        Agendamento::criarAgendamento($data_doacao, $id_doador, $id_campanhas);

        header('Location: /doa_vida/index.php');
        exit();
    } else {
        echo "<p>Dados do doador ou clínica não encontrados.</p>";
    }
} else {
    echo "<p>Requisição inválida.</p>";
}
