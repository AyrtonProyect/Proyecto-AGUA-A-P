/*=============================================
EDITAR ZONA
=============================================*/
$(".tablas").on("click", ".btnEditarZona", function(){

	var idZona = $(this).attr("idZona");

	var datos = new FormData();
	datos.append("idZona", idZona);

	$.ajax({
		url: "ajax/zonas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarZona").val(respuesta["zona"]);
     		$("#idZona").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR ZONA
=============================================*/
$(".tablas").on("click", ".btnEliminarZona", function(){

	 var idZona = $(this).attr("idZona");

	 swal({
	 	title: '¿Está seguro de borrar la zona?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar zona!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=zonas&idZona="+idZona;

	 	}

	 })

})