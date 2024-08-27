<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/endereco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador_endereco.php';


$nomeCompleto = htmlspecialchars($_POST['nomeCompleto']);
$cpf = htmlspecialchars($_POST['cpf']);
$rg = htmlspecialchars($_POST['rg']);
$nomeMae = htmlspecialchars($_POST['nomeMae']);
$nomePai = htmlspecialchars($_POST['nomePai']);
$telefone = htmlspecialchars($_POST['celular']);
$sexo = htmlspecialchars($_POST['sexo']);
$dataNascimento = $_POST['dataNascimento'];
$tipoSanguineo = htmlspecialchars($_POST['tipoSanguineo']);
if(filter_var($_POST['email_cadastro'], FILTER_VALIDATE_EMAIL)){
    $email = filter_var($_POST['email_cadastro'], FILTER_SANITIZE_EMAIL);
};
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

$cep = htmlspecialchars($_POST['cep']);
$estado = htmlspecialchars($_POST['estado']);
$cidade = htmlspecialchars($_POST['cidade']);
$logradouro = htmlspecialchars($_POST['logradouro']);
$numero_casa = htmlspecialchars($_POST['numeroCasa']);
$complemento = htmlspecialchars($_POST['complemento']);
$bairro = htmlspecialchars($_POST['bairro']);

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
