 <?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');

require_once "Controller/route.controller.php";
require_once "Controller/get.controller.php";
require_once "Models/get.model.php";

$index = new RoutesController();
$index->RouteIndex();