<!DOCTYPE html>

<head>
    <title>sacs | servicios auxiliares para corredores de seguros</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="https://sacs.sextaplanta.com/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   
    <style>
        
        #map {
            width: 900px;
            height: 250px;
        }
       
    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="row header">       
            <a href="index.php"><img class="logo center-block" src="img/sacs-white.png" alt="sacs"></a>
            <div class="pull-right">
                <form action="administracion/View/login.php" method="post">
                    <input type="hidden" name="accion" value="adm">                          
                    <input id="adm" class="btn btn-info botonAdmin"  type="submit" value="ADMINISTRACION">
                </form>
            </div>
        </div>

        <div class="row ">
            <div class="col-sm-4 col-md-3 ">
                <div class="sidebar-nav ">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse ">
                            <ul class="nav navbar-nav" id="sidenav01">
                                <li><label class="select-li"> Alta Gestor </label>
                                    <div class="">
                                        <ul class="nav ">
                                            <li><a  class="select-li-child" href="#">Nuevo Gestor</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><label class="select-li"> Declaracion de siniestro  </label>
                                    <div class="">
                                        <ul class="nav ">
                                            <li><a  class="select-li-child" href="#">Autos</a></li>
                                            <li><a class="select-li-child" href="#">Diversos R.C</a></li>
                                            <li><a class="select-li-child" href="#">Diversos PYME</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><label class="select-li">Gestion de siniestros  </label>
                                    <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 col-lg-12 col-lg-offset-0">
                                        <ul class="nav">
                                            <li><a class="select-li-child-default" href="img/resumengeneral1.jpg">Informe General</a></li>
                                            <li><a class="select-li-child" id="mostrarGestorias">Gestorias Asociadas</a></li>
                                            <li><a class="select-li-child" href="#"> 40 dias</a></li>
                                            <li><a class="select-li-child" href="#">Cerrados en periodo</a></li>
                                            <li><a class="select-li-child" href="#"> 40 dias</a></li>
                                            <li><a class="select-li-child" href="#">RC/Pyme/Robo/Incendio </a></li>
                                            <li><a class="select-li-child" href="#">Siniestros VIP</a></li>
                                            <li><a class="select-li-child" href="img/informeDeGestion.png">Gestion de disconformidad </a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-9 ">
                <div id="map" class="container page-header"> </div>

                <script>
                    var map;
                    function initMap() {
                        var oficsacs = {lat: 36.718982, lng: -4.419879};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 15,
                            center: oficsacs
                        });
                        var marker = new google.maps.Marker({
                            position: oficsacs,
                            map: map
                        });
                    }
                </script>
                <div class="container page-header">  
                    <table id="tablaGestorias" class="table table-striped">
                    </table>
                </div>
            </div>
        </div>

        <div class="footer"><p><strong>SACS</strong></p> 
            <p class="footer-text">Servicios auxiliares para corredores de seguros</p>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src=js/bootstrap.min.js></script>


    </div>

<script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA0L6InYkKSiGqSqTmoJrViwYOePA8_Cs&callback=initMap">
    </script>

    <script>

        $("#mostrarGestorias").click(function () {
            $.ajax({
                url: "gestor.php", success: function (result) {
                    $("#tablaGestorias").html(result);
                }
            });
        });

    </script>

</body>
</html>

