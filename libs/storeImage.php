<?php

class SubscripcioImageModel{
    private $gruposDirectorio = "/var/www/html/AppData/img/grups";
    private $usuariosDirectorio = "/var/www/html/AppData/img/usuaris";

    public function __construct() {
    }

    private function storeImage($dataJSON, $directorio) {
        try{
            // Ruta donde se guardarán las imágenes en el servidor
            $directorioImagenes = $directorio;
                
            // Obtener la información de la imagen del objeto JSON
            $nombreImagen = $dataJSON['usuarios']['user_foto']['nombre'];
            $tipoImagen = $dataJSON['usuarios']['user_foto']['tipo'];
            $contenidoImagen = $dataJSON['usuarios']['user_foto']['contenido'];
                
            // Decodificar el contenido de la imagen
            $contenidoDecodificado = base64_decode(substr($contenidoImagen, strpos($contenidoImagen, ',') + 1));
                
            // Guardar la imagen en el servidor
            $rutaImagen = $directorioImagenes . $nombreImagen;
            $resultado = file_put_contents($rutaImagen, $contenidoDecodificado);
                
            // Verificar si la imagen se guardó correctamente
            if ($resultado !== false) {
                return ['error' => false, 'mensaje' => "La imagen se ha almacenado correctamente."];
            } else {
                return ['error' => true, 'mensaje' => "Ha ocurrido un error al almacenar la imagen."];
            }
        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => 'Ha ocurrido un error al almacenar la imagen.'];
        }
    }

    public function handler($dataJSON){
        // Tarifa de grupos
        if($dataJSON['grupo'] != null){
            return ['error' => true, 'mensaje' => "Es grupo."];
        }else{
            return ['error' => true, 'mensaje' => "No es grupo."];
        }
    }
}