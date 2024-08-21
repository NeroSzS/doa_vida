<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <main id="conteudo-login">
        <img src="../imgs/gif_tela-inicial.gif" alt="" id="gif-login" />
        <div id="conteudo-formLogin">
            <form action="/doa_vida/controllers/login_controller.php" method="post" id="formLogin">
                <h1>Doe Vida</h1>
                <div id="conteudo-input-emailLogin">
                    <label for="email_login">E-mail</label>
                    <input type="email" name="email_login" id="email_login">
                </div>
                <div id="conteudo-input-senhaLogin">
                    <label for="senha_login">Senha</label>
                    <input type="password" name="senha_login" id="senha_login">
                </div>
                <div id="conteudo-input-lembrarLogin">
                    <div id="lembarInput">
                        <input type="checkbox" name="lembar-login" id="lembar-login">
                        <label for="lembar-login">Lembre-me</label>
                    </div>
                    <a href="senha.html">Esqueceu sua senha?</a>
                </div>
                <button type="submit">Entrar</button>
            </form>
            <p>Ainda não é cadastrado ? <a href="cadastro.php">Crie sua conta</a></p>
        </div>
    </main>
</body>

</html>