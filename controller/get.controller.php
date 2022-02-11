<?php

    class GetController{
        // Peticiones GET sin FILTRO
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
        // Peticones GET con tablas RELACIONADAS
        public function getRelData($table,$rel){
            $response = GetModel::getRelData($table,$rel);
            $return = new GetController();
            $return -> ResponseData($response,"getRelData");
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