<?php 

class ControladorUsuarios{

	static public function ctrMostrarUsuarios($item,$valor){

		$tabla1 = "personas";
		$tabla2 = "usuarios";
		

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla1,$tabla2,$item,$valor);

		return $respuesta;

	}

	static public function ctrCrearUsuario(){

		if (isset($_POST["usuarioNombre"])) {
			
			$nombre = $_POST["usuarioNombre"];
			$ap_Paterno = $_POST["usuarioApPaterno"];
			$ap_Materno = $_POST["usuarioApMaterno"];
			$email = $_POST["usuarioEmail"];

		}
		
	}

}