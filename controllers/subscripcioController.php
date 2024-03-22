<?php

class Subscripcio{

    private $request;
    private $response;

    function __construct(){
   	    $this->model = new SubscripcioModel();
        $this->imageModel = new SubscripcioImageModel();
     	$this->run();
    }

    public function run(){
	    $this->isPost();
        $this->isData();
        $this->isSession();
        $this->isValidData();
        $cleanData = $this->sanitizeData();
        //$this->storeData($cleanData);
        $this->sendResponse();
    }

    private function isPost(){
        // Validar que el methodo de peticion sea POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            return True;
        }else{
            $this->response = [ "error" => true, "mensaje" => 'Mètode no permès.'];
            $this->sendResponse(405, $this->response);
        }
    }

    private function isData(){
        // Validar que se reciva un JSON en el cuerpo de la petición
        if( !empty(file_get_contents('php://input')) ){
            // Obtiene el JSON recibido y lo convierte a un array de PHP
            $this->request = json_decode(file_get_contents('php://input'), true);
            return True;
        }else{
            $this->response = [ "error" => true, "mensaje" => 'No és acceptable.'];
            $this->sendResponse(406, $this->response);
        }
    }

    private function isSession(){
        // Validar el token CSRF
        session_start();

        if(!isset($_SESSION['csrf_token'])){
            $this->response = [ "error" => true, "mensaje" => 'Error de CSRF.'];
            $this->sendResponse(403, $this->response);
        }

        if (!isset($this->request['csrf_token']) || $this->request['csrf_token'] !== $_SESSION['csrf_token']) {
            $this->response = [ "error" => true, "mensaje" => 'Error de CSRF.'];
            $this->sendResponse(403, $this->response);
        }
    }

    private function isValidData(){
        // Validar Correo Existente
        $query = $this->model->find(["subscripcion.correo" => $this->request['subscripcion']['correo']]);
        if($query != null){
            $this->response = [ "error" => true, "mensaje" => 'Sembla que el correu electrònic ja està en ús.'];
            $this->sendResponse(406, $this->response);
        }
    }

    private function sanitizeData(){
        // Estructura de datos
        $dataExpected = [
            "csrf"          => isset($this->request['csrf_token']) ? $this->request['csrf_token'] : null, 
            "subscripcio"   => [
                "tarifa"    => isset($this->request['tarifa']) ? $this->request['tarifa'] : null,
                "correu"    => isset($this->request['correo']) ? $this->request['correo'] : null,
                "telefon"   => isset($this->request['telefono']) ? $this->request['telefono'] : null,
                "bolleti"   => isset($this->request['boletin']) ? $this->request['boletin'] : null,
                "pagament"  => isset($this->request['metodoPago']) ? $this->request['metodoPago'] : null,
            ],
            "grup"          => [],
            "usuaris"       => [],
            "big_data"      => isset($this->request['bigData']) ? $this->request['bigData'] : null
        ];

        // Preparar Grupo    
        if(isset($this->request['grupo']) && $this->request['grupo'] != null){
            // Tipo de imagen
            $mimeType = $this->request['grupo']['imagen']['tipo'];
            $extension = '.' . substr($mimeType, strpos($mimeType, '/') + 1);

            $dataExpected['grup'] = [
                "nom"   => $this->request['grupo']['nombre'],
                "logo"  => md5($this->request['grupo']['nombre']) . md5($this->request['csrf_token']) . $extension
            ];
        }else{
            $this->response = ["error" => true, "mensaje" => "Sembla que hi ha algun error de dades a l'apartat grup."];
            $this->sendResponse(406, $this->response);
        }

        // Preparar Usuarios    
        if(isset($this->request['usuaris']) && $this->request['usuaris'] != null){
            // Obtener la key Data
            if(count($this->request['usuaris']) > 1){
                $keyData = "member";
            }else{
                $keyData = "user";
            }
            // Iterar sobre los usuarios
            foreach($this->request['usuaris'] as $user){
                // Tipo de imagen Foto
                $mimeType = $user[ $keyData . '_foto']['tipo'];
                $extensionFoto = '.' . substr($mimeType, strpos($mimeType, '/') + 1);

                // Tipo de imagen Pasaporte
                $mimeType = $user[ $keyData . '_pasport']['tipo'];
                $extensionPasport = '.' . substr($mimeType, strpos($mimeType, '/') + 1);
    
                $dataExpected['usuaris'] = [
                    "nom"           => $user['user_name'],
                    "instrument"    => $user['user_instrument'],
                    "foto"          => md5($user['user_name']) . md5($this->request['csrf_token']) . $extensionFoto,
                    "pasaport"      => md5($user['user_name']) . md5($this->request['csrf_token']) . $extensionPasport,
                ];
            }
        }else{
            $this->response = ["error" => true, "mensaje" => "Sembla que hi ha algun error de dades a l'apartat d'usuari."];
            $this->sendResponse(406, $this->response);
        }

        return $dataExpected;

    }

    private function storeData($cleanData){
        // Almacenar Imagenes
        $isValidImage = $this->imageModel->handler($this->request);
        if($isValidImage['error']) $this->sendResponse(406, $isValidImage);

        // Alamacenar Datos
        $isValidData = $this->model->insertarDocumento($cleanData);
        if($isValidData['error']) $this->sendResponse(406, $isValidData);
    }

    private function sendResponse($statusCode = 200, $response = ["error" => false, "mensaje" => "Operació exitosa."]){
	    http_response_code($statusCode); 
        echo json_encode($response);
        exit;
    }

}


