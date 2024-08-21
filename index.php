<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tela Inicial</title>
  <link rel="stylesheet" href="/doa_vida/css/style.css" />
  <script src="/doa_vida/script/script.js"></script>
</head>

<body>
  <main id="conteudo-principal">
    <aside id="menu-lateral">
      <img src="./imgs/logo-doe-vida.png" alt="" id="logo-doe-vida" />
      <nav id="nav-menu-lateral">
        <div class="btn-menu-lateral">
          <a href="./index.php" class="link-menu-lateral"><img
              src="./imgs/inicio-icon.svg"
              alt=""
              class="icon-menu-lateral" />Início</a>
        </div>
        <div class="btn-menu-lateral">
          <a href="./views/perfil.php" class="link-menu-lateral"><img
              src="./imgs/perfil-icon.svg"
              alt=""
              class="icon-menu-lateral" />Perfil</a>
        </div>
        <div class="btn-menu-lateral">
          <a href="#" class="link-menu-lateral"><img
              src="./imgs/cruz-icon1.0.svg"
              alt=""
              class="icon-menu-lateral" />Histórico</a>
        </div>
        <div class="btn-menu-lateral">
          <a href="./views/campanhas.php" class="link-menu-lateral"><img
              src="./imgs/campanhas-icon.svg"
              alt=""
              class="icon-menu-lateral" />Campanhas</a>
        </div>
        <div class="btn-menu-lateral">
          <a href="#" class="link-menu-lateral"><img
              src="./imgs/sangue-icon.svg"
              alt=""
              class="icon-menu-lateral" />Doadores</a>
        </div>
        <div class="btn-menu-lateral">
          <a href="./views/perguntas.php" class="link-menu-lateral"><img
              src="./imgs/perguntas-icon.svg"
              alt=""
              class="icon-menu-lateral" />Pergunta</a>
        </div>
      </nav>
      <h1>&copy; Doe Vida</h1>
    </aside>

    <div id="div-tela-inical">
      <header id="cabecalho-tela-inicial">
        <h1>Olá, <span>Usuário</span></h1>
        <a href="./views/login.php" id="btn-perfil-usuario">
          <span class="dados-usuario">
            <h1>Usuário</h1>
            <p>A+</p>
          </span>
          <span class="icon-menu-superior">
            <img src="./imgs/perfil-icon.svg" alt="" />
          </span>
        </a>
      </header>

      <main id="conteudo-tela-inical">
        <div id="carrossel-campanhas">
          <div class="containerImg">
            <img
              src="./imgs/campanha-doacao1.png"
              alt=""
              class="campanha-item" />
          </div>

          <div class="containerImg">
            <img
              src="./imgs/campanha-doacao2.jpeg"
              alt=""
              class="campanha-item" />
          </div>

          <div class="containerImg">
            <img
              src="./imgs/campanha-doacao3.png"
              alt=""
              class="campanha-item" />
          </div>
        </div>

        <div id="conteudo-carteira-doador">
          <h1>Carteira do Doador</h1>
          <div id="carteira-doador">
            <div id="carteira-doador-frente">
              <img
                src="./imgs/carteira-doador-frente.png"
                alt=""
                id="frente-carteira" />
            </div>

            <div id="dados-verso-carteira">
              <img
                src="./imgs/carteira-doador-verso.png"
                alt=""
                id="verso-carteira" />
              <div id="dados-carteira">
                <h1 id="nome-carteira">Nome Usuário</h1>
                <h2 id="cpf-carteira">CPF: 000.000.000-00</h2>
                <h2 id="data-nascimento-carteira">
                  Data de Nasc: 01/01/2024
                </h2>
                <div id="conteudo-cod-barra-carteira">
                  <div id="dados-cod-barra-carteira">
                    <img
                      src="./imgs/code-barra.png"
                      alt=""
                      id="cod-barra-carteira" />
                    <h2 id="numero-carteira">0000 0000 0000 0000</h2>
                  </div>
                  <h1 id="tipo-sanguineo-carteira">A+</h1>
                </div>
              </div>
            </div>

            <div id="containerBtn">
              <button id="btn-baixar-carteira">
                <img src="./imgs/download-icon.svg" alt="" />
              </button>
            </div>
          </div>
        </div>
      </main>
    </div>
  </main>
</body>

</html>