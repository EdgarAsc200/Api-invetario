<?php
    require_once "connection.php";
class GetModel{

    static  public  function getData($table){
        $query = Conexion::connect()->prepare("SELECT * FROM  $table");
        $query->execute();
        
        return $query->fetchall(PDO::FETCH_CLASS);
    }
}