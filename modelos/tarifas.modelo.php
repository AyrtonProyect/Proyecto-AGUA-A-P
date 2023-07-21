<?php

require_once "conexion.php";

class ModeloTarifas{

	/*=============================================
	CREAR TARIFA
	=============================================*/

	static public function mdlIngresarTarifa($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion,costo) VALUES (:descripcion,:costo)");

		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_INT);

	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR TARIFA
	=============================================*/

	static public function mdlMostrarTarifas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR TARIFA
	=============================================*/

	static public function mdlEditarTarifa($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion =:descripcion, costo =:costo WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_INT);

	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR TARIFA
	=============================================*/

	static public function mdlBorrarTarifa($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

