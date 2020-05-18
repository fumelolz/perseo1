<?php 

class ControladorUsuarios{

	static public function ctrMostrarUsuarios($item,$valor){

		$tabla1 = "personas";
		$tabla2 = "usuarios";
		

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla1,$tabla2,$item,$valor);

		return $respuesta;

	}

	static public function ctrCrearUsuario(){
		
	}

}