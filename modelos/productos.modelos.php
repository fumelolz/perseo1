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

	// Muestra todas las Categorias
	static public function mdlMostrarCategorias($tabla,$item,$valor){

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

	// Crear Producto
	static public function mdlCrearProducto($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion,utilidad,precio_compra,precio_venta,ruta_imagen,categoria) VALUES(:descripcion,:utilidad,:precio_compra,:precio_venta,:ruta_imagen,:categoria)");

		$stmt -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt -> bindParam(":utilidad",$datos["utilidad"],PDO::PARAM_STR);
		$stmt -> bindParam(":precio_compra",$datos["precio_compra"],PDO::PARAM_STR);
		$stmt -> bindParam(":precio_venta",$datos["precio_venta"],PDO::PARAM_STR);
		$stmt -> bindParam(":ruta_imagen",$datos["ruta_imagen"],PDO::PARAM_STR);
		$stmt -> bindParam(":categoria",$datos["categoria"],PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

}