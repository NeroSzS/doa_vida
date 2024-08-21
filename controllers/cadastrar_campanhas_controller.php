<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_doacoes.php';

$hospital = $_POST['hospital'];
$nome_campanha = $_POST['nome_campanha'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$email_campanha = $_POST['email_campanha'];
$telefone_campanha = $_POST['telefone_campanha'];
$tipo_sanguineo = $_POST['tipo_sanguineo'];

if(!empty($_FILES['imagem_campanha']['tmp_name'])){
    $imagem_campanha = file_get_contents($_FILES['imagem_campanha']['tmp_name']);
};

$campanha = new Campanhas();
$campanha->hospital = $hospital;
$campanha->nome_campanha = $nome_campanha;
$campanha->descricao = $descricao;
$campanha->data_inicio = $data_inicio;
$campanha->data_fim = $data_fim;
$campanha->telefone_campanha = $telefone_campanha;
$campanha->email_campanha = $email_campanha;
$campanha->tipo_sanguineo = $tipo_sanguineo;

if(isset($imagem_campanha)){
    $campanha->imagem_campanha = $imagem_campanha;
} else {
    $campanha->imagem_campanha = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/doa_vida/imgs/campanha-doacao1.png');
}

// echo "<pre>";
// var_dump($campanha);
// echo "</pre>";
// exit();

$campanha->cadastrarCampanha();
header('Location: /doa_vida/views/campanhas.php');
exit();