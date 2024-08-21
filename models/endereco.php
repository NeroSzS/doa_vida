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
}