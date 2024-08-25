<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';

class Endereco
{
    public $endereco_id;
    public $cep;
    public $estado;
    public $cidade;
    public $logradouro;
    public $numero_casa;
    public $complemento;
    public $bairro;

    public function __construct($id=false)
    {
        if($id){
            $this->endereco_id = $id;
            $this->carregarEndereco();
        }
    }

    public function carregarEndereco() {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM endereco WHERE id_endereco = :id';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->endereco_id);
            $stmt->execute();

            $resultado = $stmt->fetch();

            $this->cep = $resultado['cep'];
            $this->estado = $resultado['estado'];
            $this->cidade = $resultado['cidade'];
            $this->bairro = $resultado['bairro'];
            $this->numero_casa = $resultado['numero'];
            $this->complemento = $resultado['complemento'];
            $this->logradouro = $resultado['logradouro'];

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function atualizarEndereco() {
        try {
            $conn = Conexao::conectar();
            $sql = 'UPDATE endereco SET cep = :cep, estado = :estado, cidade = :cidade, bairro = :bairro, logradouro = :logradouro, complemento = :complemento, numero = :numero WHERE id_endereco = :id';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->endereco_id);
            $stmt->bindValue(':cep', $this->cep);
            $stmt->bindValue(':estado', $this->estado);
            $stmt->bindValue(':cidade', $this->cidade);
            $stmt->bindValue(':bairro', $this->bairro);
            $stmt->bindValue(':logradouro', $this->logradouro);
            $stmt->bindValue(':complemento', $this->complemento);
            $stmt->bindValue(':numero', $this->numero_casa);

            $stmt->execute();

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function cadastrarEndereco() {

        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO endereco (cep, estado, cidade, logradouro, numero, complemento, bairro) VALUES (:cep, :estado, :cidade, :logradouro, :numero_casa, :complemento, :bairro)';

            $stmt = $conn->prepare($sql);
            
            $stmt->bindValue(':cep', $this->cep);
            $stmt->bindValue(':estado', $this->estado);
            $stmt->bindValue(':cidade', $this->cidade);
            $stmt->bindValue(':logradouro', $this->logradouro);
            $stmt->bindValue(':numero_casa', $this->numero_casa);
            $stmt->bindValue(':complemento', $this->complemento);
            $stmt->bindValue(':bairro', $this->bairro);

            $stmt->execute();

            return $conn->lastInsertId();

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    static function listarEndereco() {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM endereco';
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return($resultado);

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    static function encontrarEnderecoId($id) {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT DISTINCT e.* FROM endereco e JOIN doador_endereco de ON e.id_endereco = de.id_endereco WHERE de.id_doador = :id';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $resultado = $stmt->fetch();
            return($resultado);

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}