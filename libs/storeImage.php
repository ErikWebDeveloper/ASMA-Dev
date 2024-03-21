<?php

function storeImage($dataJSON) {
    try{
        // Ruta donde se guardarán las imágenes en el servidor
        $directorioImagenes = getcwd() . '../AppData/img';
        
        // Obtener la información de la imagen del objeto JSON
        $nombreImagen = $dataJSON['usuarios']['user_foto']['nombre'];
        $tipoImagen = $dataJSON['usuarios']['user_foto']['tipo'];
        $contenidoImagen = $dataJSON['usuarios']['user_foto']['contenido'];
        
        // Decodificar el contenido de la imagen
        $contenidoDecodificado = base64_decode(substr($contenidoImagen, strpos($contenidoImagen, ',') + 1));
        
        // Guardar la imagen en el servidor
        $rutaImagen = $directorioImagenes . $nombreImagen;
        $resultado = file_put_contents($rutaImagen, $contenidoDecodificado);
        
        /*
        // Verificar si la imagen se guardó correctamente
        if ($resultado !== false) {
            return ['error' => false, 'mensaje' => "La imagen se ha almacenado correctamente."];
        } else {
            return ['error' => true, 'mensaje' => "Ha ocurrido un error al almacenar la imagen."];
        }*/
        return ['error' => true, 'mensaje' => "La imagen se ha almacenado correctamente."];

    } catch ( Exception $e){
        return ['error' => true, 'mensaje' => 'Ha ocurrido un error al almacenar la imagen.'];
    }
}
