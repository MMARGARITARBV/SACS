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

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" type="image/png" href="https://sacs.sextaplanta.com/favicon.png">

        <script src="js/jquery-3.2.1.min.js"></script>


    </head>

    <body>
        <div class="container-fluid">
            <div class="row header">       
                <a href="index.html"><img class="logo center-block" src="img/sacs-white.png" alt="sacs"></a>
            </div>

            <div class="row ">
                <div class=" col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <h1><span class="text-center">Alta Gestor</span></h1>

                    <!--//TIPO DE SINIESTRO-->

                    <br>
                    <div class="dividerLarge"></div>

                    <!-- //AUTOS-->
                    <div>
                        <form method="post" action="siniestro-alta-result.html">
                            <div class="form-group">
                                <label for="contactotelefono">Nombre Gestoría: </label>
                                <input type="text" class="form-control" id="contactotelefono" name="contactotelefono">
                            </div>
                            
                            <div class="form-group">
                                <label for="asegurado">Titular: </label>
                                <input type="text" class="form-control" id="asegurado" name="asegurado" />
                            <div class="form-group">
                                <label for="contactotelefono">Teléfono de contacto *</label>
                                <input type="text" class="form-control" id="contactotelefono" name="contactotelefono">
                            </div>
                                <div>
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
            </div>
            <div class="footer"><p><strong>SACS</strong></p> 
                <p class="footer-text">Servicios auxiliares para corredores de seguros</p>
            </div>
            <script src=js/bootstrap.js></script>
        </div>
    </body>
</html>

