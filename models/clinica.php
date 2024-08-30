<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';

class Clinica
{
    public $id_clinica;
    public $razao_clinica;
    public $nome_fantasia;
    public $cnpj;
    public $email;
    public $telefone;
    public $senha;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id_clinica = $id;
            $this->carregarClinica();
        }
    }

    public function carregarClinica()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM clinicas WHERE id_clinica = :id';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->id_clinica);
            $stmt->execute();

            $resultado = $stmt->fetch();

            $this->razao_clinica = $resultado['razao_clinica'];
            $this->nome_fantasia = $resultado['nome_fantasia'];
            $this->cnpj = $resultado['cnpj'];
            $this->email = $resultado['email'];
            $this->telefone = $resultado['telefone'];

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
