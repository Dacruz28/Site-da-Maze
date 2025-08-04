<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11.1.15/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/maze.png') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ url('css/styleGeral.css') }}">
    <link rel="stylesheet" href="{{ url('css/styleFooter.css') }}">
    <link rel="stylesheet" href="{{ url('css/styleContact.css') }}">
    <link rel="stylesheet" href="{{ url('css/styleNav.css') }}">
<style>
    /* Estilos dos modais - Versão Profissional */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease;
        /* Centralização garantida */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal.active {
        opacity: 1;
    }

    .modal-content {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        width: 90%;
        max-width: 450px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        transform: translateY(-20px);
        transition: transform 0.3s ease;
        position: relative;
        overflow: hidden;
        /* Centralização adicional */
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
    .modal.active .modal-content {
        transform: translateY(0);
    }

    .modal-content:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
    }

    .modal-success .modal-content:before {
        background: linear-gradient(90deg, #51dfdf, #49CCCC);
    }

    .modal-error .modal-content:before {
        background: linear-gradient(90deg, #F44336, #FF5722);
    }

    .modal-content h2 {
        text-align: center;
        font-size: 28px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .modal-success h2 {
        color: #51dfdf;
    }

    .modal-error h2 {
        color: #F44336;
    }

    .modal-content p {
        text-align: center;
        font-size: 16px;
        line-height: 1.6;
        color: #555;
        margin-bottom: 25px;
    }

    .modal-content ul {
        padding-left: 20px;
        margin-bottom: 25px;
    }

    .modal-content li {
        color: #555;
        margin-bottom: 8px;
        font-size: 15px;
        list-style-type: disc;
    }

    .modal-icon {
        text-align: center;
        font-size: 60px;
        margin-bottom: 20px;
    }

    .modal-success .modal-icon {
        color: #51dfdf;
    }

    .modal-error .modal-icon {
        color: #F44336;
    }

    .modal-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #888;
        transition: color 0.2s;
    }

    .modal-close:hover {
        color: #333;
    }

    .modal-button {
        display: block;
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s;
        text-align: center;
    }

    .modal-success .modal-button {
        background: #51dfdf;
        color: white;
    }

    .modal-success .modal-button:hover {
        background:rgb(53, 151, 151);
    }

    .modal-error .modal-button {
        background: #F44336;
        color: white;
    }

    .modal-error .modal-button:hover {
        background: #d32f2f;
    }
</style>
    <title>Maze</title>
</head>
<body>

    <div class="preloader" id="preloader">  
        <div class="loader" id="loader"></div>
    </div>

    <header style="position: fixed !important; margin:0; padding:0 " >
        <!-- NavBar -->
             @include('componentes.nav_site')
    </header>

    <main>

        <!-- Modal de Sucesso quando um email é enviado -->
        <!-- Modal de Sucesso quando um email é enviado -->
@if (session('success'))
    <div class="modal modal-success" id="successModal">
        <div class="modal-content">
            <button class="modal-close">&times;</button>
            <div class="modal-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2>Sucesso!</h2>
            <p>{{ session('success') }}</p>
            <button class="modal-button" id="successButton">Entendido</button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="modal modal-error" id="errorModal">
        <div class="modal-content">
            <button class="modal-close">&times;</button>
            <div class="modal-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <h2>Ocorreu um erro</h2>
            <p>Por favor, corrija os seguintes problemas:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="modal-button" id="errorButton">Entendido</button>
        </div>
    </div>
@endif
    <section class="hero" id="home">
            <div class="hero-content">
                    <div class="nav_text">
                    <h1 class="title">O futuro começa no próximo passo.</h1>
                    <p class="subtitle">A Maze é uma empresa de tecnologia que desenvolve sistemas para pequenas e médias empresas, com foco em simplificar processos e promover a transformação digital.</p>
                    <div class="geral_button">
                        <div class="nav_button"><li><a href="#contato"><button type="submit" class="btnn">Fale Conosco</button></a></li>
                        </div>
                    </div>
                    
                    </div>
                </form>
            </div>
        </section>

     <section id="sobre" class="sobre section-hidden">
  <div class="container5">
    <h2>Nossos principais <br><span id="span">objetivos!</span></h2>
    <div class="sobre">
      <div class="img-item">
<div class="img_desc card-hidden">
  <img class="logoS" src="{{ url('img/marcha1.png') }}" alt="">
  <h3 class="card-title">Transparência</h3>
  <p class="text_sobre">Excelência e clareza em cada etapa do processo.</p>
</div>

<div class="img_desc card-hidden">
  <img class="logoS" src="{{ url('img/marchar2.png') }}" alt="">
  <h3 class="card-title">Custo-Benefício</h3>
  <p class="text_sobre">Alta performance com o melhor custo-benefício.</p>
</div>

<div class="img_desc card-hidden">
  <img class="logoS" src="{{ url('img/marcha3.png') }}" alt="">
  <h3 class="card-title">Inovação</h3>
  <p class="text_sobre">Aplicações práticas com o que há de mais moderno em tecnologia.</p>
</div>

<div class="img_desc card-hidden">
  <img class="logoS" src="{{ url('img/marcha.png') }}" alt="">
  <h3 class="card-title">Tecnologia de ponta</h3>
  <p class="text_sobre">Soluções tecnológicas avançadas que fortalecem sua empresa.</p>
</div>
      </div>
    </div>
  </div>
</section>
        <!-- Parte de Carrosel dos Integrantes-->
        @include('componentes.integrantes_site')

        <!-- Parte de Projetos -->
        <section id="projetos" class="carousel-container" style="padding: 70px 0px;">
            <h2>Projetos</h2>
            <div class="carousel" id="carousel">
                    <div class="carousel-item">
                    <p>Aplicativo para indicação das UBS e Farmácias Populares mais próxima de você.</p>
                                        <img class="logoC" src="{{ url('img/BUSCAMED.png') }}" alt="">

                    <img class="prop" src="{{ url('img/novoFundo.png') }}" alt="ProjetoBuscamed">
                </div>
            </div>
        </section>


        <section id="parceiros">
            <div class="container4">
                <h2>Parceiros</h2>
                <div class="partners-grid">
                    <img src="{{ url('img/Aether2.png') }}" alt="Parceiro 1">
                    <img src="{{ url('img/supernova2.png') }}" alt="Parceiro 2">
                    <img src="{{ url('img/HiveTec.jpeg') }}" alt="Parceiro 3">
                </div>
            </div>
        </section>


         <!-- Parte dos Contatos -->
        @include('componentes.contatoSite')

    </main>

    <footer>
<!-- Parte final do site -->
 @include('componentes.footerSite')
    </footer>
    <script src="{{ url('js/nScript.js') }}"></script>
    <script src="{{ url('js/loading.js') }}"></script>
    <script src="{{ url('js/section.js') }}"></script>
 <script>
    $(document).ready(function() {
        // Mostra o modal com animação quando existir
        function showModal(modalId) {
            const modal = $(modalId);
            if (modal.length) {
                modal.fadeIn(200, function() {
                    $(this).addClass('active');
                });
            }
        }

        // Esconde o modal com animação
        function hideModal(modalId) {
            const modal = $(modalId);
            modal.removeClass('active');
            setTimeout(() => {
                modal.fadeOut(200);
            }, 300);
        }

        // Mostrar modais quando a página carrega
        showModal('#successModal');
        showModal('#errorModal');

        // Fechar modal ao clicar no botão de fechar
        $('.modal-close').on('click', function() {
            hideModal($(this).closest('.modal'));
        });

        // Fechar modal ao clicar fora do conteúdo
        $(document).on('click', function(event) {
            if ($(event.target).hasClass('modal')) {
                hideModal($(event.target));
            }
        });

        // Fechar modal ao clicar nos botões de ação
        $('#successButton, #errorButton').on('click', function() {
            hideModal($(this).closest('.modal'));
        });

        // Fechar modal ao pressionar ESC
        $(document).on('keyup', function(e) {
            if (e.key === "Escape") {
                hideModal($('.modal.active'));
            }
        });

        // Impede o clique dentro do modal de fechar o modal
        $('.modal-content').on('click', function(event) {
            event.stopPropagation();
        });
    });
</script>

</body>
</html>