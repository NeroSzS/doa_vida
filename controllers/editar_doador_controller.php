<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/endereco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador_endereco.php';

session_start();

$id_doador = $_POST['id_doador'];
$id_endereco = $_POST['id_endereco'];

$telefone = htmlspecialchars($_POST['telefone']);
$email = $_POST['email'];

$cep = htmlspecialchars($_POST['cep']);
$estado = htmlspecialchars($_POST['estado']);
$cidade = htmlspecialchars($_POST['cidade']);
$logradouro = htmlspecialchars($_POST['logradouro']);
$numero_casa = htmlspecialchars($_POST['numeroCasa']);
$complemento = htmlspecialchars($_POST['complemento']);
$bairro = htmlspecialchars($_POST['bairro']);

$doador = new Doador($id_doador);
$doador->telefone = $telefone;
$doador->email = $email;

$_SESSION['telefone'] = $telefone;
$_SESSION['email'] = $email;

$endereco = new Endereco($id_endereco);
$endereco->cep = $cep;
$endereco->estado = $estado;
$endereco->cidade = $cidade;
$endereco->logradouro = $logradouro;
$endereco->numero_casa = $numero_casa;
$endereco->bairro = $bairro;
$endereco->complemento = $complemento;

$doador->atualizarDoador();
$endereco->atualizarEndereco();

header('Location: /doa_vida/views/perfil.php');
exit();