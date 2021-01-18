$(document).ready(function () {
    $("#guardarM").click(function (e) { 
        e.preventDefault();
        
        if($("#formNombreM").val() != "") {
            if($("#verificar_m").attr("tag") == "0"){
                    $.ajax({
                        type: "POST",
                        url: "asset/php/M&C/ajaxAgregar.php",
                        data: {
                            nombre: $("#formNombreM").val(),
                        },
                        success: function (response) {
                            if(response == -1) {
                                Swal.fire(
                                    'No se pudo agregar el registro',
                                    
                                    'Error'
                                )
                            }
                            else {
                                let html = `<option value = ${response}>${$("#formNombreM").val()}</option>`;

                                $("#marca").append(html);

                                $("#modalM").modal("hide");
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
                        'Verificar que la Marca no este registrada',
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
    $("#guardarM").val("Guardar");
    $("#formHiddenIDMarca").val("");
    $("#formNombreM").val("");
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