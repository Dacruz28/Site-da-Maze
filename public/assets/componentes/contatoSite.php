<!DOCTYPE html>
<section id="contato" class="contact">
    <div class="interface">
        <div class="line-contact2">
            <div class="box-line-contact" style="width: 440px;">
                <div class="contactTitle">
                    <h2>Entre Em Contato Conosco!</h2>
                </div>
                <div class="contactInfo">
                    <div class="contactImg">
                        <img src="../img/opa.png" alt="">
                    </div>
                </div>
            </div>
            <div class="box-line-contact" style="margin-top: 56px; width: 610px;">
                <form id="contatoForm" method="post">
                    <div class="ent-cont t3">
                        <div class="ent-cont-1">
                            <label for="name">Nome</label>
                            <input class="ent-cont-t2" type="text" name="name" id="name" placeholder="Seu Nome">
                        </div>
                    </div>
                    <div class="ent-cont t3">
                        <div class="ent-cont-1">
                            <label for="email">E-mail</label>
                            <input class="ent-cont-t1" type="text" name="email" id="email" placeholder="seu@email.com">
                        </div>
                    </div>
                    <div class="ent-cont t3">
                        <div class="ent-cont-1">
                            <label for="assunto">Assunto</label>
                            <input class="ent-cont-t2" type="text" name="assunto" id="assunto" placeholder="Ex,: Criação de site para distribuição de remedios">
                        </div>
                    </div>
                    <div class="ent-cont">
                        <div class="ent-cont-1">
                            <label for="msg">Mensagem</label>
                            <textarea name="msg" id="msg" placeholder="Nos fale sobre suas necessidades"></textarea>
                        </div>
                    </div>
                    <div class="ent-cont-btn">
                        <button class="btnCon" type="submit">Enviar</button>
                    </div>
                </form>

                <div id="resposta"></div>
            </div>
        </div>
    </div>
</section>

<!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Quando o formulário for enviado
    $('#contatoForm').submit(function(e) {
        e.preventDefault(); // Previne o envio padrão do formulário

        // Coletar dados do formulário
        var formData = $(this).serialize(); // Serializa os dados do formulário

        // Enviar os dados via AJAX
        $.ajax({
            type: "POST",
            url: "http://localhost/Maze/app/controllers/emailControler.php", // Arquivo PHP que processará os dados
            data: formData,
            success: function(response) {
                // Se a resposta for de sucesso, mostre uma mensagem
                $('#resposta').html(response);
                $('#contatoForm')[0].reset(); // Limpar o formulário após o envio
            },
            error: function() {
                // Se houver erro, exibe uma mensagem de erro
                $('#resposta').html('Ocorreu um erro ao enviar o formulário.');
            }
        });
    });
});
</script>
