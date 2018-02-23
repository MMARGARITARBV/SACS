<?php
ini_set('error_reporting', 0);

session_start();

if (!isset($_SESSION['logueado'])) {

    header("Location: login.php");
}
include "../Model/Conexion.php";
?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../js/jquery-ui-1.10.3.custom.css"/>
        <script src="../../js/jquery-2.1.3.min.js"></script>
        <script src="../../js/jquery-ui-1.10.3.custom.js"></script>

        <script src="../../js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
        <script src="../../js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <link rel="stylesheet" href="../../js/jquery-ui-1.12.1.custom/jquery-ui.css">
        <script src="../../js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
        <script src="../../js/ajax.js"></script>
        <title></title>


    </head>
    <body>
        <div class="container-fluid">
            <div class="row header"> 

                <a href="../../index.php"><img class="logo center-block" src="../../img/sacs-white.png" alt="sacs"></a>
                <div class="pull-right">
                    <form action="../../index.php" method="post">
                        <input class="btn btn-info botonAdmin"  type="submit" value="Cerrar Sesión">
                    </form>
                </div>
            </div>
            <div class="row ">
                <div>
                    <h1><span class="text-center tituloCrud">Declaración de siniestro</span></h1>
                </div>
            </div>
            <div id="content">
                <select id="selectorNElementos">
                    <option value="1">1 filas</option>
                    <option value="2">2 filas</option>
                    <option value="4">4 filas</option>
                </select>

                <button id="paginaAnterior" class="btn btn-info botonAdmin little">Anterior</button>
                <button id="paginaSiguiente" class="btn btn-info botonAdmin little">Siguiente</button>


                <!-----------------------------AUTOCOMPLETE -------------------------------->
                <input id="autocomplete">
            </div>

            <?php
            $accion = $_POST['action'];

            if (!isset($_SESSION['pagina'])) {
                $_SESSION['pagina'] = 1;
            }

            // LISTADO TOTAL----------------------------------------------------
            ?>
            <div class="table-responsive">
                <table  class="table table-striped">
                    <thead>
                    <th class="columna" data-column="idAuto">ID</th>
                    <th class="columna" data-column="titPolzAuto" >TITULAR</th>
                    <th class="columna" data-column="comAsegAuto">COMPAÑIA</th>
                    <th class="columna" data-column="numPolzAuto">POLIZA</th>
                    <th class="columna" data-column="matriPolzAuto">MATRÍCULA</th>
                    <th class="columna" data-column="domicSiniAuto">DOM_SINIESTRO</th>
                    <th class="columna" data-column="provinSiniAuto">PROVINCIA</th>
                    <th class="columna" data-column="fechaSiniAuto">FECHA_SINI</th>
                    <th class="columna" data-column="descripSiniAuto">DESCRIPCIÓN</th>
                    <th class="columna" data-column="fecha_publicacion">FECHA_PUBLI</th>
                    <th colspan="2">                            
                        <button type="submit" id="nuevoAuto" class="btn btn-success btn-sm botonAdmin">
                            <span class="glyphicon glyphicon-ok"></span> Añadir Auto
                        </button>
                    </th>
                    </thead>

                    <?php
//// PAGINACION ---------------------------------->
//// MUESTRA PAGINA------------------------------------------------//
//
//                    $sentencia = "SELECT idAuto, titPolzAuto, comAsegAuto, numPolzAuto, matriPolzAuto, domicSiniAuto, provinSiniAuto, fechaSiniAuto, descripSiniAuto, fecha_publicacion FROM auto ";
////echo $sentencia;
//                    $conexion = Conexion::connectDB();
//                    $auto = $conexion->query($sentencia);
////print_r($compañias);
//
//                    $numAutos = $excursiones->rowCount();
////echo $numCompañias;
//                    $numPaginas = floor(abs($numAutos - 1) / 4) + 1;
//
//                    $pagina = $_POST['pagina'];
//
//                    if ($pagina == "primera") {
//                        $_SESSION['pagina'] = 1;
//                    }
//
//                    if (($pagina == "anterior") && ($_SESSION['pagina'] > 1)) {
//                        $_SESSION['pagina'] --;
//                    }
//
//                    if (($pagina == "siguiente") && ($_SESSION['pagina'] < $numPaginas)) {
//                        $_SESSION['pagina'] ++;
//                    }
//
//                    if ($pagina == "ultima") {
//                        $_SESSION['pagina'] = $numPaginas;
//                    }
                    ?>

                    <tr>

                        <!-- PRIMERA----------------------------------------->
<!--                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="primera">
                                    <span class="glyphicon glyphicon-step-backward"></span>
                                    Primera
                                </button>
                            </form>
                        </td>-->

                        <!-- ANTERIOR--------------------------------->
<!--                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="anterior">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    Anterior
                                </button>
                            </form>
                        </td>

                        <td>Pág //<?= $_SESSION['pagina'] ?> de <?= $numPaginas ?></td>-->


                        <!-- SIGUIENTE--------------------------------------------->
<!--                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="siguiente">
                                    Siguiente
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </button>
                            </form>
                        </td>-->

                        <!-- ULTIMA---------------------------------------------->
<!--                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="ultima">
                                    Última
                                    <span class="glyphicon glyphicon-step-forward"></span>
                                </button>
                            </form>
                        </td>  
                        <td></td><td></td><td></td><td></td><td></td><td></td>-->
                    </tr>
                </table>
            </div>
            <div class="footer"><p><strong>SACS</strong></p> 
                <p class="footer-text">Servicios auxiliares para corredores de seguros</p>
            </div>
        </div>



        <!--------------------- MODAL PARA INSERTAR NUEVO SINIESTRO AUTO --------------------------------------------------------------->

        <div id="alta" title="Declaración de siniestro Auto:">
            <form id="formularioAlta" method="post" action="">
<!--                <div class="inputFormularioAlta"><p>Id: </p><input id="idAltaAuto" type="text" name="idAuto"></div>-->
                <div class=""><p>Id: </p><input id="idAltaAuto" type="text" name="idAuto"></div>
                <div class=""><p>Asegurado: </p><input id="altaAsegurado" type="text" name="asegurado"></div>
                <div class=""><p>Compañia: </p><input id="altaCompania" type="text" name="compania"></div>
                <div class=""><p>Número de poliza: </p><input id="altaPoliza" type="text" name="poliza"></div>
                <div class=""><p>Matrícula Vehículo: </p><input id="altaMatricula" type="text" name="matricula"></div>
                <div class=""><p>Domicilio del siniestro: </p><input id="altadomSiniestro" type="text" name="docSiniestro"></div>
                <div class=""><p>Provincia del siniestro: </p><input id="altaProvSiniestro" type="text" name="proSiniestro"></div>
                <div class=""><p>Fecha Siniestro: </p><input id="altaFechaSiniestro" type="text" name="fechSiniestro"></div>
                <div class=""><p>Descripción del siniestro: </p><input id="altaDescripSiniestro" type="text" name="descSiniestro"></div>
    <!--                <div class="inputFormularioAlta"><p>Fecha de Publicación: </p><input id="fechaPubliAlta" type="text" name="fecha_publicacion"></div>-->
            </form>
        </div>


        <!--------------------- MODAL PARA CONFIRMAR BORRADO DEL SINIESTRO ----------------------------------------------------->

        <div id="baja" title="Confirmación de baja:">
            <h6>¿Está seguro de que desea borrar el Siniestro?</h6>
        </div>


        <!--------------------- MODIFICAR EL SINIESTRO ------------------------------------------------------------------------>

        <div id="modificar" title="Modificar siniestro: ">
            <form id="formularioModificacion" method="post" action="">
                <div><p>Id Auto:</p><input name="idAuto" id="modificacionIdAuto" type="text"></div>
                <div><p>Asegurado:</p><input name="asegurado" id="modificacionAsegurado" type="text"></div>
                <div><p>Compañia:</p><input name="compania" id="modificacionCompania" type="text"></div>
                <div><p>Número de poliza:</p><input name="poliza" id="modificacionPoliza" type="text"></div>
                <div><p>Matrícula Vehículo:</p><input name="vehiculo" id="modificacionMatricula" type="text"></div>
                <div><p>Domicilio del siniestro:</p><input name="domSiniestro" id="modificacionDomSiniestro" type="text"></div>
                <div><p>Provincia del siniestro:</p><input name="provSiniestro" id="modificacionProvincia" type="text"></div>
                <div><p>Fecha Siniestro:</p><input name="fecSiniestro" id="modificacionFechaSiniestro" type="text"></div>
                <div><p>Descripción del siniestro:</p><input name="descSiniestro" id="modificacionDescripSiniestro" type="text"></div>
    <!--                <div><p>Fecha de Publicación:</p><input name="fecha" id="fechaPubliModificacion" type="text"></div>-->
            </form>
        </div>

    </body>
</html>

