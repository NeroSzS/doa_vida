<?php
require_once '__cabecalho.php';
?>
<main id="conteudo-tela-inical">
    <div class="title">
        <h1>Nova Campanha</h1>
    </div>

    <form name="dados_campanha" method="post" action="/doa_vida/controllers/cadastrar_campanhas_controller.php" enctype="multipart/form-data">
        <div class="upload">
            <label class="picture" tabindex="0">
                <input type="file" accept="image/*" id="picture_input" onchange="displayImage(this)" name="imagem_campanha">
                <span class="picture_img">
                    <img src="./imgs/upload.png" alt="Upload Icon" id="uploaded_image" class="default_image">
                </span>
            </label>
        </div>

        <div class="dados_campanha">
        <div class="form-group">
                <label for="hospital">Hospital:</label>
                <input type="text" name="hospital" id="hospital">
            </div>

            <div class="form-group">
                <label for="nome_campanha">Nome da Campanha:</label>
                <input type="text" name="nome_campanha" id="nome_campanha">
            </div>
            
            <div class="form-group">
                <label for="descricao">Descricao:</label>
                <input type="text" name="descricao" id="descricao">
            </div>
            
            <div class="form-group">
                <img class="icon_campanha" src="./imgs/o-email.png" alt="">
                <label for="email_campanha">E-mail para contato:</label>
                <input type="email" name="email_campanha" id="email_campanha">
            </div>

            <div class="form-group">
                <img class="icon_campanha" src="./imgs/telefone.png" alt="">
                <label for="telefone_campanha">Telefone para contato:</label>
                <input type="tel" name="telefone_campanha" id="telefone_campanha">
            </div>

            <div class="form-group">
                <label for="data_inicio">Data de Inicio da Campanha:</label>
                <input type="date" name="data_inicio" id="data_inicio">

                <label for="data_fim">Data de Termino da Campanha:</label>
                <input type="date" name="data_fim" id="data_fim">
            </div>
        </div>


        <label for="tipos_sangue"></label>
        <select id="form-tipo" name="tipo_sanguineo">
            <option value="a+">A+</option>
            <option value="a-">A-</option>
            <option value="b+">B+</option>
            <option value="b-">B-</option>
            <option value="ab+">AB+</option>
            <option value="ab-">AB-</option>
            <option value="o+">O+</option>
            <option value="o-">O-</option>
        </select>

        <button class="submit-button">Enviar</button>
    </form>
</main>
</body>

</html>