$(document).ready(function () {
    $("#guardar").click(function (e) { 
        e.preventDefault();
        
        if($("#formNombreEmp").val() != "" && $("#formApellidoEmp").val() != "" && $("#formTelefonoEmp").val() != ""
            && $("#formDUIEmp").val() != "" && $("#formDireccionEmp").val() != "" && $("#formHoraInicioEmp").val() != "" & $("#formHoraFinEmp").val() != "") {
                var dias_laborales = "";

                dias_laborales = obtenerDia("#formDiaLunes");
                dias_laborales += obtenerDia("#formDiaMartes");
                dias_laborales += obtenerDia("#formDiaMiercoles");
                dias_laborales += obtenerDia("#formDiaJueves");
                dias_laborales += obtenerDia("#formDiaViernes");
                dias_laborales += obtenerDia("#formDiaSabado");
                dias_laborales += obtenerDia("#formDiaDomingo");

                if($("#formHiddenIDEmp").val() == "" && $("#formHiddenIDHorario").val() == "") {
                    $.ajax({
                        type: "POST",
                        url: "asset/php/empleado/ajaxAgregar.php",
                        data: {
                            nombre: $("#formNombreEmp").val(),
                            apellido: $("#formApellidoEmp").val(),
                            telefono: $("#formTelefonoEmp").val(),
                            dui: $("#formDUIEmp").val(),
                            direccion: $("#formDireccionEmp").val(),
                            cargo: $("#cargo").val(),
                            hora_inicio: $("#formHoraInicioEmp").val(),
                            hora_fin: $("#formHoraFinEmp").val(),
                            dias_laborales: dias_laborales
                        },
                        success: function (response) {
                            if(response == -1) {
                                Swal.fire(
                                    'No se pudo agregar el registro',
                                    
                                    'Error'
                                )
                            }
                            else {
                                let datos = response.split(",");

                                let html = `<tr>
                                                <td>${datos[0]}</td>
                                                <td>${$("#formDUIEmp").val()}</td>
                                                <td>${$("#formNombreEmp").val()}</td>
                                                <td>${$("#formApellidoEmp").val()}</td>
                                                <td>${$("#formDireccionEmp").val()}</td>
                                                <td>${$("#formTelefonoEmp").val()}</td>
                                                <td width="200px">
                                                <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="${datos[0]},${datos[1]}"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
                                                <button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="${datos[0]},${datos[1]}" name-emp="${$("#formNombreEmp").val()} ${$("#formApellidoEmp").val()}"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                                                </td>
                                            </tr>`;
                                $("#actualizarTabla").append(html);
                                $("#modalNuevo").modal("hide");

                                Swal.fire(
                                'Registro agregado con exito',
                                 '',
                                'success'
                                )
                            }
                        }
                    });
                }
                else {
                    $.ajax({
                        type: "POST",
                        url: "asset/php/empleado/ajaxModificar.php",
                        data: {
                            nombre: $("#formNombreEmp").val(),
                            apellido: $("#formApellidoEmp").val(),
                            telefono: $("#formTelefonoEmp").val(),
                            dui: $("#formDUIEmp").val(),
                            direccion: $("#formDireccionEmp").val(),
                            cargo: $("#cargo").val(),
                            hora_inicio: $("#formHoraInicioEmp").val(),
                            hora_fin: $("#formHoraFinEmp").val(),
                            dias_laborales: dias_laborales,
                            id_emp: $("#formHiddenIDEmp").val(),
                            id_hora: $("#formHiddenIDHorario").val()
                        },
                        success: function (response) {
                            if(response == -1) {
                                Swal.fire(
  'Tuvimos un error intente luego',
  '',
  'error'
)
                            }
                            else {

                                Swal.fire(
                                'Registro modificado con exito',
                                 '',
                                'success'
                                )

                                $(location).attr("href", "listaEmpleados.php");
                            }
                        }
                    });
                }
        }
        else {
            Swal.fire(
  'Los campos no deben estar vacios',
  '',
  'error'
)
        }
    });

    $(document).on("click", ".obtener-datos", function () {
        var elemento = $(this)[0];
        let valores = $(elemento).attr("tag").split(",");
        resetearModal();
        $("#guardar").val("Modificar");
        
        $.ajax({
            type: "POST",
            url: "asset/php/empleado/ajaxObtenerDatos.php",
            data: {
                id_emp: valores[0]
            },
            success: function (response) {
                var datos = JSON.parse(response);
    
                datos.forEach(x => {
                    //para sabe cual id es...
                    $("#formHiddenIDEmp").val(valores[0]);
                    $("#formHiddenIDHorario").val(valores[1]);

                    $("#formNombreEmp").val(x.nombre);
                    $("#formApellidoEmp").val(x.apellido);
                    $("#formTelefonoEmp").val(x.telefono);
                    $("#formDUIEmp").val(x.dui);
                    $("#formDireccionEmp").val(x.direccion);
                    $("#cargo").val(x.cargo);

                    //convertir fechas
                    let valores_inicio = x.hora_inicio.replace(/ /g, ":").split(":");
                    let hora_inicio = valores_inicio[2] == "pm" || valores_inicio[2] == "p.m." ? (parseInt(valores_inicio[0]) + 12) : valores_inicio[0];
                    $("#formHoraInicioEmp").val(hora_inicio+":"+valores_inicio[1]);

                    let valores_fin = x.hora_fin.replace(/ /g, ":").split(":");
                    let hora_fin = valores_fin[2] == "pm" || valores_fin[2] == "p.m." ? (parseInt(valores_fin[0]) + 12) : valores_fin[0];
                    $("#formHoraFinEmp").val(hora_fin+":"+valores_fin[1]);

                    //para obtener que dia...
                    switch(x.dia_laboral) {
                        case "1":
                            $("#formDiaLunes").prop("checked", true);
                            break;
                        case "2":
                            $("#formDiaMartes").prop("checked", true);
                            break;
                        case "3":
                            $("#formDiaMiercoles").prop("checked", true);
                            break;
                        case "4":
                            $("#formDiaJueves").prop("checked", true);
                            break;
                        case "5":
                            $("#formDiaViernes").prop("checked", true);
                            break;
                        case "6":
                            $("#formDiaSabado").prop("checked", true);
                            break;
                        case "7":
                            $("#formDiaDomingo").prop("checked", true);
                            break;
                    }
                });
            }
        });
    });



    $(document).on("click", ".eliminar-datos", function () {
        let elemento = $(this)[0];
        let valores = $(elemento).attr("tag").split(",");

        if(swal({
        title: "¿Seguro quiere eliminar esta fila?",
        text: "No podrás deshacer este paso.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#5CBDD9",
        cancelButtonColor: "#D9534F",
        confirmButtonText: "No",
        cancelButtonText: "Si",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true
      }).then(function(isConfirm) {
        if(isConfirm.value!=true) {
          //codigo a realizar
        }
      })) {
            $.ajax({
                type: "POST",
                url: "asset/php/empleado/ajaxBorrarDatos.php",
                data: {
                    id_emp: valores[0],
                    id_hora: valores[1]
                },
                success: function (response) {
                    if(response != -1) {
                        $(elemento.parentElement.parentElement).remove();
                        
                    }
                    else {
                        Swal.fire(
  'Imposible borrar es posible que este empleado cuente con datos',
  '',
  'error'
)
                    }
                }
            });
        }
    });
});

//funciones normales
function resetearModal() {
    $("#guardar").val("Guardar");
    $("#formHiddenIDEmp").val("");
    $("#formHiddenIDHorario").val("");

    $("#formNombreEmp").val("");
    $("#formApellidoEmp").val("");
    $("#formTelefonoEmp").val("");
    $("#formDUIEmp").val("");
    $("#formDireccionEmp").val("");
    $("#cargo").val("");
    $("#formHoraInicioEmp").val("");
    $("#formHoraFinEmp").val("");
    $("#formHoraFinEmp").val("");

    //dias
    $("#formDiaLunes").prop("checked", false);
    $("#formDiaMartes").prop("checked", false);
    $("#formDiaMiercoles").prop("checked", false);
    $("#formDiaJueves").prop("checked", false);
    $("#formDiaViernes").prop("checked", false);
    $("#formDiaSabado").prop("checked", false);
    $("#formDiaDomingo").prop("checked", false);
}

function obtenerDia(elemento) {
    return $(elemento).prop("checked") ? $(elemento).val()+"," : "";
}

function validarTextos(e) {
      var key = e.keyCode || e.which;
      var tecla = String.fromCharCode(key).toLowerCase();
      var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      var especiales = [8, 37, 39, 46];
      var tecla_especial = false;

      for(var i = 0; i < letras.length; i++) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
      if(letras.indexOf(tecla) == -1 && !tecla_especial){
           return false;
      }
    }