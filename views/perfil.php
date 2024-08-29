<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/endereco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/clinica_endereco.php';

if (Auth::eClinica()) {
  $resultado_clinica = ClinicaEndereco::encontrarEnderecoPorClinica($_SESSION['id_clinica']);
} else {
  $resultado = Endereco::encontrarEnderecoId($_SESSION['id_doador']);
}
?>
<main id="conteudo_perfil">
  <h1 id="title_perfil">Meu Perfil</h1>

  <div id="div_container_perfil">
    <?php if (Auth::eClinica()) :?>
      <div id="div_dados_pessoais_perfil">
          <h1 class="title_div_dados_perfil">Dados Pessoas</h1>

          <h2 id="title_nome_perfil" class="title_dados_perfil">Razão Socail</h2>
          <p id="dados_nome_perfil" class="dados_perfil"><?= $_SESSION['razao_clinica'] ?></p>

          <h2 id="title_nome_perfil" class="title_dados_perfil">Nome Fantasia</h2>
          <p id="dados_nome_perfil" class="dados_perfil"><?= $_SESSION['nome_fantasia'] ?></p>

          <h2 id="title_cpf_perfil" class="title_dados_perfil">CNPJ</h2>
          <p id="dados_cpf_perfil" class="dados_perfil"><?= $_SESSION['cnpj'] ?></p>
      </div>

      <div id="div_dados_autoDeclarados_perfil">
        <h1 class="title_div_dados_perfil">Informações Auto-Declaradas</h1>
        <form action="" id="form_editarPerfil">
          <div id="input_email_perfil" class="div_input_perfil">
            <div class="content_input_perfil">
              <h2 id="title_email_perfil" class="title_dados_perfil">E-mail</h2>
              <p id="dados_email_perfil" class="dados_perfil"><?= $_SESSION['email'] ?></p>
            </div>
          </div>

          <div id="input_telefone_perfil" class="div_input_perfil">
            <div class="content_input_perfil">
              <h2 id="title_telefone_perfil" class="title_dados_perfil">Telefone</h2>
              <p id="dados_telefone_perfil" class="dados_perfil"><?= $_SESSION['telefone'] ?></p>
            </div>
          </div>

          <div id="input_endereco_perfil" class="div_input_perfil">
            <div class="content_input_perfil">
              <h2 id="title_endereco_perfil" class="title_dados_perfil">Endereço</h2>
              <p id="dados_endereco_perfil" class="dados_perfil"><?= $resultado_clinica['logradouro'] . ', nº ' . $resultado_clinica['numero'] . ', ' . $resultado_clinica['bairro'] . ', ' . $resultado_clinica['cep'] . ', ' . $resultado_clinica['cidade'] . '-' . $resultado_clinica['estado'] ?></p>
            </div>
          </div>
        </form>
      </div>

    <?php else :?>
      <div id="div_dados_pessoais_perfil">
          <h1 class="title_div_dados_perfil">Dados Pessoas</h1>

          <h2 id="title_nome_perfil" class="title_dados_perfil">Nome Civil</h2>
          <p id="dados_nome_perfil" class="dados_perfil"><?= $_SESSION['nome_doador'] ?></p>

          <h2 id="title_cpf_perfil" class="title_dados_perfil">CPF</h2>
          <p id="dados_cpf_perfil" class="dados_perfil"><?= $_SESSION['cpf'] ?></p>

          <h2 id="title_dataNascimento_perfil" class="title_dados_perfil">Data de Nascimento</h2>
          <p id="dados_dataNascimento_perfil" class="dados_perfil"><?= $_SESSION['data_nascimento'] ?></p>

          <h2 id="title_tipoSangue_perfil" class="title_dados_perfil">Tipo Sanguíneo</h2>
          <p id="dados_tipoSangue_perfil" class="dados_perfil"><?= $_SESSION['tipo_sanguineo'] ?></p>
      </div>

      <div id="div_dados_autoDeclarados_perfil">
        <h1 class="title_div_dados_perfil">Informações Auto-Declaradas</h1>
        <form action="" id="form_editarPerfil">
          <div id="input_email_perfil" class="div_input_perfil">
            <div class="content_input_perfil">
              <h2 id="title_email_perfil" class="title_dados_perfil">E-mail</h2>
              <p id="dados_email_perfil" class="dados_perfil"><?= $_SESSION['email'] ?></p>
            </div>
          </div>

          <div id="input_telefone_perfil" class="div_input_perfil">
            <div class="content_input_perfil">
              <h2 id="title_telefone_perfil" class="title_dados_perfil">Telefone</h2>
              <p id="dados_telefone_perfil" class="dados_perfil"><?= $_SESSION['telefone'] ?></p>
            </div>
          </div>

          <div id="input_endereco_perfil" class="div_input_perfil">
            <div class="content_input_perfil">
              <h2 id="title_endereco_perfil" class="title_dados_perfil">Endereço</h2>
              <p id="dados_endereco_perfil" class="dados_perfil"><?= $resultado['logradouro'] . ', nº ' . $resultado['numero'] . ', ' . $resultado['bairro'] . ', ' . $resultado['cep'] . ', ' . $resultado['cidade'] . '-' . $resultado['estado'] ?></p>
            </div>
          </div>

          <div id="footer_editar_perfil">
            <a href="/doa_vida/views/editarDoador.php?id=<?= $_SESSION['id_doador'] ?>" id="btn-editarPerfil">Editar</a>
          </div>
        </form>
      </div>
    <?php endif; ?>
  </div>
  </div>
</main>
</div>
</main>
</body>

</html>