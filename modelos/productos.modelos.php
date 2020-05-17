<?php 

require_once 'conexion.php';

class ModeloProductos{

	// Muestra todos los productos
	static public function mdlMostrarProductos($tabla,$item,$valor){

		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla
				WHERE $item = :$item
				");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
		}else{
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

	// Consultar el stock del producto por su id
	static public function mdlMostrarStockProductoEntrada($id_producto){

		$stmt = Conexion::conectar()->prepare("
			SELECT SUM(cantidad) as total_entrada 
			FROM detalle_transferencia_producto as dtp, 
			transferencia_producto as tp, 
			productos as p 
			WHERE tp.id_transferencia=dtp.id_transferencia 
			AND dtp.id_producto=p.id_producto 
			AND dtp.id_producto=:id_producto
			AND tp.clasificacion=0 ");

		$stmt -> bindParam("id_producto",$id_producto,PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	// Consultar el stock del producto por su id
	static public function mdlMostrarStockProductoSalida($id_producto){

		$stmt = Conexion::conectar()->prepare("
			SELECT SUM(cantidad) as total_salida 
			FROM detalle_transferencia_producto as dtp, 
			transferencia_producto as tp, 
			productos as p 
			WHERE tp.id_transferencia=dtp.id_transferencia 
			AND dtp.id_producto=p.id_producto 
			AND dtp.id_producto=:id_producto
			AND tp.clasificacion=1 ");

		$stmt -> bindParam("id_producto",$id_producto,PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}