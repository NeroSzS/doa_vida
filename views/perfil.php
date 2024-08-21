<?php
require_once '__cabecalho.php';
?>
<main id="conteudo_perfil">
  <h1 id="title_perfil">Meu Perfil</h1>

  <div id="div_container_perfil">
    <div id="div_dados_pessoais_perfil">
      <h1 class="title_div_dados_perfil">Dados Pessoas</h1>

      <h2 id="title_nome_perfil" class="title_dados_perfil">Nome Civil</h2>
      <p id="dados_nome_perfil" class="dados_perfil">Fulano</p>

      <h2 id="title_cpf_perfil" class="title_dados_perfil">CPF</h2>
      <p id="dados_cpf_perfil" class="dados_perfil">000.000.000-00</p>

      <h2 id="title_dataNascimento_perfil" class="title_dados_perfil">Data de Nascimento</h2>
      <p id="dados_dataNascimento_perfil" class="dados_perfil">00/00/0000</p>

      <h2 id="title_carteiraDoador_perfil" class="title_dados_perfil">Carteira de Doador</h2>
      <p id="dados_carteiraDoador_perfil" class="dados_perfil">0000 0000 0000 0000</p>

      <h2 id="title_tipoSangue_perfil" class="title_dados_perfil">Tipo Sanguíneo</h2>
      <p id="dados_tipoSangue_perfil" class="dados_perfil">A+</p>

    </div>

    <div id="div_dados_autoDeclarados_perfil">
      <h1 class="title_div_dados_perfil">Informações Auto-Declaradas</h1>
      <form action="" id="form_editarPerfil">
        <div id="input_email_perfil" class="div_input_perfil">
          <div class="content_input_perfil">
            <h2 id="title_email_perfil" class="title_dados_perfil">E-mail</h2>
            <p id="dados_email_perfil" class="dados_perfil">fulano123@mail.com</p>
          </div>

          <button class="edit_button"><img id="icon_editar_perfil" src="../imgs/edit.png" alt=""></button>
        </div>

        <div id="input_telefone_perfil" class="div_input_perfil">
          <div class="content_input_perfil">
            <h2 id="title_telefone_perfil" class="title_dados_perfil">Telefone</h2>
            <p id="dados_telefone_perfil" class="dados_perfil">(98) 90000-0000</p>
          </div>

          <button class="edit_button"><img id="icon_editar_perfil" src="../imgs/edit.png" alt=""></button>
        </div>

        <div id="input_endereco_perfil" class="div_input_perfil">
          <div class="content_input_perfil">
            <h2 id="title_endereco_perfil" class="title_dados_perfil">Endereço</h2>
            <p id="dados_endereco_perfil" class="dados_perfil">Rua do Passeio, Nº 120 - CEP: 65.010-000 - Centro - São Luís MA</p>
          </div>

          <button class="edit_button"><img id="icon_editar_perfil" src="../imgs/edit.png" alt=""></button>
        </div>

        <div id="footer_editar_perfil">
          <input type="submit" value="Salvar">
        </div>
      </form>
    </div>
  </div>
  </div>
</main>
</div>
</main>
</body>

</html>