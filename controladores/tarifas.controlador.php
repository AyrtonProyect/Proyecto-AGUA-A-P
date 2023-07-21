<?php

class ControladorTarifas{

	/*=============================================
	CREAR TARIFAS
	=============================================*/

	static public function ctrCrearTarifa(){

		if(isset($_POST["descripcionTarifa"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionTarifa"])&&

                preg_match('/^[0-9]+$/', $_POST["costoTarifa"]) ){

				$tabla = "tarifas";

				$datos = array("descripcion"=>$_POST["descripcionTarifa"],
                            "costo"=>$_POST["costoTarifa"]);

				$respuesta = ModeloTarifas::mdlIngresarTarifa($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La tarifa ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La tarifa no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tarifas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TARIFAS
	=============================================*/

	static public function ctrMostrarTarifas($item, $valor){

		$tabla = "tarifas";

		$respuesta = ModeloTarifas::mdlMostrarTarifas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR ZONA
	=============================================*/

	static public function ctrEditarTarifa(){

		if(isset($_POST["editarTarifa"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTarifa"]) &&
                preg_match('/^[0-9]+$/', $_POST["editarCosto"])){

				$tabla = "tarifas";

				$datos = array("id"=>$_POST["idTarifa"],
                                "descripcion"=>$_POST["editarTarifa"],
                                "costo"=>$_POST["editarCosto"]);
							   

				$respuesta = ModeloTarifas::mdlEditarTarifa($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La tarifa ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La tarifa no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tarifas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ZONA
	=============================================*/

	static public function ctrBorrarTarifa(){

		if(isset($_GET["idTarifa"])){

			$tabla ="tarifas";
			$datos = $_GET["idTarifa"];

			$respuesta = ModeloTarifas::mdlBorrarTarifa($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La tarifa ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifas";

									}
								})

					</script>';
			}
		}
		
	}
}
