<!DOCTYPE html>
<html lang="ca">

<head>
    <meta property="og:title" content="Associació de Músics d'Andorra">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.musicsandorra.com">
    <meta property="og:description"
        content="L'ASMA és una entitat pública creada amb la finalitat de representar al col·lectiu musical andorrà i millorar els seus drets i qualitat de vida.">
    <meta property="og:site_name" content="Associació de Músics d'Andorra">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASMA</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>


    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/home.css">

    <!--<style>
        :root {
            --dark-main: #292929;
        }

        html {
            scroll-behavior: smooth;
        }

        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Kalam:wght@300;400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        header {
            width: 100%;
            height: 100vh;
            background: center/cover no-repeat;
            background-color: rgb(43, 43, 43);
        }

        nav {
            background-color: #000000;
            opacity: 0.7;
            transition: opacity 0.5s;
        }

        nav:hover {
            opacity: 1;
            transition: opacity 0.5s;
        }

        .filter {
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.7);
        }

        #hero {
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            /* Inicialmente establece la opacidad en 0 */
            transition: opacity 1s ease-in-out;
            /* Agrega una transición para suavizar el cambio de opacidad */
        }

        blockquote {
            margin: 0;
            padding: 1rem;
        }

        .citas {
            font-style: italic;
            text-align: center;
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-size: clamp(0.8rem, 2vh, 20rem);
        }

        .citas p {
            color: #b8b8b8;
        }

        .arrow {
            position: absolute;
            bottom: 20px;
            /* Ajusta la distancia desde la parte inferior según tus preferencias */
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-top: 30px solid #b8b8b8;
            /* Ajusta el color de la flecha según tus preferencias */
            animation: floatArrow 1.5s infinite alternate;
            /* Ajusta la duración de la animación según tus preferencias */
        }

        @keyframes floatArrow {
            to {
                transform: translateX(-50%) translateY(5px);
            }
        }


        #welcome {
            background-color: #dfdfdf;
            background: url(/assets/img/texture3.svg) center/cover no-repeat;
        }

        .contenedor-about {
            width: 100%;
            min-height: 50vh;
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #whatsapp {
            background-color: #292929;
        }

        .contenedor-whatsapp {
            width: 100%;
            min-height: 50vh;
            padding: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #socis {
            background-color: #dfdfdf;
            background: url(/assets/img/texture7.svg);
        }

        .contenedor-socis {
            width: 100%;
            min-height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #patrocinadors {
            background-color: var(--dark-main);
            background: url(/assets/img/texture8.svg) center/cover no-repeat;
        }

        #social-media{
            background: rgb(255,255,255);
            background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgb(224, 224, 224) 100%); 
            
        }
        .contenedor-social-media{
            padding: 2rem 0;
            min-height: 50vh;
            text-align: center;
            width: 100%;
            margin: auto;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;

        }
        .contenedor-social-media p{
            color: #838383;
        }

        .center-container {
            width: 95%;
            max-width: 800px;
            padding: 1rem;
            margin: auto;
        }
        .welcome {
            background: url(/assets/img/texture3.svg);
        }
        .patrocinadorsCanva{
            background: url(/assets/img/texture10.svg);
        }
        .socis {
            background: url(/assets/img/texture7.svg);
        }
        .contenedor-patrocinadors{
            min-height: 50vh;
            color: #ffffff;
            text-align: center;
            width: 100%;
            max-width: 800px;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            gap: 1rem;
        }



        .half-container {
            width: 95%;
            max-width: 800px;
            min-height: 50vh;
            margin: auto;
        }

        .imagen-usuario {
            width: 100px;
            height: 100px;
            border: 2px solid #ffffff70;
            background-color: #ffffff;
            border-radius: 50%;
            overflow: hidden;
        }

        .imagen-usuario img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ajusta la imagen para cubrir completamente el contenedor redondo */
        }

        .menu-item, .footer-menu a{
            text-decoration: none !important;
            color: #888888;
            transition: letter-spacing .2s, color .2s;
        }
        .menu-item:hover{
            letter-spacing: .1rem;
            color: black;
            transition: letter-spacing .5s, color .5s;
        }
        .footer-menu{
            font-size: .8rem;
        }
        .fade-in-section {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .visible {
            opacity: 1;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(50%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide1 {
            opacity: 0;
            animation: slideIn 1.5s ease-out forwards 0.5s;
        }

        .animate-slide2 {
            opacity: 0;
            animation: slideIn 1.5s ease-out forwards 1.5s;
        }

        .animate-slide3 {
            opacity: 0;
            animation: slideIn 1.5s ease-out forwards 3s;
        }

        .animate-slide4 {
            opacity: 0;
            animation: slideIn 1.5s ease-out forwards 4s;
        }

        .animate-slide5 {
            opacity: 0;
            animation: slideIn 1.5s ease-out forwards 4.5s;
        }


        

    </style>-->
</head>

<body style="background-color: #000000;">
    <header id="hero">
        <div class="filter position-relative">

            <?php require_once "./components/navbar.php"; ?>

            <div data-bs-theme="dark" class="position-absolute top-50 start-50 translate-middle animate-slide1"
                style="width: 95%; max-width: 800px; background-color: rgba(0, 0, 0, 0.85);">
                <img class="img-fluid px-5 pt-2 animate-slide2" src="/assets/img/asma-logo.min.png" alt="Logo">
                <div class="container w-75 citas">
                    <blockquote id="citas-blockquote" class="animate-slide3">
                    </blockquote>
                </div>
            </div>
        </div>
        <a class="arrow animate-slide5" href="#welcome"></a>
    </header>

    <section id="welcome">
        <div class="contenedor-about fade-in-section">
            <div class="center-container text-center">
                <img class="img-fluid" src="/favicon.ico" alt="ASMA-logo" style="width: 100px;">
                <h2>ASMA</h2>
                <p>Treballem per una comunicació efectiva entre músics locals, el públic i la comunitat andorrana,
                    abordant la desigualtat
                    d'oportunitats i enriquint l'educació i els espais culturals per als joves.</p>
                <div>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#equip" role="button"
                        aria-controls="offcanvasExample">
                        El Nostre Equip
                    </a>
                    <a class="btn btn-outline-primary" data-bs-toggle="offcanvas" href="#objectius" role="button"
                        aria-controls="offcanvasExample">
                        Objectius de l'ASMA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="whatsapp">
        <div class="contenedor-whatsapp fade-in-section">
            <div class="row center-container p-0">
                <div class="col d-flex justify-content-center align-items-center pb-5"
                    style="width: 95%; min-width: 300px; ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#25d366" class="bi bi-whatsapp"
                        viewBox="0 0 16 16" style="filter:drop-shadow(1px 1px 50px #f8f8f8)">
                        <path
                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                    </svg>
                </div>
                <div class="col" style=" width: 95%; min-width: 300px;">
                    <h3 style="color: #198754;"><strong style="color: #b8b8b8;">Ets músic?</strong> Vols integrar-te en
                        el nostre grup de WhatsApp?</h3>
                    <p style="color: #f8f8f8;">
                        Integrat en la nostra comunitat i assabentat de tot el que es parla a l'ASMA al xat de
                        comunicació general de
                        l'Associació de Músics d'Andorra.
                    </p>
                    <div class="text-center">
                        <a role="button" class="btn btn-outline-success w-50"
                            href="https://chat.whatsapp.com/Dj4KIqZugQS3x3oMqmcGI8"
                            target="_blank"><strong>Invitació</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="socis">
        <div class="contenedor-socis fade-in-section">
            <div class="center-container text-center p-0" style="color: #303030;">
                <h1>Fes-te soci de l'<strong">ASMA</strong></h1>
                <img class="mb-3" src="/favicon.ico" alt="logo-ASMA" style="width: 80px;">
                <p style="text-align: center;">
                    Com a soci de l'ASMA, gaudiràs d'una varietat de beneficis dissenyats per suportar el teu
                    creixement en el
                    món de la música.
                </p>
                <div class="text-center">
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#saberneMes" role="button"
                        aria-controls="offcanvasExample">
                        Saber-ne més
                    </a>
                    <a class="btn btn-outline-primary" data-bs-toggle="offcanvas" href="#tarifes" role="button"
                        aria-controls="offcanvasExample">
                        Tarifes
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="patrocinadors">
        <div class="contenedor-patrocinadors fade-in-section">
            <div>
            </div>
                <h1 style="text-shadow: 1px 1px 50px rgba(255, 255, 255, 0.685); color: #ffc107;">Patrocinadors</h1>
                <p style="background-color: #30303057; padding: 1rem; color: #cacaca;">
                Estar subscrit a la nostra plataforma et permetrà accedir a ofertes exclusives i promocions especials proporcionades
                pels nostres col·laboradors.
            </p>
            <div class="text-center">
                <a class="btn btn-outline-warning" data-bs-toggle="offcanvas" href="#patrocinadorsCanva" role="button" aria-controls="offcanvasExample">Més detalls</a>
            </div>
        </div>
    </section>

    <section id="social-media">
        <div class="contenedor-social-media fade-in-section">

            <div class="d-flex justify-content-center align-items-center flex-column fade-in-section" style="width: 100%; max-width: 450px; max-height: 50vh; min-height: 31vh;">
                <div class="row center-container p-0" style="color: #f8f8f8;">
                    <div class="col d-flex justify-content-center align-items-center p-2 flex-column gap-3"
                        style="width: 95%; min-width: 300px; ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#0d6efd" class="bi bi-envelope-at-fill"
                            viewBox="0 0 16 16" style="filter:drop-shadow(1px 1px 50px #f8f8f8)">
                            <path
                                d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671" />
                            <path
                                d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791" />
                            </svg>
                    </div>
                    <div class="col" style=" width: 95%; min-width: 300px;">
                        <h3 style="text-align: center;"><strong style="color: #0d6efd">Correu electrònic<br></strong></h3>
                        <p>No dubtis a escriure'ns si vols posar-te en contacte amb nosaltres</p>
                        <div class="text-center">
                            <a href="mailto:comunica@musicsandorra.com" role="button"
                                class="btn btn-outline-primary w-50"><strong>Enviar un correu</strong></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column fade-in-section"
                style="width: 100%; max-width: 450px; max-height: 50vh; min-height: 31vh;">
                <div class="row center-container p-0" style="color: #f8f8f8;">
                    <div class="col d-flex justify-content-center align-items-center p-2 flex-column gap-3"
                        style="width: 95%; min-width: 300px; ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#25d366" class="bi bi-whatsapp" viewBox="0 0 16 16"
                            style="filter:drop-shadow(1px 1px 50px #f8f8f8)">
                            <path
                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg>
                    </div>
                    <div class="col" style=" width: 95%; min-width: 300px;">
                        <h3 style=" text-align: center;"><strong style="color: #25d366">WhatsApp<br></strong></h3>
                        <p>Demana una invitació per afegir-te al nostre xat de l'ASMA</p>
                        <div class="text-center">
                            <a href="mailto:comunica@musicsandorra.com" role="button" class="btn btn-outline-success w-50"><strong>Xat de WhatsApp</strong></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column fade-in-section"
                style="width: 100%; max-width: 450px; max-height: 50vh; min-height: 31vh;">
                <div class="row center-container p-0" style="color: #f8f8f8;">
                    <div class="col d-flex justify-content-center align-items-center p-2 flex-column gap-3"
                        style="width: 95%; min-width: 300px; ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#e1306c" class="bi bi-instagram"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                    </div>
                    <div class="col" style=" width: 95%; min-width: 300px;">
                        <h3 style="text-align: center;"><strong style="color: #e1306c">Instagram<br></strong></h3>
                        <p>Segueix-nos per fer la nostra comunitat més gran a les xarxes</p>
                        <div class="text-center">
                            <a href="https://www.instagram.com/asma_andorra/" target="_blank" role="button"
                                class="btn btn-outline-danger w-50"><strong>Seguir</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="footer">
        <div class="p-3 footer-menu m-0 text-center"
            style="color: rgb(199, 199, 199); background-color: var(--dark-main);">
            <p class="p-0 m-0">⚡ Web desenvolupada i dissenyada per:  <a style="color: rgb(185, 55, 94);" href="mailto:erikcodedeveloper@gmail.com">ErikWebDeveloper</a></p>
        </div>
    </section>


    <script src="/assets/js/home.js"></script>
</body>

</html>