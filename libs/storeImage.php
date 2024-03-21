<?php

class SubscripcioImageModel{
    private $gruposDirectorio = "/var/www/html/AppData/img/grups/";
    private $usuariosDirectorio = "/var/www/html/AppData/img/usuaris/";

    public function __construct() {
    }

    private function storeImage($imageData) {
        try{
            // Ruta donde se guardarán las imágenes en el servidor
            $directorioImagenes = $imageData['dir'];
                
            // Obtener la información de la imagen del objeto JSON
            $nombreImagen = $imageData['nombre'];
            $contenidoImagen = $imageData['contenido'];
                
            // Decodificar el contenido de la imagen
            $contenidoDecodificado = base64_decode(substr($contenidoImagen, strpos($contenidoImagen, ',') + 1));
                
            // Guardar la imagen en el servidor
            $rutaImagen = $directorioImagenes . $nombreImagen;
            //$compresImage = $this->comprimirImagen($contenidoImagen);
            $resultado = file_put_contents($rutaImagen, $contenidoDecodificado);
                
            // Verificar si la imagen se guardó correctamente
            if ($resultado !== false) {
                return ['error' => true, 'mensaje' => "La imagen se ha almacenado correctamente."];
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
            return $this->storeGrup($dataJSON);
        }else{
            return ['error' => true, 'mensaje' => "No es grupo."];
        }
    }

    private function storeGrup($dataJSON){
        // Guardar Imagen de Grupo
        $this->response = $this->imgGrup($dataJSON);

        // Guardar Imagenes de los miembros del grupo
        if(!$this->response['error']){
            return $this->response;
        }else{
            return $this->response;
        }
    }

    private function imgGrup($dataJSON){
        try{
            // *** Recolectar datos para la funcion $this->storeImage() ***
    
            // Tipo de imagen
            $mimeType = $dataJSON['grupo']['imagen']['tipo'];
            $extension = '.' . substr($mimeType, strpos($mimeType, '/') + 1);
    
            // Objecto de la imagen Grupo
            $imagenGrupo = [
                "dir"       => $this->gruposDirectorio,
                "nombre"    => md5($dataJSON['grupo']['nombre']) . $extension,
                "contenido" => $dataJSON['grupo']['imagen']['contenido']
            ];

            return $this->storeImage($imagenGrupo);

        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => "Es grupo, no se ha posido guardar."];
        }
    }

    private function imgUser($dataJSON){
        try{
            // *** Recolectar datos para la funcion $this->storeImage() ***
    
            // Tipo de imagen
            $mimeType = $dataJSON['grupo']['imagen']['tipo'];
            $extension = '.' . substr($mimeType, strpos($mimeType, '/') + 1);

            // Nombre de imagen
            $imagenNombre = $this->sanitizarCadena($dataJSON['grupo']['nombre']);
    
            // Objecto de la imagen Grupo
            $imagenGrupo = [
                "dir"       => $this->gruposDirectorio,
                "nombre"    => md5($imagenNombre) . $extension,
                "contenido" => $dataJSON['grupo']['imagen']['contenido']
            ];

            return $this->storeImage($imagenGrupo);

        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => "Es grupo, no se ha posido guardar."];
        }
    }

    private function storeUser($dataJSON){

    }

    function comprimirImagen($contenidoImagenBase64, $calidad = 75) {
        // Decodificar la imagen desde base64
        $contenidoDecodificado = base64_decode(substr($contenidoImagenBase64, strpos($contenidoImagenBase64, ',') + 1));
        
        // Crear una imagen desde el contenido decodificado
        $imagen = imagecreatefromstring($contenidoDecodificado);
        
        // Crear un buffer de salida para almacenar la imagen comprimida
        ob_start();
        
        // Guardar la imagen comprimida en el buffer de salida
        imagejpeg($imagen, null, $calidad);
        
        // Obtener el contenido de la imagen comprimida desde el buffer de salida
        $contenidoImagenComprimida = ob_get_contents();
        
        // Limpiar el buffer de salida
        ob_end_clean();
        
        // Liberar memoria
        imagedestroy($imagen);
        
        // Devolver el contenido de la imagen comprimida
        return $contenidoImagenComprimida;
    }


}