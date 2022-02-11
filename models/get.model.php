<?php
    require_once "connection.php";
class GetModel{

    static public function getData($table){
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

    static public function getRelData($table,$rel){
        $rel = explode(',', $rel);
        if(count($rel) > 1){
           if(Count($rel) == 2){
            //    $query = Conexion::connect -> prepare("SELECT * FROM $table INNER JOUN $rel ON $rel[0].$table = $table.id_$rel[0]")
            echo "son mas de un parametro";
           }
            
      
        }
        else{
            $query = Conexion::connect() -> prepare("SELECT * FROM $table INNER JOiN $rel[0] ON
             $rel[0].id_$rel[0] = $table.$rel[0]_$table");

            $query->execute();
        
            return $query->fetchall(PDO::FETCH_CLASS);
           
        }

        // $query = Conexion::connect()->prepare("")
        
    }
}    