<?php 

class ControladorDB{

	static public function ctrMostrarFecha(){

		$respuesta = ModeloDB::mdlMostrarFecha();

		return $respuesta;

	}

}