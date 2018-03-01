/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// MOSTRAR MAPA y GEOLOCALIZACIÓN

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

// MOSTRAR TABLA GESTORIAS ASOCIADAS 

$("#mostrarGestorias").click(function () {
            $.ajax({
                url: "gestor.php", success: function (result) {
                    $("#tablaGestorias").html(result);
                }
            });
        });