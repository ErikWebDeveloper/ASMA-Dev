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
        // Verificar 
        // Guardar
        //$this->sendResponse();
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

    private function isValidData(){
        $query = $this->model->find(["subscripcion.correo" => 'joan@joan.com']);
        echo json_encode(['error' => true, 'mensaje' => $query]); 
    }

    private function saveToDb(){

    }

    private function sendResponse(){
	    http_response_code(200); 
        // Almacenar imagenes
        $this->response = $this->imageModel->handler($this->request);
        // Almacenar datos
        /*
        if(!$this->response['error']){
            $this->response = $this->model->insertarDocumento($this->request);
            echo json_encode($this->response);
        }*/
        // Hola
        //$this->response = ['error' => true, 'mensaje' => "Ha ocurrido un error de testing."];
        echo json_encode($this->response);
    }

}


