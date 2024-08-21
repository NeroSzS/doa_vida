<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';
session_start();
class Auth {

    static function login($email, $senha) {
        try {
            $conn = Conexao::conectar();
            $sql = 'SELECT * FROM doadores WHERE email = :email';
    
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $email);
    
            $stmt->execute();
    
            $resultado = $stmt->fetch();

            if(!empty($resultado) && password_verify($senha, $resultado['senha'])) {
                $_SESSION['nome_doador'] = $resultado['nome_doador'];
                $_SESSION['cpf'] = $resultado['cpf'];
                $_SESSION['rg'] = $resultado['rg'];
                $_SESSION['nome_mae'] = $resultado['nome_mae'];
                $_SESSION['nome_pai'] = $resultado['nome_pai'];
                $_SESSION['telefone'] = $resultado['telefone'];
                $_SESSION['sexo'] = $resultado['sexo'];
                $_SESSION['email'] = $resultado['email'];
                $_SESSION['tipo_sanguineo'] = $resultado['tipo_sanguineo'];


                header('Location: /doa_vida/index.php');
                exit();
            }
            
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    static function logout() {
        session_unset();
        session_destroy();
        header('Location: /doa_vida/views/login.php');
        exit();
    }

    static function estarLogado() {
        if(isset($_SESSION['nome_doador'])) {
            return true;
        } else {
            return false;
        }
    }
}

?>