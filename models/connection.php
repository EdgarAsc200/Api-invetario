<?php
    class Conexion{
        static public  function connect(){

            try{
                $conexion = new PDO("mysql:dbname=blmakaug339z0qpdqlmu;host=blmakaug339z0qpdqlmu-mysql.services.clever-cloud.com", "uooo0iyhmscccwix","lmmdPgyVe2sqg8NLfrZ3");
                $conexion->exec("set names utf8");
            }catch(PDOException $e){

                die("Error: ".$e->getMessage());
            }

            return  $conexion;
            
        }
    }