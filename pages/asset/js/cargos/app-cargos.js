$(document).ready(function () {
    $("#guardar").click(function (e) { 
        e.preventDefault();
        
        if($("#formNombreCargo").val() != "" && $("#formSalarioCargo").val() != "" && parseFloat($("#formSalarioCargo").val()) > 0) {
                if($("#formHiddenIDCargo").val() == "") {
                    $.ajax({
                        type: "POST",
                        url: "asset/php/cargo/ajaxAgregar.php",
                        data: {
                            cargo: $("#formNombreCargo").val(),
                            salario: $("#formSalarioCargo").val()
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
                                                <td>${$("#formNombreCargo").val()}</td>
                                                <td>$ ${$("#formSalarioCargo").val()}</td>
                                                <td width="200px">
                                                <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="${response}"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
                                                <button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="${response}" nombre-cargo="${$("#formNombreCargo").val()}"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
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
                        url: "asset/php/cargo/ajaxModificar.php",
                        data: {
                            cargo: $("#formNombreCargo").val(),
                            salario: $("#formSalarioCargo").val(),
                            id_cargo: $("#formHiddenIDCargo").val()
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
                                $(location).attr("href", "listaCargos.php");
                            }
                        }
                    });
                }
        }
        else {
            if(parseFloat($("#formSalarioCargo").val()) <= 0) {
                alert("El salario no puede ser negativo");
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
            url: "asset/php/cargo/ajaxObtenerDatos.php",
            data: {
                id_cargo: $(elemento).attr("tag")
            },
            success: function (response) {
                if(response != -1) {
                    var datos = JSON.parse(response);
    
                    datos.forEach(x => {
                        //para sabe cual id es...
                        $("#formHiddenIDCargo").val(x.id);
                        $("#formNombreCargo").val(x.cargo);
                        $("#formSalarioCargo").val(x.salario);
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
            {
                $.ajax({
                    type: "POST",
                    url: "asset/php/cargo/ajaxBorrarDatos.php",
                    data: {
                        id_cargo: $(elemento).attr("tag")
                    },
                    success: function (response) {
                        if(response != -1) {
                            $(elemento.parentElement.parentElement).remove();
                        }
                        else {
                            Swal.fire(
      'Imposible borrar puede que este cargo cuente con datos',
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
            url: "asset/php/cargo/ajaxBuscarDatos.php",
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
    $("#formHiddenIDCargo").val("");

    $("#formNombreCargo").val("");
    $("#formSalarioCargo").val("");
}

function validarNumeros(e) {
      var key = e.keyCode || e.which;
      var tecla = String.fromCharCode(key).toLowerCase();
      var numeros = "0123456789";
      var especiales = [8, 37, 39, 46];
      var tecla_especial = false;

      for(var i = 0; i < numeros.length; i++) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
      if(numeros.indexOf(tecla) == -1 && !tecla_especial  ) {
        return false;
      }
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