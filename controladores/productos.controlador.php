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

	// Esta función crea los Productos !!!
	static public function ctrCrearProducto(){

	}

}