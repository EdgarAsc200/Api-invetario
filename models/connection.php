<?php
    class Conexion{
        static public  function connect(){

            try{
                $conexion = new PDO("mysql:dbname=inventario_ti;host=localhost", "root","");
                $conexion->exec("set names utf8");
            }catch(PDOException $e){

                die("Error: ".$e->getMessage());
            }

            return  $conexion;
            
        }
    }