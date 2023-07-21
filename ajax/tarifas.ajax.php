<?php

require_once "../controladores/tarifas.controlador.php";
require_once "../modelos/tarifas.modelo.php";

class AjaxTarifas{

	/*=============================================
	EDITAR TARIFA
	=============================================*/	

	public $idTarifa;

	public function ajaxEditarTarifa(){

		$item = "id";
		$valor = $this->idTarifa;

		$respuesta = ControladorTarifas::ctrMostrarTarifas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR TARIFA
=============================================*/	
if(isset($_POST["idTarifa"])){

	$tarifas = new AjaxTarifas();
	$tarifas -> idTarifa = $_POST["idTarifa"];
	$tarifas -> ajaxEditarTarifa();
}
