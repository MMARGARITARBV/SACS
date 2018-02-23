var datosJson;
var paginaActual = 0;
var validatorAlta;
var validatorModificacion;

$(document).ready(function () {
    $("tbody").html("");
    $.ajax({
        type: "post",
        url: "../Controller/peticiones.php",
        data: {accion: "listado"},
        dataType: "json",
        success: function (data) {

            preparaJson(data);
        }
    });
    // ALTA O INSERCION//////////////////////////////////////////

    $(document).on("click", "button#nuevoAuto", function () {
        alta.dialog("open");
    });
    // ABRE LA VENTANA MODAL ALTA
    alta = $("#alta").dialog({
        autoOpen: false,
        width: 450,
        modal: true,
        buttons: {
            Aceptar: function () {
                if ($('#formularioAlta').valid()) {
                    $.ajax({
                        type: "post",
                        url: "../Controller/peticiones.php",
                        data: {
                            accion: "insertar",
                            idAuto: $("#idAltaAuto").val(),
                            titPolzAuto: $("#altaAsegurado").val(),
                            comAsegAuto: $("#altaCompania").val(),
                            numPolzAuto: $("#altaPoliza").val(),
                            matriPolzAuto: $("#altaMatricula").val(),
                            domicSiniAuto: $("#altadomSiniestro").val(),
                            provinSiniAuto: $("#altaProvSiniestro").val(),
                            fechaSiniAuto: $("#altaFechaSiniestro").val(),
                            descripSiniAuto: $("#altaDescripSiniestro").val()
                        },
                        dataType: "json",
                        success: function (response) {
                            preparaJson(response);
                            console.log("Siniestro insertado correctamente.");
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log("No se ha podido insertar el Siniestro. Estado: " + xhr.status + " - ERROR: " + thrownError);
                        }
                    });
                    cancelarAlta();
                    validatorAlta.resetForm(); // VALIDADOR
                }
            },
            Cancelar: function () {
                cancelarAlta();
                validatorAlta.resetForm();
            }
        }
    });
    ////// BAJA O BORRADO DE SINIESTROS ///// 


    var idBaja;
    var botonEliminar;
    $(document).on("click", "button.borrado", function () {
        idBaja = $(this).data("auto-code");
        botonEliminar = $(this);
        baja.dialog("open");
    });
    baja = $("#baja").dialog({
        autoOpen: false,
        height: 200,
        width: 450,
        modal: true,
        buttons: {
            Aceptar: function () {
                $.ajax({
                    type: "post",
                    url: "../Controller/peticiones.php",
                    data: {
                        accion: "eliminar",
                        idAuto: idBaja
                    },
                    dataType: "json",
                    success: function (response) {
                        botonEliminar.parent().parent().find("td, span, button").fadeOut(800, function () {

                            preparaJson(response);
                            console.log("Siniestro borrado correctamente.");
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log("No se ha podido borrar el siniestro. Estado: " + xhr.status + " - ERROR: " + thrownError);
                    }
                });
                baja.dialog("close");
            },
            Cancelar: function () {
                baja.dialog("close");
            }
        }
    });
    ////// MODIFICACION DE SINIESTROS///// 

    var idAntiguo;
    $(document).on("click", "button.modificar", function () {
        idModificar = $(this).data("auto-code");
        $.ajax({
            type: "post",
            url: "../Controller/peticiones.php",
            data: {
                accion: "detalleAuto",
                idAuto: idModificar
            },
            dataType: "json",
            success: function (response) {
                idAntiguo = response.idAuto;
                modalModificacion(response);
                console.log("Rellenando modal de modificacion con los datos encontrados.");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("No se ha podido encontrar ningun siniestro con éste código.");
            }
        });
        modificar.dialog("open");
    });
    modificar = $("#modificar").dialog({
        autoOpen: false,
        width: 450,
        modal: true,
        buttons: {
            Aceptar: function () {
                $.ajax({
                    type: "post",
                    url: "../Controller/peticiones.php",
                    data: {
                        accion: "actualizar",
                        idAuto: $("#modificacionIdAuto").val(),
                        titPolzAuto: $("#modificacionAsegurado").val(),
                        comAsegAuto: $("#modificacionCompania").val(),
                        numPolzAuto: $("#modificacionPoliza").val(),
                        matriPolzAuto: $("#modificacionMatricula").val(),
                        domicSiniAuto: $("#modificacionDomSiniestro").val(),
                        provinSiniAuto: $("#modificacionProvincia").val(),
                        fechaSiniAuto: $("#modificacionFechaSiniestro").val(),
                        descripSiniAuto: $("#modificacionDescripSiniestro").val(),
                        idAntiguo: idAntiguo
                    },
                    dataType: "json",
                    success: function (response) {

                        preparaJson(response);
                        console.log("Siniestro actualizado correctamente.");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log("No se ha podido actualizar el siniestro. Estado: " + xhr.status + " - ERROR: " + thrownError);
                    }
                });
                modificar.dialog("close");
                validatorModificacion.resetForm();
            },
            Cancelar: function () {
                modificar.dialog("close");
                validatorModificacion.resetForm();
            }
        }
    });
    /////////// DATEPICKER ////////////////////////////////

    $("#altaFechaSiniestro, #modificacionFechaSiniestro").datepicker({

// FORMATO FECHA DESPUES DE HACER CLICK EL USUARIO //
        dateFormat: "yy/mm/dd"
    });
    
    
    
    var abajoArriba;
    var nombreColumnaAnterior;
    $(document).on("click", "thead th.columna", function () {
        var columna = $(this).data("column");
        if (nombreColumnaAnterior == columna) {
            abajoArriba = false;
            nombreColumnaAnterior = "";
        } else {
            abajoArriba = true;
            nombreColumnaAnterior = columna;
        }
        $.ajax({
            type: "post",
            url: "../Controller/peticiones.php",
            data: {
                accion: "ordenaAuto",
                columna: columna,
                orden: abajoArriba
            },
            dataType: "json",
            success: function (response) {
                preparaJson(response);
                console.log("Ordenado correctamente.");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("No se ha podido establecer el orden deseado.");
            }
        });
    });
    
    
    var reglasValidacionAlta = {
        rules: {
            idAuto: {
                required: true,
                "remote": {
                    type: 'post',
                    url: '../Controller/peticiones.php',
                    data: {
                        accion: "validar",
                        idAuto: function () {
                            // COMPRUEBA SI ESTÁ VACIO O NO  //
                            if ($("#idAltaAuto").val() == "") {
                                return $("#idAltaAuto").val();
                            } else {
                                return $("#idAltaAuto").val();
                            }
                        }
                    }
                }
            },

            asegurado: "required",
            compania: "required",
            poliza: "required",
            matricula: "required",
            docSiniestro: "required",
            proSiniestro: "required",
            fechSiniestro: "required",
            descSiniestro: "required"

        },
        messages: {
            idAuto: "Introduce un id válido",
            asegurado: "Introduce un asegurado válido",
            compania: "Introduce una compañia válida",
            poliza: "Introduce una póliza válida",
            matricula: "Introduce una matrícula válida",
            docSiniestro: "Introduce un domicilio de siniestro válido",
            proSiniestro: "Introduce una provincia válida",
            fechSiniestro: "Introduce una fecha de siniestro válida",
            descSiniestro: "Introduce una descripción de Siniestro válida"
        }
    };

    var reglasValidacionModificacion = {
        rules: {
            idAuto: "required",
            asegurado: "required",
            compania: "required",
            poliza: "required",
            matricula: "required",
            docSiniestro: "required",
            proSiniestro: "required",
            fechSiniestro: "required",
            descSiniestro: "required"

        },
        messages: {
            idAuto: "Introduce un código válido",
            asegurado: "Introduce un asegurado válida",
            compania: "Introduce una compañia válida",
            poliza: "Introduce una poliza válida",
            matricula: "Introduce una matrícula válida",
            docSiniestro: "Introduce una dirección de siniestro válida",
            proSiniestro: "Introduce una provincia válida, por ejemplo: Malaga",
            fechSiniestro: "Introduce una fecha válida del siniestro",
            descSiniestro: "Introduce una descripción correcta"
        }
    };
    validatorAlta = $("#formularioAlta").validate(reglasValidacionAlta);
    validatorModificacion = $("#formularioModificacion").validate(reglasValidacionModificacion);
    
    $(document).on("click", "#selectorNElementos option", function () {
        paginaActual = 0;
        preparaJson(datosJson);
    });
    $(document).on("click", "#paginaAnterior", function () {
        if (paginaActual > 0) {
            paginaActual -= 1;
        }
        preparaJson(datosJson);
    });
    $(document).on("click", "#paginaSiguiente", function () {
        var nElementos = parseInt($("#selectorNElementos").prop("value"));
        var nPaginas = datosJson.length / nElementos;
        // Se resta 1 al numero de paginas para comepensar que pagina actual comienza en 0
        if (nPaginas - 1 > paginaActual) {
            paginaActual++;
        }

        preparaJson(datosJson);
    });
    // HACER CLICK EN UN ELEMENTO DEL AUTOCOMPLETE

    $(document).on("click", "div.ui-menu-item-wrapper", function () {
        var valor = $(this).text();
        console.log("REALIZANDO CONSULTA CON COMPAÑIA " + valor);
        $.ajax({
            type: "post",
            url: "../Controller/peticiones.php",
            data: {
                accion: "filtrarCompania",
                compania: valor
            },
            dataType: "json",
            success: function (response) {
                preparaJson(response);
            }
        });
        $("#autocomplete").blur();
    });
    //////////////////////////////////////////////////////////////////////
});
function preparaJson(response) {
    datosJson = response;
    var jsonTratado = [];
    var nElementos = parseInt($("#selectorNElementos").prop("value"));
    console.log("Origen de datos tratados: ");
    console.log(response);
    for (var i = 0; i < nElementos; i++) {
        console.log("Indice: " + (paginaActual * nElementos + i));
        jsonTratado.push(response[paginaActual * nElementos + i]);
    }

    pintaTabla(jsonTratado);
}


function pintaTabla(response) {

    $("tbody").html("");
    
    var arrayActualizado = actualizarArrayCompanias();
    
    $("#autocomplete").autocomplete({
        source: function (request, response) {
            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(arrayActualizado, function (item) {
                return matcher.test(item);
            }));
        },
        change: function (event, ui) {
            if ($("#autocomplete").val() == "") {
                $.ajax({
                    type: "post",
                    url: "../Controller/peticiones.php",
                    data: {
                        accion: "listado"
                    },
                    dataType: "json",
                    success: function (response) {
                        preparaJson(response);
                    }
                });
            }
        }
    });
    // var numeroFilas = 0;

    $.each(response, function (indexInArray, valueOfElement) {
        $("tbody").append("<tr>"
                + "<td>" + response[indexInArray].idAuto + "</td>"
                + "<td>" + response[indexInArray].titPolzAuto + "</td>"
                + "<td>" + response[indexInArray].comAsegAuto + "</td>"
                + "<td>" + response[indexInArray].numPolzAuto + "</td>"
                + "<td>" + response[indexInArray].matriPolzAuto + "</td>"
                + "<td>" + response[indexInArray].domicSiniAuto + "</td>"
                + "<td>" + response[indexInArray].provinSiniAuto + "</td>"
                + "<td>" + response[indexInArray].fechaSiniAuto + "</td>"
                + "<td>" + response[indexInArray].descripSiniAuto + "</td>"
                + "<td>" + response[indexInArray].fechaPublicacion + "</td>"
                + "<td><button data-auto-code='" + response[indexInArray].idAuto + "' class='borrado btn btn-danger'>"
                + "<span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Eliminar</button>"
                + "<td><button data-auto-code='" + response[indexInArray].idAuto + "' class='modificar btn btn-warning'>"
                + "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Modificar</button></td></tr>");
        
        console.log("idAuto: " + response[indexInArray].idAuto);
        // numeroFilas++;

    });
}


function modalModificacion(response) {
    $("#modificacionIdAuto").val(response.idAuto);
    $("#modificacionAsegurado").val(response.titPolzAuto);
    $("#modificacionCompania").val(response.comAsegAuto);
    $("#modificacionPoliza").val(response.numPolzAuto);
    $("#modificacionMatricula").val(response.matriPolzAuto);
    $("#modificacionDomSiniestro").val(response.domicSiniAuto);
    $("#modificacionProvincia").val(response.provinSiniAuto);
    $("#modificacionFechaSiniestro").val(response.fechaSiniAuto);
    $("#modificacionDescripSiniestro").val(response.descripSiniAuto);
}


function cancelarAlta() {

// CERRAR MODAL //
    alta.dialog("close");
    // LIMPIEZA DE FORMULARIO MODAL //

    $("#idAltaAuto").val("");
    $("#altaAsegurado").val("");
    $("#altaCompania").val("");
    $("#altaPoliza").val("");
    $("#altaMatricula").val("");
    $("#altadomSiniestro").val("");
    $("#altaProvSiniestro").val("");
    $("#altaFechaSiniestro").val("");
    $("#altaDescripSiniestro").val("");
}

// A 

function actualizarArrayCompanias() {
    arrayCompanias = [];
    $.each(datosJson, function (indexInArray, valueOfElement) {
        if ($.inArray(datosJson[indexInArray].comAsegAuto, arrayCompanias) == -1) {
            arrayCompanias.push(datosJson[indexInArray].comAsegAuto);
        }
    });
    return arrayCompanias;
}


