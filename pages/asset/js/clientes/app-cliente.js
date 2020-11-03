$(document).ready(function () {
    $("#guardar").click(function (e) { 
        e.preventDefault();
        
        if($("#formNombreCliente").val() != "" && $("#formTelefonoCliente").val() != "" && $("#formApellidoCliente").val() != ""
            && $("#formDUICliente").val() != "" && $("#formDireccionCliente").val() != "") {
                
                if($("#formHiddenIDCliente").val() == "") {
                    $.ajax({
                        type: "POST",
                        url: "asset/php/cliente/ajaxAgregar.php",
                        data: {
                            nombre: $("#formNombreCliente").val(),
                            telefono: $("#formTelefonoCliente").val(),
                            apellido: $("#formApellidoCliente").val(),
                            dui: $("#formDUICliente").val(),
                            direccion: $("#formDireccionCliente").val(),
                        },
                        success: function (response) {
                            if(response == -1) {
                                Swal.fire(
                                    'No se pudo agregar el registro',
                                    
                                    'Error'
                                )
                            }
                            else {
                                let html = `<tr>
                                                <td>${response}</td>
                                                <td>${$("#formDUICliente").val()}</td>
                                                <td>${$("#formNombreCliente").val()}</td>
                                                <td>${$("#formApellidoCliente").val()}</td>
                                                <td>${$("#formDireccionCliente").val()}</td>
                                                <td>${$("#formTelefonoCliente").val()}</td>
                                                <td width="200px">
                                                <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="${response}"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
                                                <button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="${response}" nombre-cliente="${$("#formNombreCliente").val()} ${$("#formApellidoCliente").val()}"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
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
                        url: "asset/php/cliente/ajaxModificar.php",
                        data: {
                            nombre: $("#formNombreCliente").val(),
                            telefono: $("#formTelefonoCliente").val(),
                            apellido: $("#formApellidoCliente").val(),
                            dui: $("#formDUICliente").val(),
                            direccion: $("#formDireccionCliente").val(),
                            id_cliente: $("#formHiddenIDCliente").val()
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

                                $(location).attr("href", "listaCliente.php");
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
        resetearModal();
        $("#guardar").val("Modificar");
        
        $.ajax({
            type: "POST",
            url: "asset/php/cliente/ajaxObtenerDatos.php",
            data: {
                id_cliente: $(elemento).attr("tag")
            },
            success: function (response) {
                if(response != -1) {
                    var datos = JSON.parse(response);
    
                    datos.forEach(x => {
                        //para sabe cual id es...
                        $("#formHiddenIDCliente").val(x.id);

                        $("#formNombreCliente").val(x.nombre);
                        $("#formTelefonoCliente").val(x.telefono);
                        $("#formApellidoCliente").val(x.apellido);
                        $("#formDUICliente").val(x.dui);
                        $("#formDireccionCliente").val(x.direccion);
                    });
                }
                else {
                    Swal.fire(
  'Tuvimos un error intente luego',
  '',
  'error'
)
                }
            }
        });
    });

    $(document).on("click", ".eliminar-datos", function () {
        let elemento = $(this)[0];

        swal({
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
          {
            $.ajax({
                type: "POST",
                url: "asset/php/cliente/ajaxBorrarDatos.php",
                data: {
                    id_cliente: $(elemento).attr("tag")
                },
                success: function (response) {
                    if(response != -1) {
                        $(elemento.parentElement.parentElement).remove();

                        
                    }
                    else {
                        Swal.fire(
  'Imposible borrar puede que este cliente cuente con datos',
  '',
  'error'
)
                    }
                }
            });
        }
        }
      }) 
    });

    $("#busq").keyup(function (e) { 
        $.ajax({
            type: "POST",
            url: "asset/php/cliente/ajaxBuscarDatos.php",
            data: {
                query: $("#busq").val()
            },
            success: function (response) {
                $("#actualizarTabla").empty();
                $("#actualizarTabla").html(response);
            }
        });
    });
});

//funciones normales
function resetearModal() {
    $("#guardar").val("Guardar");
    $("#formHiddenIDCliente").val("");

    $("#formNombreCliente").val("");
    $("#formTelefonoCliente").val("");
    $("#formApellidoCliente").val("");
    $("#formDUICliente").val("");
    $("#formDireccionCliente").val("");
}

function validarTextos(e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toLowerCase();
    var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    var especiales = [8, 37, 39, 46];
    var tecla_especial = false;

    for (var i = 0; i < letras.length; i++) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}