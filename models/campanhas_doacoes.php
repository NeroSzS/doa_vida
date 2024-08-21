<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';

class Campanhas
{
    public $id_campanha;
    public $hospital;
    public $nome_campanha;
    public $descricao;
    public $data_inicio;
    public $data_fim;
    public $email_campanha;
    public $telefone_campanha;
    public $tipo_sanguineo;
    public $imagem_campanha;

    public function cadastrarCampanha()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO campanhas_de_doacoes (hospital, nome_campanha, descricao, data_inicio, data_fim, email, telefone, tipo_sanguineo, imagem_campanha) VALUES (:hospital, :nome_campanha, :descricao, :data_inicio, :data_fim, :email, :telefone, :tipo_sanguineo, :imagem_campanha)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':hospital', $this->hospital);
            $stmt->bindValue(':nome_campanha', $this->nome_campanha);
            $stmt->bindValue(':descricao', $this->descricao);
            $stmt->bindValue(':data_inicio', $this->data_inicio);
            $stmt->bindValue(':data_fim', $this->data_fim);
            $stmt->bindValue(':email', $this->email_campanha);
            $stmt->bindValue(':telefone', $this->telefone_campanha);
            $stmt->bindValue(':tipo_sanguineo', $this->tipo_sanguineo);
            $stmt->bindValue(':imagem_campanha', $this->imagem_campanha);

            $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    static function listarCampanhas()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM campanhas_de_doacoes';
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return($resultado);

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
