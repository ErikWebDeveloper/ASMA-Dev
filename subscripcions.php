<?php
// Generar y almacenar el token CSRF en la sesión del usuario
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASMA</title>
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
    <link rel="stylesheet" href="/assets/css/formulari.css">
</head>

<body>
    <!-- Beta Version-->
    <?php require_once './components/beta.php'; ?>
    
    <!-- NavBar -->
    <?php require_once './components/navbar.php'; ?>

    <!-- Descripción página -->
    <section id="info-hero">
        <div class="contenedor-info fade-in-section">
            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-input-cursor-text" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 2a.5.5 0 0 1 .5-.5c.862 0 1.573.287 2.06.566.174.099.321.198.44.286.119-.088.266-.187.44-.286A4.17 4.17 0 0 1 10.5 1.5a.5.5 0 0 1 0 1c-.638 0-1.177.213-1.564.434a3.5 3.5 0 0 0-.436.294V7.5H9a.5.5 0 0 1 0 1h-.5v4.272c.1.08.248.187.436.294.387.221.926.434 1.564.434a.5.5 0 0 1 0 1 4.17 4.17 0 0 1-2.06-.566A5 5 0 0 1 8 13.65a5 5 0 0 1-.44.285 4.17 4.17 0 0 1-2.06.566.5.5 0 0 1 0-1c.638 0 1.177-.213 1.564-.434.188-.107.335-.214.436-.294V8.5H7a.5.5 0 0 1 0-1h.5V3.228a3.5 3.5 0 0 0-.436-.294A3.17 3.17 0 0 0 5.5 2.5.5.5 0 0 1 5 2"/>
                <path d="M10 5h4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-4v1h4a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-4zM6 5V4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v-1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1z"/>
            </svg>
            <h1 class="mt-5">Formulari de Registre</h1>
            <p>
                Benvinguts al Formulari de Registre de Membres de l'Associació de Músics d'Andorra. 
            </p>
            <div class="text-center">
                <a class="btn btn-primary" href="#formulari-inscripcio" role="button">Començar</a>

            </div>
        </div>
    </section>

    <!-- Formulario -->
    <div class="contenedor-formulari">
        <form id="formulari-inscripcio" action="" class="page-box rounded" enctype="multipart/form-data">
            <!-- Acordeón-->
            <div class="accordion rounded" id="accordionForm">
    
                <!-- QUOTA -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <strong>QUOTA</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionForm">
                        <div class="accordion-body">
                            
                            <div class="form-group">
                                <p>Selecciona <strong>la quota</strong> la qual t'agradaria inscirure't:</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_share" id="standard" value="Standard" required>
                                    <label class="form-check-label" for="standard">Standard</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_share" id="estudiant" value="Estudiant" required>
                                    <label class="form-check-label" for="estudiant">Estudiant</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_share" id="pro" value="Profesional" required>
                                    <label class="form-check-label" for="pro">Professionals</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_share" id="grup" value="Grup" required>
                                    <label class="form-check-label" for="grup">Grups de Música</label>
                                </div>
                                <hr>
                                <div class="info-card">
                                    <span>Consulta les quotes fent clic <a data-bs-toggle="offcanvas" href="#tarifes" role="button" aria-controls="offcanvasExample">aquí</a>.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- INFORMACIÓ DE LA QUOTA -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                            aria-expanded="false" aria-controls="collapseOne">
                            <strong>INFORMACIÓ DE LA QUOTA</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                        <div class="accordion-body">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="sub_email" placeholder="Correu electrònic" maxlength="100" name="sub_email">
                                <label for="sub_email">Correu electrònic</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sub_phone" placeholder="Telèfon de contacte" maxlength="20" name="sub_phone">
                                <label for="sub_phone">Telèfon de contacte</label>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- DADES PERSONALS -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseQuota" aria-expanded="false" aria-controls="collapseQuota">
                            <strong>DADES PERSONALS</strong>
                        </button>
                    </h2>
                    <div id="collapseQuota" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                        <div class="accordion-body" id="userPersonalData">
                            <!-- Un usuario-->
                            <div id="single-user" style="display: none;">
                                <div class="accordion-body p-0">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="user_name" placeholder="Nom i cognoms" name="user_name">
                                        <label for="user_name">Nom i cognoms</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="user_instrument" placeholder="Instrument principal " name="user_instrument" list="opcionesInstrumentos">
                                        <label for="user_instrument">Instrument principal</label>
                                        <!-- Datalist con opciones predefinidas -->
                                        <datalist id="opcionesInstrumentos">
                                            <option value="Guitarra elèctrica">Guitarra elèctrica</option>
                                            <option value="Piano">Piano</option>
                                            <option value="Baix elèctric">Baix elèctric</option>
                                            <option value="Violí">Violí</option>
                                            <option value="Trompeta">Trompeta</option>
                                            <option value="Flauta">Flauta</option>
                                            <option value="Clarinet">Clarinet</option>
                                            <option value="Saxòfon">Saxòfon</option>
                                            <option value="Bateria">Bateria</option>
                                            <option value="Violoncel">Violoncel</option>
                                            <option value="Viola">Viola</option>
                                            <option value="Contrabaix">Contrabaix</option>
                                            <option value="Teclat">Teclat</option>
                                            <option value="Orgue">Orgue</option>
                                            <option value="Trombó">Trombó</option>
                                            <option value="Trompa">Trompa</option>
                                            <option value="Banjo">Banjo</option>
                                            <option value="Xilòfon">Xilòfon</option>
                                            <option value="Marimba">Marimba</option>
                                            <option value="Acordeó">Acordeó</option>
                                            <option value="Címbals">Címbals</option>
                                            <option value="Oboè">Oboè</option>
                                            <option value="Fiscorn">Fiscorn</option>
                                            <option value="Sitar">Sitar</option>
                                            <option value="Saxofon baix">Saxofon baix</option>
                                            <option value="Timbals">Timbals</option>
                                            <option value="Gaita">Gaita</option>
                                            <option value="Fagot">Fagot</option>
                                            <option value="Tamborí">Tamborí</option>
                                            <option value="Mandolina">Mandolina</option>
                                            <option value="Balalaika">Balalaika</option>
                                            <option value="Ukulele">Ukulele</option>
                                            <option value="Bongos">Bongos</option>
                                            <option value="Harmònica">Harmònica</option>
                                            <option value="Xerrac">Xerrac</option>
                                            <option value="Theremin">Theremin</option>
                                            <option value="Corneta">Corneta</option>
                                            <option value="Flabiol">Flabiol</option>
                                            <option value="Mridanga">Mridanga</option>
                                            <option value="Santoor">Santoor</option>
                                            <option value="Dulzaina">Dulzaina</option>
                                            <option value="Esraj">Esraj</option>
                                            <option value="Tar">Tar</option>
                                            <option value="Anklung">Anklung</option>
                                            <option value="Harmonium">Harmonium</option>
                                            <option value="Concertina">Concertina</option>
                                            <option value="Xilòfon baix">Xilòfon baix</option>
                                            <option value="Tabla">Tabla</option>
                                            <option value="Hang">Hang</option>
                                            <option value="Daf">Daf</option>
                                            <option value="Sintetitzador">Sintetitzador</option>
                                            <option value="Tuba">Tuba</option>
                                            <option value="Dolçaina">Dolçaina</option>
                                            <option value="Baglama">Baglama</option>
                                            <option value="Guitarra acústica">Guitarra acústica</option>
                                            <option value="Timple">Timple</option>
                                            <option value="Koto">Koto</option>
                                            <option value="Trompeta piccolo">Trompeta piccolo</option>
                                            <option value="Glockenspiel">Glockenspiel</option>
                                            <option value="Guitarra clàssica">Guitarra clàssica</option>
                                            <option value="Fiscorn tenor">Fiscorn tenor</option>
                                            <option value="Guzheng">Guzheng</option>
                                            <option value="Djembe">Djembe</option>
                                            <option value="Dulcémele">Dulcémele</option>
                                            <option value="Duduk">Duduk</option>
                                            <option value="Laud">Laud</option>
                                            <option value="Veena">Veena</option>
                                            <option value="Charango">Charango</option>
                                            <option value="Tible">Tible</option>
                                            <option value="Armònica de vidre">Armònica de vidre</option>
                                        </datalist>
                                    </div>
                                    <div class="form-group mb-3">
                                        <p>Fotografía de perfil</p>
                                        <div id="contenedorPreviewFoto" class="contenedorPreview m-auto mb-3">
                                            <img id="previewFoto" class="preview" alt="Vista previa de la foto" src="/assets/img/default-foto.png">
                                        </div>
                                        <input class="form-control" type="file" id="user_foto" accept="image/*" name="user_foto" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <p>Fotocòpia/Fotografía del passaport o residència</p>
                                        <div id="contenedorPreviewPasport" class="contenedorPreview m-auto mb-3">
                                            <img id="previewPasport" class="preview" alt="Vista previa del passaporte" src="/assets/img/default-pasport.png">
                                        </div>
                                        <input class="form-control" type="file" id="user_pasport" name="user_pasport" accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Multi Usuarios-->
                            <div id="multi-user" style="display: none;">
                                <div class="accordion-body p-0">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="grupo_name" placeholder="Nom del grup">
                                        <label for="user_name">Nom del grup</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <p>Logo/Fotografía del grup</p>
                                        <div id="contenedorPreviewLogo" class="contenedorPreview m-auto">
                                            <img id="previewLogo" class="preview" alt="Vista previa de la foto" src="/assets/img/default-band.png">
                                        </div>
                                        <input class="form-control mt-3" type="file" id="grupo_logo" accept="image/*" required>
                                    </div>
                                    <hr>
                                    <div class="info-card mb-3">
                                        <span><strong>Mínim 1</strong> integrant i un <strong>màxim 6</strong> integrants</span>
                                    </div>
                                    <div class="form-group d-flex mb-3">
                                        <span class="flex-fill">Integrants del grup</span>
                                        <button id="addBtn" type="button" class="btn btn-outline-secondary btn-sm flex-fill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        + Afegir
                                        </button>
                                    </div>
                                    <!-- Miembros Container-->
                                    <div id="walletContainer" class="form-group mb-3">
                                        
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color: rgb(198, 215, 245); color: rgb(48, 97, 124);">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Afegir integrant</h1>
                                                    <button id="closeModalUp" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="user">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="member_name" placeholder="Nom i cognoms" name="member_name">
                                                            <label for="member_name">Nom i cognoms</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="member_instrument" placeholder="Instrument principal" list="opcionesInstrumentos" name="member_instrument">
                                                            <label for="member_instrument">Instrument principal</label>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <p>Fotografía de perfil</p>
                                                            <div id="contenedorPreviewFotoMember" class="contenedorPreview m-auto">
                                                                <img id="previewFotoMember" class="preview" alt="Vista previa de la foto" src="/assets/img/default-foto.png">
                                                            </div>
                                                            <input class="form-control mt-3" type="file" id="member_foto" accept="image/*" required name="member_foto">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <p>Fotocòpia/Fotografía del Passaport</p>
                                                            <div id="contenedorPreviewPasportMember" class="contenedorPreview m-auto">
                                                                <img id="previewPasportMember" class="preview" alt="Vista previa del passaporte" src="/assets/img/default-pasport.png">
                                                            </div>
                                                            <input class="form-control mt-3" type="file" id="member_pasport" accept="image/*" required name="member_pasport">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModalMember">Tancar</button>
                                                    <button type="button" class="btn btn-primary" id="saveModalMemder" disabled>Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <!-- INFORMACIÓ ADICIONAL (opcional) -->
                <div class="accordion-item" id="informacio-personal">
                    <h2 class="accordion-header">
                        <button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong>INFORMACIÓ ADICIONAL</strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                        <div class="accordion-body">
                            <div class="info-card">
                                <span>Aquesta secció és opcional, i està dissenyada per recollir informació clau que ens
                                    ajudarà a progressar amb l'estudi del sector.</span>
                            </div>
                            <div class="pt-3" style="font-size: 0.8rem;">
                                <p class="text-end" id="btnSkip" style="cursor: pointer;">Saltar</p>
                            </div>
                            <hr>
                            <!-- BD 1 -->
                            <div class="form-group">
                                <p>Amb quin <strong>estil de música</strong> estàs més familiaritzat?</p>
                                <input type="text" class="form-control" name="bd-1" id="bd-1" list="generos">
                                <!-- Data List-->
                                <datalist id="generos">
                                    <option value="Pop">
                                    <option value="Rock">
                                    <option value="Jazz">
                                    <option value="Electrònica">
                                    <option value="Hip-hop">
                                    <option value="Rap">
                                    <option value="Reggae">
                                    <option value="Ska">
                                    <option value="Punk">
                                    <option value="Metal">
                                    <option value="Blues">
                                    <option value="Country">
                                    <option value="Folk">
                                    <option value="Clàssica">
                                    <option value="Rumba">
                                    <option value="Salsa">
                                    <option value="Bossa Nova">
                                    <option value="Flamenc">
                                    <option value="Cumbia">
                                    <option value="Tango">
                                    <option value="Soul">
                                    <option value="Funk">
                                    <option value="Disco">
                                    <option value="Techno">
                                    <option value="House">
                                    <option value="Trance">
                                    <option value="Dancehall">
                                    <option value="Merengue">
                                    <option value="Vallenato">
                                    <option value="Fusió">
                                    <option value="Indie">
                                    <option value="Alternatiu">
                                    <option value="Experimental">
                                    <option value="R&B">
                                    <option value="Gospel">
                                    <option value="New Age">
                                    <option value="Ambient">
                                    <option value="Electroacústica">
                                    <option value="World Music">
                                    <option value="Trap">
                                    <option value="Dubstep">
                                    <option value="K-Pop">
                                    <option value="J-Pop">
                                    <option value="Reggaeton">
                                    <option value="Bachata">
                                    <option value="Vocal">
                                </datalist>
                            </div>
                            <!-- BD 2 -->
                            <div class="form-group">
                                <p>Has rebut <strong>beques o subvencions</strong> per financiar la teva professió musical?
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-2" id="bd-2-1" value="Sí.">
                                    <label class="form-check-label" for="bd-2-1">
                                        Sí.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-2"
                                        id="bd-2-2" value="No.">
                                    <label class="form-check-label" for="bd-2-2">
                                        No.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-2"
                                        id="bd-2-3" value="No les he necessitat.">
                                    <label class="form-check-label" for="bd-2-3">
                                        No les he necessitat.
                                    </label>
                                </div>
                            </div>
                            <!-- BD 3-->
                            <div class="form-group">
                                <p>Et dediques o t'has dedicat <strong>professionalment a la música</strong>?</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-3"
                                        id="bd-3-1" value="Sí, m'hi dedico.">
                                    <label class="form-check-label" for="bd-3-1">
                                        Sí, m'hi dedico.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-3"
                                        id="bd-3-2" value="No, pero m'hi he dedicat.">
                                    <label class="form-check-label" for="bd-3-2">
                                        No, pero m'hi he dedicat.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-3"
                                        id="bd-3-3" value="No.">
                                    <label class="form-check-label" for="bd-3-3">
                                        No.
                                    </label>
                                </div>
                            </div>
                            <!-- BD 4 -->
                            <div class="form-group">
                                <p>Et resulta complicat trobar <strong>oportunitats laborals</strong>?</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-4"
                                        id="bd-4-1" value="Sí. Mai he tingut cap problema trobant feina com a músic.">
                                    <label class="form-check-label" for="bd-4-1">
                                        Sí. Mai he tingut cap problema trobant feina com a músic.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bd-4"
                                        id="bd-4-2" value="No. M'he de dedicar a un altre cosa. No puc treballar del que m'agrada.">
                                    <label class="form-check-label" for="bd-4-2">
                                        No. M'he de dedicar a un altre cosa. No puc treballar del que m'agrada.
                                    </label>
                                </div>
                            </div>
                            <!-- BD 5-->
                            <div class="form-group">
                                <p>Quines <strong>estratègies</strong> utilitzes per a promocionar-te?</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Xarxes socials" id="bd-5-1" name="bd-5">
                                    <label class="form-check-label" for="bd-5-1">
                                        Xarxes socials
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Vídeos i grabacions en diverses plataformes" id="bd-5-2" name="bd-5">
                                    <label class="form-check-label" for="bd-5-2">
                                        Vídeos i grabacions en diverses plataformes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Concerts i actuacions en viu" id="bd-5-3" name="bd-5">
                                    <label class="form-check-label" for="bd-5-3">
                                        Concerts i actuacions en viu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Col·laboracions amb altres músics" id="bd-5-4" name="bd-5">
                                    <label class="form-check-label" for="bd-5-4">
                                        Col·laboracions amb altres músics
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Publicitat pagada" id="bd-5-5" name="bd-5">
                                    <label class="form-check-label" for="bd-5-5">
                                        Publicitat pagada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Premsa i mitjans de comunicació" id="bd-5-6" name="bd-5">
                                    <label class="form-check-label" for="bd-5-6">
                                        Premsa i mitjans de comunicació
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Butlletins i mailing" id="bd-5-7" name="bd-5">
                                    <label class="form-check-label" for="bd-5-7">
                                        Butlletins i mailing
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Pàgina web i/o blog" id="bd-5-8" name="bd-5">
                                    <label class="form-check-label" for="bd-5-8">
                                        Pàgina web i/o blog
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Altre..." id="bd-5-9" name="bd-5">
                                    <label class="form-check-label" for="bd-5-9">
                                        Altre...
                                    </label>
                                </div>
                            </div>
                            <!-- BD 6-->
                            <div class="form-group">
                                <p>Tens algún <strong>projecte</strong> en aquest moment? <br>Podríes descriure'l breument?
                                </p>
                                <textarea class="form-control" id="bd-6" style="height: 100px" name="bd-6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- FORMA DE PAGAMENT -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapseQuota" id="skipAction">
                            <strong>FORMA DE PAGAMENT</strong>
                        </button>
                    </h2>
                    <div id="collapsePayment" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                        <div class="accordion-body">
                            <div class="info-card">
                                <span>Realitzar una transferència bancària al <strong>IBAN:
                                        AD7000010000223359700100</strong> o bé un <strong>Bizum al (+376) 355
                                        526</strong>.</span>
                            </div>
                            <hr>
                            <div class="form-group">
                                <p>Forma de pagament</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_payment" id="transfer"
                                        value="Transferència bancària">
                                    <label class="form-check-label" for="transfer">
                                        Transferència bancària
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_payment" id="bizum"
                                        value="Bizum">
                                    <label class="form-check-label" for="bizum">
                                        Bizum
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- TERMES I CONDICIONS -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <strong>TERMES I CONDICIONS</strong>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                        <div class="accordion-body">
    
                            <div class="form-group">
                                <p>Marca les següents opcions</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="info" name="info" required>
                                    <label class="form-check-label" for="info" required>
                                        Declaro que la informació proporcionada és precisa i completa.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="policy" name="policy" required>
                                    <label class="form-check-label" for="policy" required>
                                        Accepto complir les normes de l'associació.
                                    </label>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <p>Butlletí anual informatiu de les novetats i els avanços de l'associació.</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="user_bulletin" name="boletin">
                                    <label class="form-check-label" for="user_bulletin">
                                        Declino rebre el butlletí anual de l'ASMA al correu proporcionat.
                                    </label>
                                </div>
                            </div>
    
                            <div class="text-center">
                                <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <div class="spinner-border text-primary m-auto" role="status" style="display: none" id="submitLoader">
                                    <span class="visually-hidden">Processant les seves dades...</span>
                                </div>

                                <button type="submit" class="btn btn-primary m-auto" disabled>Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Success Message-->
        <div id="responseSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="color: rgb(54, 102, 54); width: 100%; max-width: 350px;">
            <div class="toast-header" style="background-color:rgb(195, 255, 195)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                </svg>
                <strong class="me-auto">&nbsp; Subscripció finalitzada</strong>
            </div>
            <div class="toast-body">
                <p>La seva subscripció s'ha completat amb èxit, i en breu rebrà un correu electrònic de confirmació a la seva adreça <strong id="responseSuccesMessage"></strong>.</p>
                <p>Si té cap pregunta o inquietud, no dubti a posar-se en <a href="mailto:comunica@musicsandorra.com">contacte amb el nostre servei d'assistència.</a> </p>
                <p>Tingui en compte que l'aplicació es troba en versió beta, la qual podria experimentar fallos puntuals. Agraïm la seva paciència i comprensió mentre treballem per millorar l'experiència.</p>
                <p>Gràcies per la seva confiança i suport continuat.</p>
                <div class="d-flex justify-content-center">
                    <img class="img-fluid m-auto" width="80" src="/favicon.ico" alt="ASMA logo">
                </div>
            </div>
        </div>
        <!-- Error Message-->
        <div aria-live="polite" aria-atomic="true" class="position-absolute" style="z-index = 100;">
            <div id="responseError" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="color: rgb(97, 28, 45); width: 100%; max-width: 350px;">
                <div class="toast-header" style="background-color:rgb(255, 195, 220)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                    <strong class="me-auto">&nbsp; Ha ocorregut algun error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <p>Ho sentim, però s'ha produït un error en processar la seva subscripció.</p>
                    <p>El missatge d'error diu:</p>
                    <p><strong id="responseErrorMessage"></strong></p>
                    <p>En cas que el problema persisteixi, poseu-vos en <a href="mailto:comunica@musicsandorra.com">contacte amb el nostre servei d'assistència.</a> per rebre ajuda immediata.</p>
                    <p>Gràcies per la seva comprensió.</p>
                </div>
            </div>
        </div>
    </div>


    <?php require_once './components/footer.php' ?>


    <script>
        // Pasar ID de elementos: input, containerPreview, imagePreview
        function mostrarVistaPrevia(input, containerPreview, imagePreview) {
            const inputFoto = document.getElementById(input);
            const contenedorPreview = document.getElementById(containerPreview);
            const vistaPrevia = document.getElementById(imagePreview);

            if (inputFoto.files && inputFoto.files[0]) {
                const lector = new FileReader();

                lector.onload = function (e) {
                    vistaPrevia.src = e.target.result;
                };

                lector.readAsDataURL(inputFoto.files[0]);
                contenedorPreview.style.display = 'block'; // Mostrar el contenedor de la vista previa
            } else {
                contenedorPreview.style.display = 'none'; // Ocultar el contenedor si no hay imagen seleccionada
            }
        }

        let userFoto = {
            inputId : 'user_foto',
            containerPreview : 'contenedorPreviewFoto',
            preview : 'previewFoto'
        }
        document.getElementById('user_foto').addEventListener('change', () => {mostrarVistaPrevia(userFoto.inputId, userFoto.containerPreview, userFoto.preview)});

        let userPasport = {
                inputId: 'user_pasport',
                containerPreview: 'contenedorPreviewPasport',
                preview: 'previewPasport'
            }
        document.getElementById('user_pasport').addEventListener('change', () => { mostrarVistaPrevia(userPasport.inputId, userPasport.containerPreview, userPasport.preview) });

        let grupoLogo = {
                inputId: 'grupo_logo',
                containerPreview: 'contenedorPreviewLogo',
                preview: 'previewLogo'
            }
            document.getElementById('grupo_logo').addEventListener('change', () => { mostrarVistaPrevia(grupoLogo.inputId, grupoLogo.containerPreview, grupoLogo.preview) });

        let memberFoto = {
                inputId: 'member_foto',
                containerPreview: 'contenedorPreviewFotoMember',
                preview: 'previewFotoMember'
            }
            document.getElementById('member_foto').addEventListener('change', () => { mostrarVistaPrevia(memberFoto.inputId, memberFoto.containerPreview, memberFoto.preview) });

        let memberPasport = {
                inputId: 'member_pasport',
                containerPreview: 'contenedorPreviewPasportMember',
                preview: 'previewPasportMember'
            }
            document.getElementById('member_pasport').addEventListener('change', () => { mostrarVistaPrevia(memberPasport.inputId, memberPasport.containerPreview, memberPasport.preview) });

    </script>

    <script src="/assets/js/subscripcions.min.js"></script>
</body>

</html>