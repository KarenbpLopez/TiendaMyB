$(document).ready(function () {
    $("#guardarC").click(function (e) { 
        e.preventDefault();
        
        if($("#formNombreC").val() != "") {
            if($("#verificar_c").attr("tag") == "0"){
                    $.ajax({
                        type: "POST",
                        url: "asset/php/M&C/ajaxAgregarC.php",
                        data: {
                        nombre: $("#formNombreC").val(),
                        },
                        success: function (response) {
                            if(response == -1) {
                                Swal.fire(
                                    'No se pudo agregar el registro',
                                    
                                    'Error'
                                )
                            }
                            else {
                                let html = `<option value = ${response}>${$("#formNombreC").val()}</option>`;

                                $("#categoria").append(html);

                                $("#modalC").modal("hide");
                                Swal.fire(
                                'Registro agregado con exito',
                                 '',
                                'success'
                                )
                                resetearModal();
                            }
                        }
                    });
                }else{
                    Swal.fire(
                        'Verificar que la Categoría no este registrada',
                        '',
                        'error'
                        )
                }
        }else {
            Swal.fire(
            'Los campos no deben estar vacios',
            '',
            'error'
            )
        }
    });
});

//funciones normales
function resetearModal() {
    $("#guardarC").val("Guardar");
    $("#formHiddenIDCategoria").val("");
    $("#formNombreC").val("");
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