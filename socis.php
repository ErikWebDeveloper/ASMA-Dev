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
     <!-- Lib Scaner -->   
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <!-- Beta Version-->
    <?php require_once './components/beta.php'; ?>
    
    <!-- NavBar -->
    <?php require_once './components/navbar.php'; ?>

    <div>
        <div id="scanner-container">
            <video id="scanner-video" playsinline style="display: none;"></video>
            <canvas id="scanner-canvas" style="display: none;"></canvas>
        </div>
        <div id="resultado-escaneo"></div>
        <button id="start-scan-button">Empezar a escanear</button>
    </div>

    <!-- Footer -->
    <?php require_once './components/footer.php' ?>

    <script>
        // Inicializar el escáner
        let scanner = null;

        // Función para comenzar el escaneo
        function startScan() {
          scanner = new Instascan.Scanner({ video: document.getElementById('scanner-video') });

          // Escuchar el evento de escaneo
          scanner.addListener('scan', function(content) {
            // Mostrar el resultado del escaneo
            document.getElementById('resultado-escaneo').innerText = content;
          });

          // Obtener las cámaras disponibles
          Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
              // Iniciar el escaneo con la primera cámara disponible
              scanner.start(cameras[0]);
            } else {
              console.error('No se detectó ninguna cámara.');
            }
          }).catch(function(e) {
            console.error(e);
          });
        }

        // Obtener el botón "Empezar a escanear" y agregar un evento de clic
        document.getElementById('start-scan-button').addEventListener('click', startScan);
    </script>
<body>
</html>