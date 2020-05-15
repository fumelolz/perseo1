<?php 

// $item Es el parametro con el que se va a evaluar en la clase ctrMostrarClientes que en la base de datos sería $item = "id_cliente"
// $valor = id_cliente(2)
// $tabla = El nombre de la tabla en este caso "clientes"


class ControladorClientes{

	static public function ctrMostrarClientes($item,$valor){

		$tabla1 = "personas";
		$tabla2 = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla1,$tabla2,$item,$valor);

		return $respuesta;

	}

	// Esta función crea los clientes !!!
	static public function ctrCrearCliente(){

	}

}