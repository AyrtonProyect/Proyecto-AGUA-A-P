/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        /*=====================================
        CARGAR EL COMBO ZONA DE EDITAR
        ======================================*/
        
        var datosZona = new FormData();
        datosZona.append("idZona",respuesta["id_zona"]);

         $.ajax({

            url:"ajax/zonas.ajax.php",
            method: "POST",
            data: datosZona,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){
                
                $("#editarZona").val(respuesta["id"]);
                $("#editarZona").html(respuesta["zona"]);

            }

        })
        
/*=====================================
        CARGAR EL COMBO TARIFA
        ======================================*/
        
        var datosTarifa = new FormData();
        datosTarifa.append("idTarifa",respuesta["id_tarifa"]);

         $.ajax({

            url:"ajax/tarifas.ajax.php",
            method: "POST",
            data: datosTarifa,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){
                
                $("#editarTarifa").val(respuesta["id"]);
                $("#editarTarifa").html(respuesta["tarifa"]);

            }

        })


      	   $("#idCliente").val(respuesta["id"]);
	       $("#editarCliente").val(respuesta["nombre"]);
         $("#editarApellido").val(respuesta["apellido"]);
	       $("#editarDocumentoId").val(respuesta["documento"]);
	       $("#editarEmail").val(respuesta["email"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarDireccion").val(respuesta["direccion"]);

         
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})