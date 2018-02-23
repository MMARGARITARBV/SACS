<?php

require_once '../Model/Auto.php';

switch ($_REQUEST['accion']) {
  
    case 'listado':
        $respuesta = Auto::getAutos();
        break;
  
    case 'insertar':
        $datos = [
            "idAuto" => $_REQUEST['idAuto'],
            "titPolzAuto" => $_REQUEST['titPolzAuto'],
            "comAsegAuto" => $_REQUEST['comAsegAuto'],
            "numPolzAuto" => $_REQUEST['numPolzAuto'],
            "matriPolzAuto" => $_REQUEST['matriPolzAuto'],
            "domicSiniAuto" => $_REQUEST['domicSiniAuto'],
            "provinSiniAuto" => $_REQUEST['provinSiniAuto'],
            "fechaSiniAuto" => $_REQUEST['fechaSiniAuto'],
            "descripSiniAuto" => $_REQUEST['descripSiniAuto'],
        ];

        // INSERTA UN SINIESTRO //
        Auto::insertAuto($datos);

        // TRAE EL LISTADO CON LOS DATOS ACTUALIZADOS //
        $respuesta = Auto::getAutos();
        break;
  
    case 'eliminar':
        Auto::deleteAuto($_REQUEST['idAuto']);
        $respuesta = Auto::getAutos();
        break;
  
    case 'actualizar':
        // $idAuto = $_REQUEST['idAuto'];
        $datos = [
            "idAuto" => $_REQUEST['idAuto'],
            "titPolzAuto" => $_REQUEST['titPolzAuto'],
            "comAsegAuto" => $_REQUEST['comAsegAuto'],
            "numPolzAuto" => $_REQUEST['numPolzAuto'],
            "matriPolzAuto" => $_REQUEST['matriPolzAuto'],
            "domicSiniAuto" => $_REQUEST['domicSiniAuto'],
            "provinSiniAuto" => $_REQUEST['provinSiniAuto'],
            "fechaSiniAuto" => $_REQUEST['fechaSiniAuto'],
            "descripSiniAuto" => $_REQUEST['descripSiniAuto']
        ];
        $idAntiguo = $_REQUEST['idAntiguo'];
        Auto::updateAuto($datos, $idAntiguo);
        $respuesta = Auto::getAutos();
        break;
   
    case'detalleAuto':
        $respuesta = Auto::getAutoById($_REQUEST['idAuto']);
        break;
   
    case 'ordenaAuto':
        if (filter_var($_REQUEST['orden'], FILTER_VALIDATE_BOOLEAN)) {
            $respuesta = Auto::getAutosOrdenadas($_REQUEST['columna'], "ASC");
        } else {
            $respuesta = Auto::getAutosOrdenadas($_REQUEST['columna'], "DESC");
        }
        break;
        
        
    case 'validar':
        // EXTRAER SINIESTRO CON LA ID RECOGIDA
        $auto = Auto::getAutoById($_REQUEST['idAuto']);

        // SI EXISTE Y SU CÓDIGO COINCIDE CON EL CÓDIGO RECOGIDO 
        if ($auto->getIdAuto() == $_REQUEST['idAuto']) {
            // ENVIAMOS UN FALSE PARA INDICAR QUE ÉSTE USUARIO EXISTE Y POR TANTO NO SE PUEDE UTILIZAR
            $resultado = "false";
        } else {
            $resultado = "true";
        }
        echo $resultado;
        break;

    case 'filtrarCompania':
        $respuesta = Auto::getAutosCompletaByCompania($_REQUEST['compania']);
        break;
}

if (isset($respuesta)) {
    echo json_encode($respuesta, JSON_PRETTY_PRINT);
}
