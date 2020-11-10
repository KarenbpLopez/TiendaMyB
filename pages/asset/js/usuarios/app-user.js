$(document).ready(function () {
    $("#guardar").click(function (e) { 
        e.preventDefault();
        
        if($("#formIDEmp").val() != "" && $("#formNombreUsuario").val() != "" && $("#formCorreoUsuario").val() != ""
            && $("#formContraUsuario").val() != "" && $("#formReContraUsuario").val() != "" && $("#formContraUsuario").val() == $("#formReContraUsuario").val() && $("#formContraUsuario").val().replace(/ /g,"").length > 6 && $("#formReContraUsuario").val().replace(/ /g,"").length > 6) {
                if($("#formHiddenIDUsuario").val() == "") {
                    $.ajax({
                        type: "POST",
                        url: "asset/php/usuario/ajaxAgregar.php",
                        data: {
                            usuario: $("#formNombreUsuario").val(),
                            clave: $("#formContraUsuario").val(),
                           // nivel: 0,
                            empleado: $("#formIDEmp").val(),
                            correo: $("#formCorreoUsuario").val()
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
                                                <td>${$("#formNombreUsuario").val()}</td>
                                                <td>${$("#formBuscarEmp").val()}</td>
                                                <td>${$("#formCorreoUsuario").val()}</td>
                                                <td width="200px">
                                                <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="${response}"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
                
                                                <button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="${response}" name-emp="${$("#formBuscarEmp").val()}"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
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
                        url: "asset/php/usuario/ajaxModificar.php",
                        data: {
                            usuario: $("#formNombreUsuario").val(),
                            clave: $("#formContraUsuario").val(),
                            nivel: 0,
                            correo: $("#formCorreoUsuario").val(),
                            id_user: $("#formHiddenIDUsuario").val()
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

                                $(location).attr("href", "listaUsuarios.php");
                            }
                        }
                    });
                }
        }
        else {
            if($("#formContraUsuario").val().replace(/ /g,"").length <= 6 || $("#formReContraUsuario").val().replace(/ /g,"").length <= 6) {
                Swal.fire(
  'clave menor a 6 caracteres',
  '',
  'error'
)
            }
            else {
                Swal.fire(
  'Los campos no deben estar vacios',
  '',
  'error'
)
            }
        }
    });

    $(document).on("click", ".obtener-datos", function () {
        var elemento = $(this)[0];
        resetearModal();
        $("#guardar").val("Modificar");
        
        $.ajax({
            type: "POST",
            url: "asset/php/usuario/ajaxObtenerDatos.php",
            data: {
                id_user: $(elemento).attr("tag")
            },
            success: function (response) {
                if(response != -1) {
                    var datos = JSON.parse(response);
    
                    datos.forEach(x => {
                        //para sabe cual id es...
                        $("#formHiddenIDUsuario").val(x.id);
                        $("#formIDEmp").val(x.id_emp);
                        $("#formBuscarEmp").val(x.nombre_emp);
                        $("#formNombreUsuario").val(x.usuario);
                        $("#formCorreoUsuario").val(x.correo);

                        $("#formBuscarEmp").prop('disabled', true);
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
                url: "asset/php/usuario/ajaxBorrarDatos.php",
                data: {
                    id_user: $(elemento).attr("tag")
                },
                success: function (response) {
                    if(response != -1) {
                        $(elemento.parentElement.parentElement).remove();
                    }
                    else {
                       Swal.fire(
  'Imposible borrar puede que este usuario cuente con datos',
  '',
  'error'
)
                    }
                }
            });
        }
    });
    $("#busq").keyup(function (e) { 
        $.ajax({
            type: "POST",
            url: "asset/php/usuario/ajaxBuscarDatos.php",
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
    $("#formHiddenIDUsuario").val("");

    $("#formIDEmp").val("");
    $("#formBuscarEmp").val("");
    $("#formNombreUsuario").val("");
    $("#formCorreoUsuario").val("");
    $("#formContraUsuario").val("");
    $("#formReContraUsuario").val("");

    $("#formBuscarEmp").prop('disabled', false);
}

document.querySelector('input[list]').addEventListener('input', function(e) {
    var input = e.target,
        list = input.getAttribute('list'),
        options = document.querySelectorAll('#' + list + ' option'),
        hiddenInput = document.getElementById("formIDEmp"),
        inputValue = input.value;

    hiddenInput.value = inputValue;

    for(var i = 0; i < options.length; i++) {
        var option = options[i];

        if(option.innerText === inputValue) {
            hiddenInput.value = option.getAttribute('data-value');
            break;
        }
    }
});