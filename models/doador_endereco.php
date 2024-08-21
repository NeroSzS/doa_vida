<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';

class DoadorEndereco {
    public $doador_endereco_id;
    public $id_doador;
    public $id_endereco;
 

    public function cadastrarDoadorEndereco() {
        try {
            $conn = Conexao::conectar();
            $sql = 'INSERT INTO doador_endereco (id_doador, id_endereco) VALUES (:id_doador, :id_endereco)';
            
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id_doador',$this->id_doador);
            $stmt->bindValue(':id_endereco', $this->id_endereco);
          

            $stmt->execute();

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    } 


}