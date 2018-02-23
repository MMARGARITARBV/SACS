<?php ?>
/<!DOCTYPE html>
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

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" type="image/png" href="https://sacs.sextaplanta.com/favicon.png">

        <script src="js/jquery-3.2.1.min.js"></script>

        <script>

            //FUNCION SELECCIONAR Y REDIRIGIR MENÚ: TIPO DE SINIESTRO 

            $(document).ready(function () {
                $('select#tipoDeSiniestro').change(function () {
                    window.location = $(this).val();
                });
            });

            //FUNCION OCULTAR DATOS DEL SINIESTRO 

            $(document).ready(function () {
                $('.fantasma').change(function () {
                    if (!$(this).prop('checked')) {
                        $('.ocultar').show();
                    } else {
                        $('.ocultar').hide();
                    }
                });
            });
        </script>

    </head>

    <body>
        <div class="container-fluid">
            <div class="row header">       
                <a href="index.php"><img class="logo center-block" src="img/sacs-white.png" alt="sacs"></a>
            </div>

            <div class="row ">
                <div class=" col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <h1><span class="text-center">Declaración de siniestro</span></h1>

                    <!--//TIPO DE SINIESTRO-->
                    <div>
                        <label>Tipo de siniestro:</label>
                        <select class="select-style" name="tipoDeSiniestro" id="tipoDeSiniestro">
                            <option value="auto.php">Autos</option> 
                            <option value="#">Diversos</option>

                        </select>
                    </div>
                    <br>
                    <div class="dividerLarge"></div>

                    <!-- //AUTOS-->
                    <div>
                        <h1>Autos</h1>
                        <h2>Datos del asegurado / póliza</h2>
                        <div class="divider"></div>

                        <form method="post" action="index.php">
                            <!--                            <div class="form-group">
                                                            <label for="contactotelefono">Teléfono de contacto *</label>
                                                            <input type="text" class="form-control" id="contactotelefono" name="contactotelefono">
                                                        </div>-->
                            <!--                            <div>
                                                            <label>Compañía * </label>
                                                            <select class="select-style" name="Seleccionar">
                                                                <option value="">- Seleccionar -</option>
                                                                <option value="Mapfre">Mapfre</option>
                                                                <option value="Liberty">Liberty</option>
                                                                <option value="Zurich">Zurich</option>
                                                                <option value="Linea Directa">Linea Directa</option>
                                                                <option value="Generali">Generali</option>
                                                                <option value="Ocaso">Ocaso</option>
                                                                <option value="Allianz">Allianz</option>
                                                                <option value="DKV">DKV</option>
                                                                <option value="Pelayo">Pelayo</option>
                                                                <option value="Fiact">Fiact</option>
                                                                <option value="Axa">Axa</option>
                                                            </select>
                                                        </div>-->
                            <div class="form-group">
                                <label for="asegurado">Asegurado: </label>
                                <input type="text" class="form-control" id="asegurado" name="asegurado" readonly="" />
                            </div>
                            <div class="form-group">
                                <label for="compania">Compañia: </label>
                                <input type="text" class="form-control" id="compania" name="compania" readonly="" />
                            </div>

                            <div class="form-group">
                                <label for="numPoliza">Número de póliza </label>
                                <input type="text" class="form-control" id="numPoliza" name="numPoliza" readonly="" />
                            </div>
                            <div class="form-group">
                                <label for="matricula">Matrícula vehículo</label>
                                <input type="text" class="form-control" id="matricula" name="matricula" readonly="" />
                            </div>

                            <!--//DATOS DEL SINIESTRO-->

                            <h2>Datos del siniestro</h2>
                            <div class="divider"></div>

                            <!--                            <div class="checkbox" >
                                                            <label>
                                                                <input type="checkbox" name="checkaAdjuntaDAA" class="fantasma" > 
                                                                Se adjunta declaración Amistosa de Accidente(DAA)
                                                            </label>
                                                        </div>-->
                            <div class="ocultar">
                                <div class="form-group">
                                    <label for="domicilioSiniestro">Domicilio del siniestro </label>
                                    <input type="text" class="form-control" id="domicilioSiniestro" name="domicilioSiniestro" readonly="" />
                                </div>

                                <!--                                <div>
                                                                    <label>Provincia </label>
                                                                    <select class="select-style" name="Seleccionar">
                                                                        <option value="">- Seleccionar -</option>
                                                                        <option value="malaga">Málaga</option>
                                                                        <option value="jaen">Jaén</option>
                                                                        <option value="cordoba">Córdoba</option>
                                                                        <option value="granada">Granada</option>
                                                                        <option value="cadiz">Cádiz</option>
                                                                        <option value="huelva">Huelva</option>
                                                                        <option value="sevilla">Sevilla</option>
                                                                        <option value="almeria">Almería</option>
                                                                    </select>
                                                                </div>-->
                                <div class="form-group">
                                    <label for="provinciaSiniestro">Provincia del Siniestro </label>
                                    <input type="text" class="form-control" id="provinciaSiniestro" name="provinciaSiniestro" readonly="" />
                                </div>
                            </div>

                            <!--                            <div class="checkbox" >
                                                            <label>
                                                                <input type="checkbox" name="asegurado_resto_info" class="fantasma" > 
                                                                Solicitar al asegurado el resto de la información por teléfono
                                                            </label>
                                                        </div>-->

                            <div class="ocultar">
                                <div class="form-group">
                                    <label for="fechasiniestro">Fecha Siniestro </label>
                                    <input type="date" class="form-control" id="fechasiniestro" name="fechasiniestro" readonly="" />
                                </div>
                                <div class="form-group">
                                    <label for="descripcionSiniestro">Descripción del siniestro </label>
                                    <textarea name="descripcionSiniestro" class="form-control" id="descripcionSiniestro" cols="32" readonly="" ></textarea>
                                </div>

                                <!--                                <div class="checkbox" >
                                                                    <label>
                                                                        <input type="checkbox" name="lesionado" id="lesionado" > 
                                                                        Existen lesionados
                                                                    </label>
                                                                </div>
                                
                                                                                                //CHECK DISABLED
                                
                                                                <div class="checkbox" >
                                                                    <label>
                                                                        <input type="checkbox" name="interPol" id="interPol"> 
                                                                        Ha intervenido la Policía Local / Guardia Civil
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox" >
                                                                    <label>
                                                                        <input type="checkbox" name="AsegVip" id="AsegVip" > 
                                                                        Asegurado VIP
                                                                    </label>
                                                                </div>-->
                            </div>

                            <div  class=" col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 btn-block">
                                    <button name="submit" type="submit" >Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer"><p><strong>SACS</strong></p> 
                <p class="footer-text">Servicios auxiliares para corredores de seguros</p>
            </div>
            <script src=js/bootstrap.js></script>
        </div>
    </body>
</html>


