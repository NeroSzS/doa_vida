<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/endereco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/models/doador.php';


$id = $_GET['id'];

$doador = new Doador($id);

$resultado = Endereco::encontrarEnderecoId($id);

$sexo_atual = $resultado['sexo'];
$cidade_atual = $resultado['cidade'];
$estado_atual = $resultado['estado'];


?>

<main id="conteudo-editarPerfil">
    <h2 id="title_editarPerfil">Editar Doador</h2>
    <form id="form-editarPerfil" action="/doa_vida/controllers/editar_doador_controller.php" method="post">
        <input type="hidden" name="id_doador" value="<?= $doador->id_doador ?>">
        <input type="hidden" name="id_endereco" value="<?= $resultado['id_endereco'] ?>">

        <label for="nomeCompleto">Nome Completo *</label>
        <input type="text" id="nomeCompleto" name="nomeCompleto" value="<?= $doador->nome_doador ?>" required>

        <label for="nomeMae">Nome da mãe *</label>
        <input type="text" id="nomeMae" name="nomeMae" value="<?= $doador->nome_mae ?>" required>

        <label for="nomePai">Nome do pai</label>
        <input type="text" id="nomePai" name="nomePai" value="<?= $doador->nome_pai ?>">

        <label for="celular">Celular</label>
        <input type="tel" id="celular" name="celular" value="<?= $doador->telefone ?>">

        <label>Sexo biológico *</label>
        <div id="conteudo-sexo">
            <div class="conteudo-radio">
                <input type="radio" id="sexoM" name="sexo" value="masculino" value="Masculino" <?= $sexo_atual == 'Masculino' ? 'checked' : '' ?> required>
                <label for="sexoM">Masculino</label>
            </div>
            <div class="conteudo-radio">
                <input type="radio" id="sexoF" name="sexo" value="feminino" value="Feminino" <?= $sexo_atual == 'Feminino' ? 'checked' : '' ?> required>
                <label for="sexoF">Feminino</label>
            </div>
        </div>

        <label for="dataNascimento">Data de Nascimento *</label>
        <input type="date" id="dataNascimento" name="dataNascimento" value="<?= $doador->email ?>" required>


        <label for="email">E-mail *</label>
        <input type="email" id="email" name="email" value="<?= $doador->email ?>" required>

        <label for="telefone">Telefone *</label>
        <input type="tel" id="telefone" name="telefone" value="<?= $doador->telefone ?>" required>

        <label for="cep">CEP *</label>
        <input type="text" id="cep" name="cep" value="<?= $resultado['cep'] ?>" required>

        <label for="estado">Estado *</label>
        <select id="estado" name="estado" required>
            <option value="Maranhão" <?= $estado_atual == 'Maranhão' ? 'selected' : '' ?>>Maranhão</option>
        </select>

        <label for="cidade">Cidade *</label>
        <select id="cidade" name="cidade" required>
            <option value="">Selecione...</option>
            <option value="São Luís" <?= $cidade_atual == 'São Luís' ? 'selected' : '' ?>>São Luís</option>
            <option value="São José de Ribamar" <?= $cidade_atual == 'São José de Ribamar' ? 'selected' : '' ?>>São José de Ribamar</option>
            <option value="Raposa" <?= $cidade_atual == 'Raposa' ? 'selected' : '' ?>>Raposa</option>
            <option value="Paço do Lumiar" <?= $cidade_atual == 'Paço do Lumiar' ? 'selected' : '' ?>>Paço do Lumiar</option>
        </select>

        <label for="logradouro">Logradouro *</label>
        <input type="text" id="logradouro" name="logradouro" value="<?= $resultado['logradouro'] ?>" required>

        <label for="numero">Número *</label>
        <input type="text" id="numero" name="numeroCasa" value="<?= $resultado['numero'] ?>" required>

        <label for="complemento">Complemento</label>
        <input type="text" id="complemento" name="complemento" value="<?= $resultado['complemento'] ?>">

        <label for="bairro">Bairro *</label>
        <input type="text" id="bairro" name="bairro" value="<?= $resultado['bairro'] ?>" required>

        <div id="footer_editar_perfil">
            <input type="submit" value="Salvar">
        </div>
    </form>
</main>
</body>