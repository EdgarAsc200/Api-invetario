<?php

class PostController{

    static public function getAllColumns($table,$database){

        // Petcion enviada al Modelo
        $response = PostModel::getColumnsData($table, $database);
		return $response;
    }

    public function PostData($table, $columns, $data){


    }
}