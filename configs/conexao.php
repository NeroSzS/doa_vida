<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/config.php';

class Conexao {
    static function conectar() {
        $conn = new PDO('mysql:host=' . LOCAL_BANCO . ';dbname=' . NOME_BANCO . ';charset=utf8', USUARIO, SENHA);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; 
    }
}