<?php
	require_once 'conexion.php';

class ModeloProveedores{

	static public function mdlMostrarProveedores($tabla, $item, $valor){
			if($item != null){ 
				$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $item = :$item
				");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

				$stmt -> execute();

				return $stmt -> fetch();
			}
			else{
				$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}

			$stmt -> close();
			$stmt = null;
	}
	// Función parar crear un Proveedor
	static public function mdlCrearProveedor($tabla,$datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,fecha_alianza,estado,ultima_compra) VALUES(:nombre,:fecha_alianza,:estado,:ultima_compra)");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_alianza",$datos["fecha_alianza"],PDO::PARAM_STR);
		$stmt -> bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
		$stmt -> bindParam(":ultima_fecha_compra",$datos["ultima_fecha_compra"],PDO::PARAM_STR);

		if($stmt -> execute()){
			// $alerta= AlertasPersonalizadas::alertaExito("Se agrego nuevo proveedor","Se a agregado correctamente");
			return "ok";
		}else{
			//$alerta= AlertasPersonalizadas::alertaError("No se pudo agregar","A ocurrido un error al agregar proveedor",$datos);
		}

		$stmt -> close();
		$stmt = null;
	}

}