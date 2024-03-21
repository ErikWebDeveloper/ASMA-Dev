<?php

class SubscripcioImageModel{
    private $gruposDirectorio = "/var/www/html/AppData/img/grups/";
    private $usuariosDirectorio = "/var/www/html/AppData/img/usuaris/";
    private $pasportDirectorio = "/var/www/html/AppData/img/pass/";

    public function __construct() {
        
    }
    public function handler($dataJSON){
        $this->token = $dataJSON['csrf_token'];
        // Tarifa de grupos
        if($dataJSON['grupo'] != null){
            return $this->storeGrup($dataJSON);
        }else{
            return $this->storeUser($dataJSON);
        }
    }   

    private function storeGrup($dataJSON){
        $keyData = 'member';
        // Guardar Imagen de Grupo
        $this->response = $this->imgGrup($dataJSON);
        // Guardar Foto Usuarios
        if(!$this->response['error']){
            $this->response = $this->imgUser($dataJSON, $keyData);
        }
        // Guardar Pasaportes
        if(!$this->response['error']){
            $this->response = $this->passUser($dataJSON, $keyData);
        }
        // Devolver Respuesta
        return $this->response;
    }

    private function storeUser($dataJSON){
        $keyData = 'user';
        // Guardar Foto Usuario
        $this->response = $this->imgUser($dataJSON, $keyData);
        // Guardar Pasaporte
        if(!$this->response['error']){
            $this->response = $this->passUser($dataJSON, $keyData);
        }
        // Devolver Respuesta
        return $this->response;
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
                return ['error' => false, 'mensaje' => "La imagen se ha almacenado correctamente."];
            } else {
                return ['error' => true, 'mensaje' => "Ha ocurrido un error al almacenar la imagen."];
            }
        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => 'Ha ocurrido un error al almacenar la imagen.'];
        }
    }

    private function imgGrup($dataJSON){
        try{
            // Tipo de imagen
            $mimeType = $dataJSON['grupo']['imagen']['tipo'];
            $extension = '.' . substr($mimeType, strpos($mimeType, '/') + 1);
    
            // Objecto de la imagen Grupo
            $imagenGrupo = [
                "dir"       => $this->gruposDirectorio,
                "nombre"    => md5($dataJSON['grupo']['nombre']) . md5($this->token) . $extension,
                "contenido" => $dataJSON['grupo']['imagen']['contenido']
            ];

            return $this->storeImage($imagenGrupo);

        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => "Es grupo, no se ha posido guardar."];
        }
    }

    private function imgUser($dataJSON, $keyData){
        $users = $dataJSON['usuarios'];

        try{
            foreach ($users as $user) {
                //  Tipo de imagen
                $mimeType = $user[ $keyData . '_foto']['tipo'];
                $extension = '.' . substr($mimeType, strpos($mimeType, '/') + 1);
        
                // Objecto de la imagen Grupo
                $imagenUser = [
                    "dir"       => $this->usuariosDirectorio,
                    "nombre"    => md5($user['user_name']) . md5($this->token) . $extension,
                    "contenido" => $user[$keyData . '_foto']['contenido']
                ];
                
                $this->response = $this->storeImage($imagenUser);  

                if($this->response['error']) break;           
            }

            return $this->response;

        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => "El usuario, no se ha posido guardar."];
        }
    }

    private function passUser($dataJSON, $keyData){
        $users = $dataJSON['usuarios'];

        try{
            foreach ($users as $user) {
                //  Tipo de imagen
                $mimeType = $user[ $keyData . '_pasport']['tipo'];
                $extension = '.' . substr($mimeType, strpos($mimeType, '/') + 1);
        
                // Objecto de la imagen Grupo
                $passUser = [
                    "dir"       => $this->pasportDirectorio,
                    "nombre"    => md5($user['user_name']) . md5($this->token) . $extension,
                    "contenido" => $user[$keyData . '_pasport']['contenido']
                ];
                
                $this->response = $this->storeImage($passUser);

                if($this->response['error']) break;  
            }

            return $this->response;   

        } catch ( Exception $e){
            return ['error' => true, 'mensaje' => "El usuario, no se ha posido guardar."];
        }
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