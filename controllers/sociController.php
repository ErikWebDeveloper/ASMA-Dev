<?php

class Soci{

    private $request;
    private $response;

    function __construct(){
   	    $this->model = new SubscripcioModel();
     	$this->run();
    }

    private function run(){
        
    }
}