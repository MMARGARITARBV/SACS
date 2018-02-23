<?php
abstract class Conexion {

    private static $server = 'localhost';
    private static $db = 'siniestros';
    private static $user = 'root';
    private static $password = '';

    public static function connectDB() {
        try {
            $conection = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$db . ";charset=utf8", self::$user, self::$password);
        } catch (PDOException $e) {

            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        return $conection;
    }

}

//$conection = new mysqli("localhost","root","");
//
//if($conection->connect_errno > 0 ){
//    echo "No se ha establecido la conexión con el servidor de base de datos.<br>";
//    die ("Error: " . $conection->connect_erro);
//}else{
//   $conection->select_db("siniestros");
//   $conection->set_charset("utf8");
//}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

