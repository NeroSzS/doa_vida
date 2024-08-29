<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';
class Agendamento
{

    public static function criarAgendamento($data_doacao, $id_doador, $id_campanhas)
    {
        $conn = Conexao::conectar();
        $sql = "INSERT INTO agendamento (data_doacao, id_doador, id_campanhas) VALUES (:data_doacao, :id_doador, :id_campanhas)";
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':data_doacao' => $data_doacao,
            ':id_doador' => $id_doador,
            ':id_campanhas' => $id_campanhas
        ]);
    }

    static function listarCampanhasAgendadas($id_doador)
    {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT a.*, c.* 
                FROM agendamento a 
                JOIN campanhas c ON a.id_campanhas = c.id_campanhas 
                WHERE a.id_doador = :id_doador';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id_doador', $id_doador);

            $stmt->execute();

            $resultado = $stmt->fetchAll();
            return ($resultado);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
