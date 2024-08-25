<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/doa_vida/views/__cabecalho.php';
?>
<main id="conteudo-campanhas">
    <h1 class="title_campanhas title_novaCampanha">Nova Campanha</h1>

    <form name="dados_campanha" method="post" action="/doa_vida/controllers/cadastrar_campanhas_controller.php" enctype="multipart/form-data" id="form_novaCampanha">
        <div class="upload_img_novaCampanha">
            <label class="picture" tabindex="0">
                <input required type="file" accept="image/*" id="picture_input" onchange="displayImage(this)" name="imagem_campanha">
                <span class="picture_img">
                    <img src="/doa_vida/imgs/upload.png" alt="Upload Icon" id="uploaded_image" class="default_image">
                </span>
            </label>
        </div>

        <div class="dados_campanha">
        <div class="form-group">
                <div class="input-grupo">
                    <label for="hospital">Hospital:</label>
                    <input required type="text" name="hospital" id="hospital">
                </div>

                <div class="input-grupo">
                    <label for="nome_campanha">Nome da Campanha:</label>
                    <input required type="text" name="nome_campanha" id="nome_campanha">
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-grupo">
                    <label for="descricao">Descricao:</label>
                    <input required type="text" name="descricao" id="descricao">
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-grupo">
                    <label for="email_campanha">
                        <img class="icon_campanha" src="/doa_vida/imgs/o-email.png" alt="">E-mail para contato:
                    </label>
                    <input required type="email" name="email_campanha" id="email_campanha">
                </div>

                <div class="input-grupo">
                    <label for="telefone_campanha">
                        <img class="icon_campanha" src="/doa_vida/imgs/telefone.png" alt="">Telefone para contato:
                    </label>
                    <input required type="tel" name="telefone_campanha" id="telefone_campanha">
                </div>
            </div>

            <div class="form-group">
                <div class="input-grupo">
                    <label for="data_inicio">Inicio da Campanha:</label>
                    <input required type="date" name="data_inicio" id="data_inicio">
                </div>

                <div class="input-grupo">
                    <label for="data_fim">Termino da Campanha:</label>
                    <input required type="date" name="data_fim" id="data_fim">
                </div>
            </div>

            <div class="form-group">
                <div class="input-grupo">
                    <label for="tipos_sangue">Tipo Sanguineo</label>
                    <select id="input-tipoSanguineo" name="tipo_sanguineo">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                
                <button class="btn-cadastarCampanha">Cadastrar</button>
            </div>
        </div>
    </form>
</main>
</body>

</html>