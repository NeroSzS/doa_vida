<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <main id="conteudo-cadastro">
        <h2>Formulário de Cadastro</h2>
        <form id="cadastroForm" action="/doa_vida/controllers/cadastrar_doador_controller.php" method="post">
            <label for="nomeCompleto">Nome Completo *</label>
            <input type="text" id="nomeCompleto" name="nomeCompleto" required>

            <label for="cpf">CPF *</label>
            <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>

            <label for="rg">RG *</label>
            <input type="text" id="rg" name="rg" required>

            <label for="nomeMae">Nome da mãe *</label>
            <input type="text" id="nomeMae" name="nomeMae" required>

            <label for="nomePai">Nome do pai</label>
            <input type="text" id="nomePai" name="nomePai">

            <label for="celular">Celular</label>
            <input type="tel" id="celular" name="celular">

            <label>Sexo biológico *</label>
            <div id="conteudo-sexo">
                <div class="conteudo-radio">
                    <input type="radio" id="sexoM" name="sexo" value="masculino" required>
                    <label for="sexoM">Masculino</label>
                </div>
                <div class="conteudo-radio">
                    <input type="radio" id="sexoF" name="sexo" value="feminino" required>
                    <label for="sexoF">Feminino</label>
                </div>
            </div>

            <label for="dataNascimento">Data de Nascimento *</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required>

            <div id="conteudo-sanguineo">
                <div id="conteudo-tipoSaguineo">
                    <label for="tipoSanguineo">Tipo Sanguíneo *</label>
                    <select id="tipoSanguineo" name="tipoSanguineo" required>
                        <option value="">Selecione...</option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
            </div>

            <label for="cep">CEP *</label>
            <input type="text" id="cep" name="cep" required>

            <label for="estado">Estado *</label>
            <select id="estado" name="estado" required>
                <option value="">Selecione...</option>
                <option value="MA">Maranhão</option>
            </select>

            <label for="cidade">Cidade *</label>
            <select id="cidade" name="cidade" required>
                <option value="">Selecione...</option>
                <option value="São Luís">São Luís</option>
                <option value="São José de Ribamar">São José de Ribamar</option>
                <option value="Raposa">Raposa</option>
                <option value="Paça do Lumiar">Paço do Lumiar</option>
            </select>

            <label for="logradouro">Logradouro *</label>
            <input type="text" id="logradouro" name="logradouro" required>

            <label for="numero">Número *</label>
            <input type="text" id="numero" name="numeroCasa" required>

            <label for="complemento">Complemento</label>
            <input type="text" id="complemento" name="complemento">

            <label for="bairro">Bairro *</label>
            <input type="text" id="bairro" name="bairro" required>

            <label for="email_cadastro">Email *</label>
            <input type="email" id="email_cadastro" name="email_cadastro" required>

            <label for="senha_cadastro">Escolha sua senha *</label>
            <input type="password" id="senha_cadastro" name="senha_cadastro" required>

            <label for="confirmarSenha_cadastro">Confirme a senha *</label>
            <input type="password" id="confirmarSenha_cadastro" name="confirmarSenha_cadastro" required>

            <a href="/doa_vida/views/login.php">Já tenho cadastro</a>
            <input type="submit" value="CADASTRAR">
        </form>
    </main>
</body>

</html>