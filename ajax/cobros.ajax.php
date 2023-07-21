<?php

require_once "../controladores/cobros.controlador.php";
require_once "../modelos/cobros.modelo.php";

class AjaxCobros{

	/*=============================================
	EDITAR COBRO
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCobro(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorCobros::ctrMostrarCobros($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR COBRO
=============================================*/	

if(isset($_POST["idCliente"])){

	$cobro = new AjaxCobros();
	$cobro -> idCliente = $_POST["idCliente"];
	$cobro -> idCliente = $_POST["nuevoCliente"];
	$cobro -> idCliente = $_POST["nuevoApellido"];
	$cobro -> idCliente = $_POST["editarTarifa"];

	
	$cobro -> ajaxEditarCobro();

}