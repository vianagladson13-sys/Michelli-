<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contagem360</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php
    // Captura a página atual informada na URL
    $page = $_GET["page"] ?? "landing";

    // Páginas que possuem HTML próprio
    $paginasPublicas = [
        "landing" => __DIR__ . "/views/landing.php",
        "login" => __DIR__ . "/views/login.php",
    ];

    // Verifica se é uma página independente
    if (array_key_exists($page, $paginasPublicas)) {
        require $paginasPublicas[$page];
        exit;
    }

    ?>


    <!-- =========================================================
     NAVBAR CONTAGEM360
========================================================= -->

    <nav class="navbar navbar-expand-lg navbar-contagem360">

        <div class="container">

            <!-- LOGO -->

            <a
                class="navbar-brand logo-contagem360"
                href="index.php">

                <span class="logo-contagem">
                    contagem
                </span>

                <span class="logo-360">
                    360
                </span>

            </a>


            <!-- BOTÃO MENU MOBILE -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuContagem360"
                aria-controls="menuContagem360"
                aria-expanded="false"
                aria-label="Abrir menu">

                <i class="bi bi-list"></i>

            </button>


            <!-- MENU -->

            <div
                class="collapse navbar-collapse"
                id="menuContagem360">

                <ul class="navbar-nav ms-auto align-items-lg-center">


                    <!-- INÍCIO -->

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="index.php?page=landing">

                            <i class="bi bi-house me-1"></i>

                            Início

                        </a>

                    </li>


                    <!-- EVENTOS -->

                    <li class="nav-item">

                        <a
                            class="nav-link active"
                            href="index.php?page=eventos">

                            <i class="bi bi-calendar-event me-1"></i>

                            Eventos

                        </a>

                    </li>


                    <!-- SUPORTE -->

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="index.php?page=suporte">

                            <i class="bi bi-grid me-1"></i>

                            suporte

                        </a>

                    </li>


                    <!-- SAIR -->

                    <li class="nav-item">

                        <a
                            class="nav-link nav-sair"
                            href="index.php">

                            <i class="bi bi-box-arrow-right me-1"></i>

                            Sair

                        </a>

                    </li>




                </ul>

            </div>

        </div>

    </nav>

    <!-- Conteúdo carregado pelas rotas -->
    <main class="flex-grow-1">

        <?php
        // Carrega o arquivo que controla as páginas do sistema
        require __DIR__ . "/routes.php";
        ?>

    </main>

    <!-- =========================================================
     FOOTER CONTAGEM360
========================================================= -->

<footer class="footer-contagem360">


<div class="container">


    <div class="row align-items-center">


        <!-- =================================================
             LOGO E DESCRIÇÃO
        ================================================== -->

        <div class="col-lg-4 mb-4 mb-lg-0">


            <a
                href="index.php"
                class="footer-logo">

                <span class="footer-contagem">
                    contagem
                </span>

                <span class="footer-360">
                    360
                </span>

            </a>


            <p class="footer-description">

                Tudo o que você precisa,
                em um só lugar.

            </p>


        </div>


        <!-- =================================================
             LINKS
        ================================================== -->

        <div class="col-lg-5 mb-4 mb-lg-0">


            <div class="footer-links">


                <a href="index.php?page=landing">

                    <i class="bi bi-house"></i>

                    Início

                </a>


                <a href="index.php?page=ex-evento">

                    <i class="bi bi-calendar-event"></i>

                    Eventos

                </a>


                <a href="index.php?page=ex-evento">

                    <i class="bi bi-newspaper"></i>

                    Notícias

                </a>


                <a href="index.php?page=suporte">

                    <i class="bi bi-grid"></i>

                    Suporte

                </a>


            </div>


        </div>


        <!-- =================================================
             REDES SOCIAIS
        ================================================== -->

        <div class="col-lg-3">


            <div class="footer-social">


                <a
                    href="#"
                    aria-label="Instagram">

                    <i class="bi bi-instagram"></i>

                </a>


                <a
                    href="#"
                    aria-label="Facebook">

                    <i class="bi bi-facebook"></i>

                </a>


                <a
                    href="#"
                    aria-label="WhatsApp">

                    <i class="bi bi-whatsapp"></i>

                </a>


                <a
                    href="index.php?page=contato"
                    aria-label="Contato">

                    <i class="bi bi-envelope"></i>

                </a>


            </div>


        </div>


    </div>


    <!-- =================================================
         LINHA
    ================================================== -->

    <hr class="footer-line">


    <!-- =================================================
         RODAPÉ INFERIOR
    ================================================== -->

    <div class="footer-bottom">


        <span>

            © 2026 Contagem360.
            Todos os direitos reservados.

        </span>


        <div>


            <a href="index.php?page=politica-privacidade">

                Política de Privacidade

            </a>


            <a href="index.php?page=termos-uso">

                Termos de Uso

            </a>


        </div>


    </div>


</div>


</footer>



    <!-- JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Constantes do sistema -->
    <script src="config/constants.js"></script>

    <!-- Funções auxiliares -->
    <script src="js/helpers.js"></script>

</body>

</html>