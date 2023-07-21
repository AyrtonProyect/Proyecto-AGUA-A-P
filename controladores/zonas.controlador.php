<?php

class ControladorZonas{

	/*=============================================
	CREAR ZONAS
	=============================================*/

	static public function ctrCrearZona(){

		if(isset($_POST["nuevaZona"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaZona"])){

				$tabla = "zonas";

				$datos = $_POST["nuevaZona"];

				$respuesta = ModeloZonas::mdlIngresarZona($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La zona ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "zonas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La zona no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "zonas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ZONAS
	=============================================*/

	static public function ctrMostrarZonas($item, $valor){

		$tabla = "zonas";

		$respuesta = ModeloZonas::mdlMostrarZonas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR ZONA
	=============================================*/

	static public function ctrEditarZona(){

		if(isset($_POST["editarZona"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarZona"])){

				$tabla = "zonas";

				$datos = array("zona"=>$_POST["editarZona"],
							   "id"=>$_POST["idZona"]);

				$respuesta = ModeloZonas::mdlEditarZona($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La zona ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "zonas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La zona no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "zonas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ZONA
	=============================================*/

	static public function ctrBorrarZona(){

		if(isset($_GET["idZona"])){

			$tabla ="zonas";
			$datos = $_GET["idZona"];

			$respuesta = ModeloZonas::mdlBorrarZona($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La zona ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "zonas";

									}
								})

					</script>';
			}
		}
		
	}
}
