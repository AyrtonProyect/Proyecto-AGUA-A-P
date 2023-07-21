<?php

require_once "../controladores/zonas.controlador.php";
require_once "../modelos/zonas.modelo.php";

class AjaxZonas{

	/*=============================================
	EDITAR ZONA
	=============================================*/	

	public $idZona;

	public function ajaxEditarZona(){

		$item = "id";
		$valor = $this->idZona;

		$respuesta = ControladorZonas::ctrMostrarZonas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR ZONA
=============================================*/	
if(isset($_POST["idZona"])){

	$zonas = new AjaxZonas();
	$zonas -> idZona = $_POST["idZona"];
	$zonas -> ajaxEditarZona();
}
