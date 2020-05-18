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
		//Para saber la hora actual
		$stmtHora=Conexion::conectar()->prepare("SELECT CURDATE()");
		$stmtHora -> execute();
		$horaServidor = $stmtHora -> fetch();

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,fecha_alianza,estado) VALUES(:nombre,:fecha_alianza,'1')");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_alianza",$horaServidor[0],PDO::PARAM_STR);


		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
		$stmtHora -> close();
		$stmtHora=null;
		$horaServidor=null;
	}

	static public function mdlEditarProveedor($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre WHERE id_proveedor=:id_proveedor");

		$stmt -> bindParam(":id_proveedor",$datos["id_proveedor"],PDO::PARAM_INT);
		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}

}