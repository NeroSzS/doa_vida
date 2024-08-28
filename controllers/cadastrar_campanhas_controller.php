<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/campanhas_doacoes.php';
session_start();


$hospital = htmlspecialchars($_POST['hospital']);
$nome_campanha = htmlspecialchars($_POST['nome_campanha']);
$descricao = htmlspecialchars($_POST['descricao']);
$data_inicio = htmlspecialchars($_POST['data_inicio']);
$data_fim = htmlspecialchars($_POST['data_fim']);
$email_campanha = htmlspecialchars($_POST['email_campanha']);
$telefone_campanha = htmlspecialchars($_POST['telefone_campanha']);
$tipo_sanguineo = htmlspecialchars($_POST['tipo_sanguineo']);
$id_clinica = $_SESSION['id_clinica'];


if(!empty($_FILES['imagem_campanha']['tmp_name'])){
    $permitidos = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    $tipo_arquivo = mime_content_type($_FILES['imagem_campanha']['tmp_name']); 
    if(in_array( $tipo_arquivo, $permitidos)) {
        if($_FILES['imagem_campanha']['size'] <= 5 * 1024 * 1024) {
            $imagem_campanha = file_get_contents($_FILES['imagem_campanha']['tmp_name']);
        } else {
            setcookie('aviso', 'Tamanho do Arquivo não permitido', time() + 3600, '/doa_vida/');
            header('Location: /doa_vida/views/cadastrarCampanhas.php');
            exit();
        }
    } else {
        setcookie('aviso', 'Tipo de Arquivo não permitido', time() + 3600, '/doa_vida/');
        header('Location: /doa_vida/views/cadastrarCampanhas.php');
        exit();
    }
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
$campanha->id_clinica = $id_clinica;

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