<?php
ini_set('error_reporting', 0);
//session_start();

include "../Model/Conexion.php";
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>sacs | servicios auxiliares para corredores de seguros</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS RESETEO -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" type="image/png" href="https://sacs.sextaplanta.com/favicon.png">

    </head>

    <body>
        <div class="container-fluid">
            <div class="row header">       
                <a href="../../index.php"><img class="logo center-block" src="../../img/sacs-white.png" alt="sacs"></a>
            </div>

            <div class="row ">
                <h1 class="text-center">Login</h1>

                <?php
                $conexion = Conexion::connectDB();
                $sentencia = "SELECT usuario, password FROM usuario";
                $datosUsuarios = $conexion->query($sentencia);



                //---------------- inicializo logueado-------------------------//

                if (!isset($_SESSION['logueado'])) {
                    $_SESSION['logueado'] = false;
                }

                //---------------- verifico el login-------------------------//
                $count = 0;
                while ($pass = $datosUsuarios->fetchObject()) { //Pass recoge los datos de usuario
                    if ($pass->usuario == $_POST['nom'] && $pass->password == $_POST['pass']) {
                        $count++;
                    }
                }
                //var_dump($pass);

                if (isset($_POST['nom'])) {
                    if ($count == 1) {
                        session_start();
                        $_SESSION['logueado'] = true;
                        header("Location: listado.php");
                    } else {
                        echo '<span style="color: red">Verifique los datos. Inténtelo de nuevo.</span><br><br>';
                    }
                }
                ?>

                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <form action="#" method="post">
                        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label>Usuario: </label>
                            </div>
                            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="text" name ="nom" required autofocus />
                            </div>
                        </div>
                        <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label>Contraseña: </label>
                            </div>
                            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="text" name ="pass" required />
                            </div>
                        </div>
                        <div  class=" col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 btn-block">
                                <button name="submit" type="submit" >Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer"><p><strong>SACS</strong></p> 
                <p class="footer-text">Servicios auxiliares para corredores de seguros</p>
            </div>
            <script src=../../js/jquery-2.1.3.min.js></script>
            <script src=../../js/bootstrap.js></script>
        </div>    
    </body>
</html>