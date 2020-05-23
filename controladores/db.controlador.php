<?php 

class ControladorDB{

	static public function ctrMostrarFecha(){

		$respuesta = ModeloDB::mdlMostrarFecha();

		$datos = array('fecha' => $respuesta[0]["fecha"],
					   'hora' => $respuesta[0]["hora"]);

		return $datos;

	}

}