<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';

class Doador {
    public $id_doador;
    public $nome_doador;
    public $cpf;
    public $rg;
    public $nome_mae;
    public $nome_pai;
    public $telefone;
    public $sexo;
    public $data_nascimento;
    public $tipo_sanguineo;
    public $email;
    public $senha;

    public function cadastrarDoador() {
        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO doadores (nome_doador, cpf, rg, nome_mae, nome_pai, telefone, sexo, data_nascimento, tipo_sanguineo, email, senha) VALUES (:nome_doador, :cpf, :rg, :nome_mae, :nome_pai, :telefone, :sexo, :data_nascimento, :tipo_sanguineo, :email, :senha)';
            
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':nome_doador', $this->nome_doador);
            $stmt->bindValue(':cpf', $this->cpf);
            $stmt->bindValue(':rg', $this->rg);
            $stmt->bindValue(':nome_mae', $this->nome_mae);
            $stmt->bindValue(':nome_pai', $this->nome_pai);
            $stmt->bindValue(':telefone', $this->telefone);
            $stmt->bindValue(':sexo', $this->sexo);
            $stmt->bindValue(':data_nascimento', $this->data_nascimento);
            $stmt->bindValue(':tipo_sanguineo', $this->tipo_sanguineo);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':senha', $this->senha);

            $stmt->execute();

            return $conn->lastInsertId();

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    } 


}