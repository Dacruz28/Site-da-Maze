<!DOCTYPE html>
<section id="contato" class="contact">
    <div class="interface">
        <div class="line-contact2">
            <div class="box-line-contact" style="width: 440px;">
                <div class="contactTitle">
                    <h2>Entre Em Contato <br> Conosco!</h2>
                </div>
                <div class="contactInfo">
                    <div class="contactImg">
                        <img src="{{ url('img/contato.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="box-line-contact" style="margin-top: 56px; width: 610px;">
                <form id="contatoForm" action="{{ route('contato.enviar') }}" method="post">
                    @csrf
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
                    <button class="btnCon" type="submit" id="enviarBtn" disabled>Enviar</button>
                    </div>
                </form>

                <div id="resposta"></div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        function verificarCampos() {
            const nome = $('#name').val().trim();
            const email = $('#email').val().trim();
            const assunto = $('#assunto').val().trim();
            const mensagem = $('#msg').val().trim();

            // Habilita o botão só se todos os campos estiverem preenchidos
            if (nome && email && assunto && mensagem) {
                $('#enviarBtn').prop('disabled', false);
            } else {
                $('#enviarBtn').prop('disabled', true);
            }
        }

        // Verifica os campos sempre que o usuário digita ou muda algo
        $('#name, #email, #assunto, #msg').on('input', verificarCampos);

        // Também verifica ao carregar a página (caso algum campo já tenha valor)
        verificarCampos();
    });
</script>



<!-- Incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

