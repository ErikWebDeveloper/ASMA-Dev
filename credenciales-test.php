<?php
// Generar y almacenar el token CSRF en la sesión del usuario
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch API Example</title>
</head>
<body>
    <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <script>
        // Definimos la función para hacer la petición Fetch
        function fetchData() {
            // Objeto JSON a enviar en la petición
            const data = { id: "66008f0627cbfe752d0a5422" , csrf_token : document.getElementById('csrf_token').value};

            // Opciones para la petición Fetch
            const options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            };

            // URL de la API
            const url = 'https://musicsandorra.com/api/soci.php';

            // Realizamos la petición Fetch
            fetch(url, options)
                .then(response => {
                    // Verificamos si la respuesta es exitosa (código 200)
                    if (response.ok) {
                        // Convertimos la respuesta a JSON
                        return response.json();
                    }
                    // Si la respuesta no es exitosa, lanzamos un error
                    throw new Error('Network response was not ok.');
                })
                .then(data => {
                    // Imprimimos la respuesta por consola
                    console.log('Respuesta:', data);
                })
                .catch(error => {
                    // Capturamos y manejamos cualquier error
                    console.error('Error:', error);
                });
        }

        // Llamamos a la función para hacer la petición Fetch cuando la página se cargue completamente
        window.onload = fetchData;
    </script>
</body>
</html>
