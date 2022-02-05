<?php

    class GetController{

        public function getData($table){
            $response = GetModel::getData($table);

            $return = new GetController();
            $return ->ResponseData($response, "getData");
        }

        // Petiones a GET con FILTRO
        public function getDataFilter($table,$linkTo,$EqualTo){
            $response = GetModel::getDataFilter($table,$linkTo,$EqualTo);
            $return = new GetController();
            $return->ResponseData($response,"getDataFilter");
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
                    "resultado" => "No hay datos para mostrar",
                    "method" => $method
                );
            }
            echo json_encode($json, http_response_code($json['estado']));
            
        }

    }