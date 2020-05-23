<?php 

require_once 'conexion.php';

class ModeloDB{

	static public function mdlMostrarFecha(){

		$stmt = Conexion::conectar()->prepare("SELECT CURDATE() AS fecha, CURRENT_TIME() AS hora ");

		$stmt -> execute();


		$respuesta = $stmt -> fetchAll();

		return $respuesta;

		$stmt -> close();

		$stmt = null;

	}

}