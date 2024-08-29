<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/configs/conexao.php';
session_start();
class Auth
{

    static function login($email, $senha)
{
    try {
        $conn = Conexao::conectar();

        // Verifica se é um doador
        $sql = 'SELECT * FROM doadores WHERE email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $resultado = $stmt->fetch();

        if (!empty($resultado) && password_verify($senha, $resultado['senha'])) {
            $_SESSION['id_doador'] = $resultado['id_doador'];
            $_SESSION['nome_doador'] = $resultado['nome_doador'];
            $_SESSION['cpf'] = $resultado['cpf'];
            $_SESSION['rg'] = $resultado['rg'];
            $_SESSION['nome_mae'] = $resultado['nome_mae'];
            $_SESSION['nome_pai'] = $resultado['nome_pai'];
            $_SESSION['telefone'] = $resultado['telefone'];
            $_SESSION['sexo'] = $resultado['sexo'];
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['tipo_sanguineo'] = $resultado['tipo_sanguineo'];
            $_SESSION['data_nascimento'] = $resultado['data_nascimento'];
            header('Location: /doa_vida/index.php');
            exit();
        }

        // Se não for um doador, verifica se é uma clínica
        $sqlClinica = 'SELECT * FROM clinicas WHERE email = :email';
        $stmtClinica = $conn->prepare($sqlClinica);
        $stmtClinica->bindValue(':email', $email);
        $stmtClinica->execute();
        $resultadoClinica = $stmtClinica->fetch();

        if (!empty($resultadoClinica) && password_verify($senha, $resultadoClinica['senha'])) {
            $_SESSION['id_clinica'] = $resultadoClinica['id_clinica'];
            $_SESSION['razao_clinica'] = $resultadoClinica['razao_clinica'];
            $_SESSION['nome_fantasia'] = $resultadoClinica['nome_fantasia'];
            $_SESSION['cnpj'] = $resultadoClinica['cnpj'];
            $_SESSION['email'] = $resultadoClinica['email'];
            $_SESSION['e_clinica'] = $resultadoClinica['e_clinica'];

            header('Location: /doa_vida/index.php');
            exit();
        }

        // Se não for nem um doador nem uma clínica
        setcookie('aviso', 'Você errou o E-mail ou a Senha!!!', time() + 3600, '/doa_vida/');
        header('Location: /doa_vida/views/login.php');
        exit();

    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
}


    static function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /doa_vida/views/login.php');
        exit();
    }

    static function estarLogado()
    {
        if (isset($_SESSION['nome_doador'])) {
            return true;
        }

        if (isset($_SESSION['razao_clinica'])) {
            return true;
        } else {
            return false;
        }
    }

    static function eClinica() {
        if (isset($_SESSION['e_clinica'])) {
            return true;
        } else {
            return false;
        }
    }
}
