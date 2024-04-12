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
    <link rel="stylesheet" href="/assets/css/escaner-credencial.css">

    <style>
        .error, .success{
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }
        .error{
            background: #fb9aa1;
            color: #de2e5a;
        }
        .success{
            background: #bafdd4 ;
            color: #12873f ;
        }
        @keyframes fadeIn {
            from{opacity: 0;}
            to{opacity: 0.8;}
        }
    </style>
</head>

<body>
    <!-- Beta Version-->
    <?php require_once './components/beta.php'; ?>
    
    <!-- NavBar -->
    <?php require_once './components/navbar.php'; ?>

    <!-- Scaner Page -->
    <div class="main-page">
        <div class="container">
            <h1 class="text-center">
                Escàner de credencial
            </h1>
            <p class="text-center">
                Escaneja el codi QR de soci de l'ASMA per verificar la seva credencial.
            </p>
            <div class="section">
                <div id="my-qr-reader">
                </div>
            </div>
        </div>
    </div>

    <!-- Toats -->
    <div id="log-message" class="toast-container position-fixed bottom-0 end-0 p-3">

    </div>

    <!-- Footer -->
    <?php require_once './components/footer.php' ?>

    <script src="/assets/js/libs/qr-js.js" type="text/javascript"></script>
    <script src="/assets/js/escaner-credencial.js" type="text/javascript"></script>
</body>

</html>