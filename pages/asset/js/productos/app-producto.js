$(document).ready(function () {
    $("#guardar").click(function (e) { 
        e.preventDefault();
        var select = $("#marca").val();
        var cate = $("#categoria").val();
        
        if($("#formProducto").val() != ""  && $("#codigo").val() != "" && parseFloat($("#formPVenta").val()) >= 0 && parseInt($("#formGanancia").val()) >=0
        && select != 0 && cate !=0) {

                if($("#formHiddenIDProducto").val() == "") {
                    $.ajax({
                        type: "POST",
                        url: "asset/php/producto/ajaxAgregar.php",
                        data: {
                            nombre: $("#formProducto").val(),
                            codigo: $("#codigo").val(),
                            porcentaje: $("#formGanancia").val(),
                            precio: $("#formPVenta").val(),
                            marca: $("#marca").val(),
                            categoria: $("#categoria").val()
                            
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
                                                <td>${$("#formProducto").val()}</td>
                                                <td>${$("#codigo").val()}</
                                                <td>${$("#formGanancia").val()}</td>
                                                <td>${$("#formPVenta").val()}</td>
                                                <td>${$("#formM").val()}</td>
                                                <td>${$("#formCa").val()}</td>  
                                                                                              
                                                <td width="130px">
                                                <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="${response}"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button></td>
                                                <td width="120px"><button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="${response}" nombre-producto="${$("#formProducto").val()}"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
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
                        url: "asset/php/producto/ajaxModificar.php",
                        data: {
                            nombre: $("#formProducto").val(),
                            codigo: $("#codigo").val(),
                            porcentaje: $("#formGanancia").val(),
                            precio: $("#formPVenta").val(),
                            marca: $("#marca").val(),
                            categoria: $("#categoria").val(),
                            id_producto: $("#formHiddenIDProducto").val()
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

                                $(location).attr("href", "listaProductos.php");
                            }
                        }
                    });
                }
        }
        else {
            if(parseFloat($("#formPVenta").val()) <= 0 && parseInt($("#formGanancia").val()) <=0) {
                Swal.fire(
                    'Los campos no pueden ser negativos',
                    '',
                    'error'
                )
            }
            else{
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
        resetearModalP();
        $("#guardar").val("Modificar");
        
        $.ajax({
            type: "POST",
            url: "asset/php/producto/ajaxObtenerDatos.php",
            data: {
                id_producto: $(elemento).attr("tag")
            },
            success: function (response) {
                if(response != -1) {
                    var datos = JSON.parse(response);
    
                    datos.forEach(x => {
                        //para sabe cual id es...
                        $("#formHiddenIDProducto").val(x.id);

                        $("#formProducto").val(x.nombre);
                        $("#codigo").val(x.codigo);
                        $("#formGanancia").val(x.porcentaje);
                        $("#formPVenta").val(x.precio);
                        // $("#formM").val(x.marca);
                        $("#marca").val(x.marca);
                        $("#categoria").val(x.categoria);
                        // $("#formCa").val(x.categoria);
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
                    url: "asset/php/producto/ajaxBorrarDatos.php",
                    data: {
                        id_producto: $(elemento).attr("tag")
                    },
                    success: function (response) {
                        if(response != -1) {
                            $(elemento.parentElement.parentElement).remove();
                        }
                        else {
                            Swal.fire(
                            'Imposible borrar este producto esta siendo utilizado',
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
            url: "asset/php/producto/ajaxBuscarDatos.php",
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

// funciones normales
function resetearModalP() {
    $("#guardar").val("Guardar");
    $("#formHiddenIDProducto").val("");

    $("#formProducto").val("");
    $("#formGanancia").val("");
    $("#formPVenta").val("");
    $("#marca").val("");
    $("#categoria").val("");
    $("#codigo").val("");
}

function mod(){
    var element = document.getElementById('marca');
    
    element.addEventListener("change", function(){ 
       var marca = document.getElementById('formM');
       
        marca.value = this.options[this.selectedIndex].text;
        
    });

    var categoria = document.getElementById('categoria');
    categoria.addEventListener("change", function(){
      var ca = document.getElementById('formCa');

      ca.value = this.options[this.selectedIndex].text;
    });
    
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

function abrirVentana() {
    var window_width = 750;
    var window_height = 480;
    var newfeatures = 'scrollbars=no,resizable=no';
    var window_top = (screen.height - window_height) / 2;
    var window_left = (screen.width - window_width) / 2;
    newWindow = window.open('reportes/reporteCliente.php', 'Reporte', 'width=' + window_width + ',height=' + window_height + ',top=' + window_top + ',left=' + window_left + ',features=' + newfeatures + '');
  }

  function configuraLoading(screen) {
    $(document).ajaxStart(function() {
      screen.fadeIn();
    }).ajaxStop(function() {
      screen.fadeOut();
    });
  }