<?php

    class GetController{

        public function getData($table){
            $response = GetModel::getData($table);

            $return = new GetController();
            $return ->ResponseData($response, "getData");
        }


        // Funcion de Respuesta de los metodos
        public function ResponseData($response, $method){
            if(!empty($response)){
                $json = array(
                    "estado" => 200,
                    "resultado" => $response
                );
            }
            else{
                $json = array(
                    "estado" => 404,
                    "resultado" => "No hay datos para mostrar"
                );
            }
            echo json_encode($json, http_response_code($json['estado']));
            
        }

    }