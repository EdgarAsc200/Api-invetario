<?php
$uri = explode("/",$_SERVER['REQUEST_URI']);

// 
 if(empty($uri[2])){
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
        $response = getAllColumns($uri[2], $database);
        
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "PUT"){
        
    }




 }

 