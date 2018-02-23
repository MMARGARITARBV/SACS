<?php

$conection = new mysqli("localhost", "root", "");

if ($conection->connect_errno > 0) {
    echo "No se ha establecido la conexión con el servidor de base de datos.<br>";
    die("Error: " . $conection->connect_erro);
} else {
    $conection->select_db("siniestros");
    $conection->set_charset("utf8");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


