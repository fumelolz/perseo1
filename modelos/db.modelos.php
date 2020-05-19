<?php 

require_once 'conexion.php';

class ModeloDB{

	static public function mdlMostrarFecha(){

		$stmt = Conexion::conectar()->prepare("SELECT CURDATE();");

		$stmt -> execute();


		$fecha = $stmt -> fetch();

		return $fecha[0];

		$stmt -> close();

		$stmt = null;

	}

}