<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/auth/auth.php';

    $email_login = $_POST['email_login'];
    $senha_login = $_POST['senha_login'];

    Auth::login($email_login, $senha_login);
?>