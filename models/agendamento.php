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
            $sql = 'SELECT a.data_doacao, c.id_campanhas, c.hospital, c.nome_campanha, c.descricao, c.data_inicio, c.data_fim, c.email AS email_campanha, c.telefone AS telefone_campanha, c.tipo_sanguineo, c.imagem_campanha FROM agendamento a JOIN campanhas_de_doacoes c ON a.id_campanhas = c.id_campanhas WHERE a.id_doador = :id_doador';
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
