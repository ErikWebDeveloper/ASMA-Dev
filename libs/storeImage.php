<?php

class SubscripcioImageModel{
    private $gruposDirectorio = "/var/www/html/AppData/img/grups";
    private $usuariosDirectorio = "/var/www/html/AppData/img/usuaris";

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

    function sanitizarCadena($cadena) {
        // Convertir la cadena a minúsculas
        $cadena = strtolower($cadena);
        
        // Reemplazar espacios con guiones
        $cadena = str_replace(' ', '-', $cadena);
        
        // Eliminar puntos
        $cadena = str_replace('.', '', $cadena);
        
        return $cadena;
    }

    public function handler($dataJSON){
        // Tarifa de grupos
        if($dataJSON['grupo'] != null){
            $this->storeGrup($dataJSON);
        }else{
            return ['error' => true, 'mensaje' => "No es grupo."];
        }
    }

    private function storeGrup($dataJSON){
        try{
            // *** Recolectar datos para la funcion $this->storeImage() ***
    
            // Tipo de imagen
            $mimeType = $dataJSON['grupo']['imagen']['tipo'];
            $extension = '.' . substr($mimeType, strpos($mimeType, '/') + 1);
    
            // Objecto de la imagen Grupo
            $imagenGrupo = [
                "dir"       => $this->gruposDirectorio,
                "nombre"    => $this->sanitizarCadena($dataJSON['grupo']['nombre']) . $extension,
                "contenido" => $dataJSON['grupo']['imagen']['contenido']
            ];

            $this->storeImage($imagenGrupo);

        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => "Es grupo, no se ha posido guardar."];
        }

    }

    private function storeUser(){}
}