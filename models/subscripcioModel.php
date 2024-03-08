<?php

class SubscripcioModel {
    private $host = "localhost";
    private $puerto = 27017;
    private $baseDatos = "ASMA";
    private $coleccion = "subscripcions";
    private $user = ""; // Actualizar si es necesario
    private $password = ""; // Actualizar si es necesario
    private $conexion;

    public function __construct() {
        $this->conectar();
    }

    private function conectar() {
        try {
            $this->conexion = new MongoDB\Driver\Manager("mongodb://{$this->host}:{$this->puerto}");
            // Conexión exitosa a MongoDB (no se retorna mensaje de éxito en producción)
        } catch (MongoDB\Driver\Exception\Exception $e) {
            //$this->enviarRespuestaJSON(['error' => true, 'mensaje' => "Error de conexión: " . $e->getMessage()]);
            //exit;
            $response = ['error' => true, 'mensaje' => "Error de conexión: " . $e->getMessage()];
            return;
        }
    }

    public function insertarDocumento($documento) {
        try {
            $bulk = new MongoDB\Driver\BulkWrite;
            $id = $bulk->insert($documento);

            $resultado = $this->conexion->executeBulkWrite("{$this->baseDatos}.{$this->coleccion}", $bulk);

            if ($resultado->getInsertedCount() > 0) {
                //$this->enviarRespuestaJSON(['error' => false, 'mensaje' => "Documento insertado correctamente.", 'id' => (string) $id]);
                return ['error' => false, 'mensaje' => "Documento insertado correctamente.", 'id' => (string) $id];
            } else {
                //$this->enviarRespuestaJSON(['error' => true, 'mensaje' => "Error al insertar el documento."]);
                return ['error' => true, 'mensaje' => "Error al insertar el documento."];
            }
        } catch (MongoDB\Driver\Exception\Exception $e) {
            //$this->enviarRespuestaJSON(['error' => true, 'mensaje' => "Error al insertar: " . $e->getMessage()]);
            return ['error' => true, 'mensaje' => "Error al insertar: " . $e->getMessage()];
        }
    }

    public function mostrarDocumentos() {
        try {
            $consulta = new MongoDB\Driver\Query([]);
            $cursor = $this->conexion->executeQuery("{$this->baseDatos}.{$this->coleccion}", $consulta);
            $documentos = [];

            foreach ($cursor as $documento) {
                $documentos[] = $documento;
            }

            //$this->enviarRespuestaJSON(['error' => false, 'documentos' => $documentos]);
            return ['error' => false, 'documentos' => $documentos];
        } catch (MongoDB\Driver\Exception\Exception $e) {
            //$this->enviarRespuestaJSON(['error' => true, 'mensaje' => "Error al consultar documentos: " . $e->getMessage()]);
            return ['error' => true, 'mensaje' => "Error al consultar documentos: " . $e->getMessage()];
        }
    }

    private function enviarRespuestaJSON($respuesta) {
        header('Content-Type: application/json');
        echo json_encode($respuesta);
    }
}