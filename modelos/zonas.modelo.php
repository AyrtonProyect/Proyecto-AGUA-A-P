<?php

require_once "conexion.php";

class ModeloZonas{

	/*=============================================
	CREAR ZONAS
	=============================================*/

	static public function mdlIngresarZona($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(zona) VALUES (:zona)");

		$stmt->bindParam(":zona", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ZONAS
	=============================================*/

	static public function mdlMostrarZonas($tabla, $item, $valor){

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
	EDITAR ZONAS
	=============================================*/

	static public function mdlEditarZona($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET zona = :zona WHERE id = :id");

		$stmt -> bindParam(":zona", $datos["zona"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR ZONAS
	=============================================*/

	static public function mdlBorrarZona($tabla, $datos){

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

