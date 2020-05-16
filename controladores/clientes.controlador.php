<?php 

// $item Es el parametro con el que se va a evaluar en la clase ctrMostrarClientes que en la base de datos sería $item = "id_cliente"
// $valor = id_cliente(2)
// $tabla = El nombre de la tabla en este caso "clientes"

// Tareas Hacer variables, $_POST[""]


class ControladorClientes{

	static public function ctrMostrarClientes($item,$valor){

		$tabla1 = "personas";
		$tabla2 = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla1,$tabla2,$item,$valor);

		return $respuesta;

	}

	// Esta función crea los clientes !!!
	static public function ctrCrearCliente(){
		if (isset($_POST["clienteNombre"])) {

			$tabla1 = "personas";
			$tabla2 = "clientes";

			$datos = array('nombre' => $_POST["clienteNombre"],
							   'ap_Paterno' => $_POST["clienteApPaterno"],
							   'ap_Materno' => $_POST["clienteApMaterno"],
							   'email' => $_POST["clienteEmail"],
							   'rfc' => $_POST["clienteRfc"],
							   'ine' => $_POST["clienteIne"],
							   'direccion' => $_POST["clienteDireccion"],
							   'pais' => $_POST["clientePais"],
							   'estado' => $_POST["clienteEstado"],
							   'ciudad' => $_POST["clienteCiudad"],
							   'fecha_nacimiento' => $_POST["clienteFechaNacimiento"]);


			$respuesta = ModeloClientes::mdlCrearCliente($tabla1,$tabla2,$datos);
			echo '<pre>'; print_r($respuesta); echo '</pre>';

		}
	}

}