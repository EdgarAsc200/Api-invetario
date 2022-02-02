<?php
$uri = explode("/",$_SERVER['REQUEST_URI']);

// 
 if(empty($uri[1])){
     $jsonResponse = array(
         "estado" => "404",
         "respuesta " => "No Reponde"
     );

     echo json_encode($jsonResponse, http_response_code($jsonResponse['estado']));
     return;
 }
 else{
    /* Peticiones GET */
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET"){
        // Petciones get sin filtro
        $response = new GetController();
        $response ->getData($uri[2]);
    }
    // Peticiones POST
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){

        $database =  RoutesController::database();
        $response = PostController::getAllColumns(explode("?",$uri[2])[0], $database);
        $columns = array();
        
        foreach ($response as $key => $value) {
            array_push($columns, $value->item);
        }
        array_shift($columns);
        if(isset($_POST)){
            $count = 0;
            foreach(array_keys($_POST) as $key => $value){
                if($value == $columns[$key]){
                    $count ++;
                }
            }
           
            if($count == count($columns)){
                $response = new PostController();
                $response -> PostData(explode("?",$uri[2])[0],$_POST);
            }
            else{
                echo "ERROR: No Coinciden los parametros con las columnas de la tabla de la BD";
            }
        }
    }
    




 }

 
