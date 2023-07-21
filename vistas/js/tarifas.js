/*=============================================
EDITAR TARIFAS
=============================================*/
$(".tablas").on("click", ".btnEditarTarifa", function(){

	var idTarifa = $(this).attr("idTarifa");

	var datos = new FormData();
    datos.append("idTarifa", idTarifa);

    $.ajax({

      url:"ajax/tarifas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
       
      	   $("#idTarifa").val(respuesta["id"]);
	       $("#editarTarifa").val(respuesta["descripcion"]);
            $("#editarCosto").val(respuesta["costo"]);
       

         
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarTarifa", function(){

	var idTarifa = $(this).attr("idTarifa");
	
	swal({
        title: '¿Está seguro de borrar esta tarifa?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar tarifa!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=tarifas&idTarifa="+idTarifa;
        }

  })

})