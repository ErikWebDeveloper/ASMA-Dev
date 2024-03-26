<?php

class Soci{

    private $request;
    private $response;

    function __construct(){
   	    $this->model = new SubscripcioModel();
     	$this->run();
    }

    private function run(){
	    //$this->isPost();
        $this->isData();
        //$this->isSession();
        $this->isValidData();
        //$cleanData = $this->sanitizeData();
        //$this->storeData($cleanData);
        //$this->sendResponse();
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
            $this->sendResponse(200, $this->response);
        }

        if (!isset($this->request['csrf_token']) || $this->request['csrf_token'] !== $_SESSION['csrf_token']) {
            $this->response = [ "error" => true, "mensaje" => 'Error de CSRF.'];
            $this->sendResponse(200, $this->response);
        }
    }

    private function isValidData(){
        // Validar Id de Subscripcion
        $id = new MongoDB\BSON\ObjectId($this->request['id']);

        $query = $this->model->find(['_id' => $id]);

        if($query == null){
            $this->response = [ "error" => true, "mensaje" => 'Sembla que aquest soci no esta en la nostra base de dades.'];
            $this->sendResponse(200, $this->response);
            exit;
        }
        // Peparar datos
        /*$dataResponse = [];
        if(count($query['usuaris']) > 1){
            // Grupo
        }else{
            // Usuario
        }*/
        $dataResponse = [
            'tarifa'        => $query['subscripcio'][0]['tarifa'],
            'nom'           => $query['usuaris'][0]['usuaris'],
            'instrument'    => $query['usuaris'][0]['instrument'],
            'foto'          => $query['usuaris'][0]['foto']
        ];

        // Enviar Respuesta
        $this->response = [ "error" => false, "mensaje" => $dataResponse];
        $this->sendResponse(200, $this->response);        
    }

    private function sendResponse($statusCode = 200, $response = ["error" => false, "mensaje" => "Operació exitosa."]){
	    http_response_code($statusCode); 
        echo json_encode($response);
        exit;
    }
}