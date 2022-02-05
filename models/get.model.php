<?php
    require_once "connection.php";
class GetModel{

    static  public  function getData($table){
        $query = Conexion::connect()->prepare("SELECT * FROM  $table");
        $query->execute();
        
        return $query->fetchall(PDO::FETCH_CLASS);
    } 

    static public function getDataFilter($table,$LinkTo,$EqualTo){

        $query = Conexion::connect()->prepare("SELECT * FROM $table where $LinkTo = :$LinkTo");
        $query->bindParam(":".$LinkTo,$EqualTo,PDO::PARAM_STR);
        $query->execute();

        return $query->fetchall(PDO::FETCH_CLASS);
    }   
}    