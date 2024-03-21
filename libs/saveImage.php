<?php

function storeImage($dataJSON) {
    // Ruta donde se guardarán las imágenes en el servidor
    $directorioImagenes = $_SERVER['DOCUMENT_ROOT'] . 'AppData/img';

    // Obtener la información de la imagen del objeto JSON
    $nombreImagen = $dataJSON[0]['usuarios']['user_foto']['nombre'];
    $tipoImagen = $dataJSON[0]['usuarios']['user_foto']['tipo'];
    $contenidoImagen = $dataJSON[0]['usuarios']['user_foto']['contenido'];

    // Decodificar el contenido de la imagen
    $contenidoDecodificado = base64_decode(substr($contenidoImagen, strpos($contenidoImagen, ',') + 1));

    // Guardar la imagen en el servidor
    $rutaImagen = $directorioImagenes . $nombreImagen;
    $resultado = file_put_contents($rutaImagen, $contenidoDecodificado);

    // Verificar si la imagen se guardó correctamente
    /*
    if ($resultado !== false) {
        echo 'La imagen se ha almacenado correctamente en: ' . $rutaImagen;
    } else {
        echo 'Ha ocurrido un error al almacenar la imagen.';
    }*/
}
