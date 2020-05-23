<?php 

// $item Es el parametro con el que se va a evaluar en la clase ctrMostrarProductos que en la base de datos sería $item = "id_producto"
// $valor = id_prodcuto(2)
// $tabla = El nombre de la tabla en este caso "prodcutos"


class ControladorProductos{

	static public function ctrMostrarProductos($item,$valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla,$item,$valor);

		return $respuesta;

	}

	// Esta funcion consulta el stock de cada producto por su id
	static public function ctrMostrarStockProducto($id_producto){

		$entrada = ModeloProductos::mdlMostrarStockProductoEntrada($id_producto);
		$salida = ModeloProductos::mdlMostrarStockProductoSalida($id_producto);

		return $entrada["total_entrada"]-$salida["total_salida"];

	}

	// Esta función crea los Productos !!!
	static public function ctrCrearProducto(){
		if (isset($_POST["productoDescripcion"])) {
			
			$descripcion = $_POST["productoDescripcion"];
			$precio_compra = $_POST["productoCompra"];
			$precio_venta = $_POST["productoVenta"];
			$foto = $_FILES["productoFoto"]["tmp_name"];

			$datos = array('descripcion' => $descripcion,
			 			   'precio_compra' => $precio_compra,
			 			   'precio_venta' => $precio_venta,
			 			   'imagen' => $foto);

			echo '<pre>'; print_r($datos); echo '</pre>';

		}
	}

}