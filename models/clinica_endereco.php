<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';

class ClinicaEndereco
{
    public $clinica_endereco_id;
    public $id_clinica;
    public $id_endereco;

    public function __construct($id = false)
    {
        if ($id) {
            $this->clinica_endereco_id = $id;
            $this->carregarClinicaEndereco();
        }
    }

    public function carregarClinicaEndereco()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM clinica_endereco WHERE clinica_endereco_id = :id';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->clinica_endereco_id);
            $stmt->execute();

            $resultado = $stmt->fetch();

            if ($resultado) {
                $this->id_clinica = $resultado['id_clinica'];
                $this->id_endereco = $resultado['id_endereco'];
            } else {
                throw new Exception("Relacionamento não encontrado.");
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    static function listarClinicaEnderecos()
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM clinica_endereco';
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return $resultado;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    static function encontrarEnderecoPorClinica($id_clinica)
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM clinica_endereco WHERE id_clinica = :id_clinica';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_clinica', $id_clinica);
            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return $resultado;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
