<?php
    require_once "connection.php";
class PostModel{
    /* Modelo Obtencion de columnas tabla MYSQL */
    static public function getAllColumns($table, $database){
        return Conexion::connect()->query("SELECT COLUMN_NAME AS item FROM information_schema.columns WHERE table_schema = '$database' AND table_name = '$table'")->fetchAll(PDO::FETCH_OBJ);
    }
    /* Modelo Insercion de Datos Dianmicamente */
    static public function PostData($table, $data){
        $columns = "(";
        $params = "(";
        foreach ($data as $key => $value) {
            $columns .= $key.",";
            $params .= ":".$key.",";
        }
        // eliminacion de las comas del final
        $columns = substr($columns,0,-1);
        $params = substr($params,0,-1);
        $columns .= ")";
        $params .= ")";

       
        // Petcion de insersion a la base de datos
        $query = Conexion::connect()->prepare("INSERT INTO $table $columns VALUES $params");
            foreach ($data as $key => $value) {
                $query->bindParam(":".$key,$data[$key], PDO::PARAM_STR);
            }
        //Condicinal de ejecucion la consulta 
        if($query -> execute()){
            return "Insercion Ejecutada Correctamente";
        }
        else{
            return Conexion::connect()->errorInfo();
        }
    
    }
}