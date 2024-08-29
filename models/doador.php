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

    public function __construct($id=false)
    {
        if($id){
            $this->id_doador = $id;
            $this->carregarDoador();
        }
    }

    public function carregarDoador() {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM doadores WHERE id_doador = :id';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->id_doador);
            $stmt->execute();

            $resultado = $stmt->fetch();

            $this->nome_doador = $resultado['nome_doador'];
            $this->cpf = $resultado['cpf'];
            $this->rg = $resultado['rg'];
            $this->nome_mae = $resultado['nome_mae'];
            $this->nome_pai = $resultado['nome_pai'];
            $this->telefone = $resultado['telefone'];
            $this->sexo = $resultado['sexo'];
            $this->data_nascimento = $resultado['data_nascimento'];
            $this->tipo_sanguineo = $resultado['tipo_sanguineo'];
            $this->email = $resultado['email'];
            
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function atualizarDoador() {
        try {
            $conn = Conexao::conectar();
            $sql = 'UPDATE doadores SET email = :email, telefone = :telefone WHERE id_doador = :id';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->id_doador);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':telefone', $this->telefone);

            $stmt->execute();

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }


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
    
    static function listarDoador()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM doadores';
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return($resultado);

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}