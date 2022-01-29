
<?php

    class RoutesController{

        public function RouteIndex(){
            require "Routes/route.php";
        }

        static public function database(){

            return "inventario_ti";
        }

    }