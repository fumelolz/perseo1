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
		$stmtFecha=Conexion::conectar()->prepare("SELECT CURDATE()");
		$stmtFecha -> execute();
		$fechaServidor = $stmtFecha -> fetch();

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,fecha_alianza,estado) VALUES(:nombre,:fecha_alianza,'1')");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_alianza",$fechaServidor[0],PDO::PARAM_STR);


		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
		$stmtFecha -> close();
		$stmtFecha=null;
		$fechaServidor=null;
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

	static public function mdlEliminarProveedor($tabla,$id_proveedor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado=0 WHERE id_proveedor=:id_proveedor");

		$stmt -> bindParam(":id_proveedor",$id_proveedor,PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlActivarProveedor($tabla,$item1,$valor1,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2=:estado WHERE $item1=:id_proveedor");

		$stmt -> bindParam(":id_proveedor",$valor1,PDO::PARAM_INT);
		$stmt -> bindParam(":estado",$valor2,PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

	static public function mdlMostrarTelefonos($tabla, $item, $valor){
			if($item != null){ 
				$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $item = :$item
				");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

				$stmt -> execute();

				return $stmt -> fetchAll();
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
//metodo para editar los telefonos de proveedores
	static public function mdlEditarTelefonos($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET telefono=:telefono, descripcion=:descripcion WHERE id_telefono=:id_telefono");

		$stmt -> bindParam(":id_telefono",$datos["id_telefono"],PDO::PARAM_INT);
		$stmt -> bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}
//Metodo para eliminar telefono de proveedores
	static public function mdlEliminarTelefonoProveedor($tabla,$id_telefono){

		$stmt = Conexion::conectar()->prepare("DELETE FROM  $tabla WHERE id_telefono=:id_telefono");

		$stmt -> bindParam(":id_telefono",$id_telefono,PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}

}
