<?php

require_once 'Conexion.php';

class Auto implements JsonSerializable {

    private $idAuto;
    private $titPolzAuto;
    private $comAsegAuto;
    private $numPolzAuto;
    private $matriPolzAuto;
    private $domicSiniAuto;
    private $provinSiniAuto;
    private $fechaSiniAuto;
    private $descripSiniAuto;
    private $fecha_publicacion;

    function __construct($idAuto, $titPolzAuto, $comAsegAuto, $numPolzAuto, $matriPolzAuto, $domicSiniAuto, $provinSiniAuto, $fechaSiniAuto, $descripSiniAuto, $fecha_publicacion) {
        $this->idAuto = $idAuto;
        $this->titPolzAuto = $titPolzAuto;
        $this->comAsegAuto = $comAsegAuto;
        $this->numPolzAuto = $numPolzAuto;
        $this->matriPolzAuto = $matriPolzAuto;
        $this->domicSiniAuto = $domicSiniAuto;
        $this->provinSiniAuto = $provinSiniAuto;
        $this->fechaSiniAuto = $fechaSiniAuto;
        $this->descripSiniAuto = $descripSiniAuto;
        $this->fecha_publicacion = $fecha_publicacion;
    }
    function getIdAuto() {
        return $this->idAuto;
    }

    function getTitPolzAuto() {
        return $this->titPolzAuto;
    }

    function getComAsegAuto() {
        return $this->comAsegAuto;
    }

    function getNumPolzAuto() {
        return $this->numPolzAuto;
    }

    function getMatriPolzAuto() {
        return $this->matriPolzAuto;
    }

    function getDomicSiniAuto() {
        return $this->domicSiniAuto;
    }

    function getProvinSiniAuto() {
        return $this->provinSiniAuto;
    }

    function getFechaSiniAuto() {
        return $this->fechaSiniAuto;
    }

    function getDescripSiniAuto() {
        return $this->descripSiniAuto;
    }

    function getFecha_publicacion() {
        return $this->fecha_publicacion;
    }

    
    //
    public static function insertAuto($datos) {
        $conexion = Conexion::connectDB();
        $insercion = "INSERT INTO auto (idAuto, titPolzAuto, comAsegAuto, numPolzAuto, matriPolzAuto, domicSiniAuto, provinSiniAuto, fechaSiniAuto, descripSiniAuto) " .
                "VALUES ('$datos[idAuto]', '$datos[titPolzAuto]', '$datos[comAsegAuto]', "
                . "'$datos[numPolzAuto]', '$datos[matriPolzAuto]', '$datos[domicSiniAuto]', "
                . "'$datos[provinSiniAuto]', '$datos[fechaSiniAuto]', '$datos[descripSiniAuto]')";
        $conexion->exec($insercion);
    }

    public static function deleteAuto($idAuto) {
        $conexion = Conexion::connectDB();
        $borrado = "DELETE FROM auto WHERE idAuto='".$idAuto."'";
        $conexion->exec($borrado);
    }

    public static function updateAuto($datos, $idAntiguo) {
        $conexion = Conexion::connectDB();
        $modifica = "UPDATE auto SET idAuto='$datos[idAuto]', titPolzAuto='$datos[titPolzAuto]', comAsegAuto='$datos[comAsegAuto]', "
                . "numPolzAuto='$datos[numPolzAuto]', matriPolzAuto='$datos[matriPolzAuto]', domicSiniAuto='$datos[domicSiniAuto]', "
                . "provinSiniAuto='$datos[provinSiniAuto]', fechaSiniAuto='$datos[fechaSiniAuto]', descripSiniAuto='$datos[descripSiniAuto]' WHERE idAuto='$idAntiguo'";
        $conexion->exec($modifica);
    }

    public static function getAutos() {
        $conexion = Conexion::connectDB();
        $seleccion = "SELECT * FROM auto";
        $consulta = $conexion->query($seleccion);
        $autos = [];

        while ($registro = $consulta->fetchObject()) {
            $autos[] = new Auto($registro->idAuto, $registro->titPolzAuto, $registro->comAsegAuto, $registro->numPolzAuto, $registro->matriPolzAuto, $registro->domicSiniAuto, $registro->provinSiniAuto, $registro->fechaSiniAuto, $registro->descripSiniAuto, $registro->fecha_publicacion);
        }

        return $autos;
    }

    public static function getAutoById($idAuto) {
        $conexion = Conexion::connectDB();
        $seleccion = "SELECT idAuto, titPolzAuto, comAsegAuto, numPolzAuto, matriPolzAuto, domicSiniAuto, provinSiniAuto, fechaSiniAuto, descripSiniAuto, fecha_publicacion FROM auto WHERE idAuto=\"" . $idAuto . "\"";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();

        if ($registro == false) {
            $auto = new Auto("", "", "", "", "", "", "", "", "", "");
        } else {
            $auto = new Auto($registro->idAuto, $registro->titPolzAuto, $registro->comAsegAuto, $registro->numPolzAuto, $registro->matriPolzAuto, $registro->domicSiniAuto, $registro->provinSiniAuto, $registro->fechaSiniAuto, $registro->descripSiniAuto, $registro->fecha_publicacion);
        }
        return $auto;
    }

    public static function getAutosOrdenadas($columna, $orden) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM auto ORDER BY " . $columna . " " . $orden;
        $consulta = $conexion->query($select);

        $autos = [];

        while ($auto = $consulta->fetchObject()) {
            $autos[] = new Auto($auto->idAuto, $auto->titPolzAuto, $auto->comAsegAuto, $auto->numPolzAuto, $auto->matriPolzAuto, $auto->domicSiniAuto, $auto->provinSiniAuto, $auto->fechaSiniAuto, $auto->descripSiniAuto, $auto->fecha_publicacion);
        }

        return $autos;
    }

    public static function getAutoCompletaById($idAuto) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM auto WHERE idAuto='$idAuto'";
        $consulta = $conexion->query($select);
        $listado = $consulta->fetchObject();

        $auto = new Auto($listado->idAuto, $listado->titPolzAuto, $listado->comAsegAuto, $listado->numPolzAuto, $listado->matriPolzAuto, $listado->domicSiniAuto, $listado->provinSiniAuto, $listado->fechaSiniAuto, $listado->descripSiniAuto, $listado->fecha_publicacion);

        return $auto;
    }

    public static function getAutosCompletaByCompania($comAsegAuto) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM auto WHERE comAsegAuto='$comAsegAuto'";
        $consulta = $conexion->query($select);

        $autos = [];

        while ($auto = $consulta->fetchObject()) {
            $autos[] = new Auto($auto->idAuto, $auto->titPolzAuto, $auto->comAsegAuto, $auto->numPolzAuto, $auto->matriPolzAuto, $auto->domicSiniAuto, $auto->provinSiniAuto, $auto->fechaSiniAuto, $auto->descripSiniAuto, $auto->fecha_publicacion);
        }

        return $autos;
    }

    public function jsonSerialize() {
        return [
            "idAuto" => $this->idAuto,
            "titPolzAuto" => $this->titPolzAuto,
            "comAsegAuto" => $this->comAsegAuto,
            "numPolzAuto" => $this->numPolzAuto,
            "matriPolzAuto" => $this->matriPolzAuto,
            "domicSiniAuto" => $this->domicSiniAuto,
            "provinSiniAuto" => $this->provinSiniAuto,
            "fechaSiniAuto" => $this->fechaSiniAuto,
            "descripSiniAuto" => $this->descripSiniAuto,
            "fechaPublicacion" => $this->fecha_publicacion
        ];
    }

}
