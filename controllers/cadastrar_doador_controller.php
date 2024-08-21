<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/endereco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador_endereco.php';



$nomeCompleto = $_POST['nomeCompleto'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$nomeMae = $_POST['nomeMae'];
$nomePai = $_POST['nomePai'];
$telefone = $_POST['celular'];
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];
$tipoSanguineo = $_POST['tipoSanguineo'];
$email = $_POST['email_cadastro'];
$senha = $_POST['senha_cadastro'];
$senha = password_hash($senha, PASSWORD_DEFAULT);

$doador = new Doador();
$doador->nome_doador = $nomeCompleto;
$doador->cpf = $cpf;
$doador->rg = $rg;
$doador->nome_mae = $nomeMae;
$doador->nome_pai = $nomePai;
$doador->telefone = $telefone;
$doador->sexo = $sexo;
$doador->data_nascimento = $dataNascimento;
$doador->tipo_sanguineo = $tipoSanguineo;
$doador->email = $email;
$doador->senha = $senha;

$id_doador = $doador->cadastrarDoador();

$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$logradouro = $_POST['logradouro'];
$numero_casa = $_POST['numeroCasa'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];

$endereco = new Endereco();
$endereco->cep = $cep;
$endereco->cidade = $cidade;
$endereco->estado = $estado;
$endereco->logradouro = $logradouro;
$endereco->numero_casa = $numero_casa;
$endereco->complemento = $complemento;
$endereco->bairro = $bairro;

// echo "<pre>";
// var_dump($endereco);
// echo "</pre>";
// exit();

$id_endereco = $endereco->cadastrarEndereco();

$doador_endereco = new DoadorEndereco();
$doador_endereco->id_doador = $id_doador;
$doador_endereco->id_endereco = $id_endereco;

$doador_endereco->cadastrarDoadorEndereco();


header('Location: /doa_vida/views/login.php');
exit();
