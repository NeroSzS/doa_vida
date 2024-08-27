<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/auth/auth.php';

if (!Auth::estarLogado()) {
    header('Location: /doa_vida/views/login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="/doa_vida/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--tag link- icone das FAQs-->
    <script src="/doa_vida/script/script.js" defer></script>
</head>

<body>
    <header id="menus">
        <aside id="menu-lateral">
            <img src="/doa_vida/imgs/logo-doe-vida.png" alt="" id="logo-doe-vida" />
            <nav id="nav-menu-lateral">
                <div class="btn-menu-lateral">
                    <a href="/doa_vida/index.php" class="link-menu-lateral"><img
                            src="/doa_vida/imgs/inicio-icon.svg"
                            alt=""
                            class="icon-menu-lateral" />Início</a>
                </div>

                <?php
                if (Auth::estarLogado()) :
                ?>
                    <div class="btn-menu-lateral">
                        <a href="/doa_vida/views/perfil.php" class="link-menu-lateral"><img
                                src="/doa_vida/imgs/perfil-icon.svg"
                                alt=""
                                class="icon-menu-lateral" />Perfil</a>
                    </div>

                <?php endif; ?>

                <div class="btn-menu-lateral">
                    <a href="#" class="link-menu-lateral"><img
                            src="/doa_vida/imgs/cruz-icon1.0.svg"
                            alt=""
                            class="icon-menu-lateral" />Histórico</a>
                </div>
                <div class="btn-menu-lateral">
                    <a href="/doa_vida/views/campanhas.php" class="link-menu-lateral"><img
                            src="/doa_vida/imgs/campanhas-icon.svg"
                            alt=""
                            class="icon-menu-lateral" />Campanhas</a>
                </div>
                <div class="btn-menu-lateral">
                    <a href="#" class="link-menu-lateral"><img
                            src="/doa_vida/imgs/sangue-icon.svg"
                            alt=""
                            class="icon-menu-lateral" />Doadores</a>
                </div>
                <div class="btn-menu-lateral">
                    <a href="/doa_vida/views/perguntas.php" class="link-menu-lateral"><img
                            src="/doa_vida/imgs/perguntas-icon.svg"
                            alt=""
                            class="icon-menu-lateral" />Pergunta</a>
                </div>
                <div class="btn-sair">
                    <a href="/doa_vida/controllers/logout_controller.php">Sair</a>
                </div>
            </nav>
            <h1>&copy; Doe Vida</h1>
        </aside>

        <div id="menu-superior">
            <h1>Olá, <span><?= Auth::estarLogado() ? $_SESSION['nome_doador'] : 'Usuário' ?></span></h1>
            <div href="/doa_vida/views/login.php" id="btn-perfil-usuario">
                <span class="dados-usuario">
                    <h1><?= Auth::estarLogado() ? $_SESSION['nome_doador'] : 'Usuário' ?></h1>
                    <p><?= Auth::estarLogado() ? $_SESSION['tipo_sanguineo'] : '' ?></p>
                </span>
                <span class="icon-menu-superior">
                    <img src="/doa_vida/imgs/perfil-icon.svg" alt="" />
                </span>
            </div>
        </div>
    </header>

    <main id="conteudo-principal">