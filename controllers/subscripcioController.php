<?php
class Subscripcio{

    private $request;
    private $response;

    function __construct(){
   	    $this->model = new SubscripcionModel();
     	$this->run();
    }

    public function run(){
	    $this->isPost();
        $this->isData();
        //$this->isSession();
        $this->sendResponse();
    }

    private function isPost(){
        // Validar que el methodo de peticion sea POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            return True;
        }else{
            http_response_code(405); 
            exit('Method Not Allowed');
        }
    }

    private function isData(){
        // Validar que se reciva un JSON en el cuerpo de la petición
        if( !empty(file_get_contents('php://input')) ){
            // Obtiene el JSON recibido y lo convierte a un array de PHP
            $this->request = json_decode(file_get_contents('php://input'), true);
            return True;
        }else{
            http_response_code(406); 
            exit('Not Acceptable');
        }
    }

    private function isSession(){
        // Validar el token CSRF
        session_start();

        if(!isset($_SESSION['csrf_token'])){
            http_response_code(403); 
            exit('Error de CSRF');
        }

        if (!isset($this->request['csrf_token']) || $this->request['csrf_token'] !== $_SESSION['csrf_token']) {
            http_response_code(403); 
            exit('Error de CSRF');
        }
    }

    private function saveToDb(){
        
    }

    private function sendResponse(){
	    http_response_code(200); 
        $this->response = $this->model->insertarDocumento($this->request);
        echo json_encode($this->response);
    }

}


