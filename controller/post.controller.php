<?php

class PostController{
    /* Contrololador para ontener todas la comlumnas de una tabla */
    static public function getAllColumns($table,$database){
        // Petecion enviada al Modelo
        $response = PostModel::getAllColumns($table, $database);
		return $response;    
    }   
    /* Controlador Insertar Datos Dinamicamente */
    public function PostData($table,$data){
        $response = PostModel::PostData($table,$data);
        $return = new  PostController();
        $return -> responseFnc($response);
    }
    /* Controladoor Funcion Respuesta */
    public function responseFnc($response){
        
        $json = array (
            'status'=> '200',
            'response ' => $response
           );
        echo json_encode($json, http_response_code($json['status']));
    }
 }