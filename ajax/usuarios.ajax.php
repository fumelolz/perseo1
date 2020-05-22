<?php 

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelos.php';

class AjaxUsuarios{

	public $idUsuario;
	public $estado;

	public function ajaxMostrarUsuario(){

		$item = "id_persona";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);

	}

	public function ajaxActivarUsuario(){

		$item1 = "id_usuario";
		$valor1 = $this->idUsuario;
		$item2 = "state";
		$valor2 = $this->estado;

		$respuesta = ControladorUsuarios::ctrActivarUsuario($item1,$valor1,$item2,$valor2);

		echo $respuesta;
	}

}

if (isset($_POST["idUsuarioEditar"])) {
	
	$mostrar = new AjaxUsuarios();
	$mostrar -> idUsuario = $_POST["idUsuarioEditar"];
	$mostrar -> ajaxMostrarUsuario();

}

if (isset($_POST["idActivarUsuario"])) {
	
	$activar = new AjaxUsuarios();
	$activar -> idUsuario = $_POST["idActivarUsuario"];
	$activar -> estado = $_POST["estado"];
	$activar -> ajaxActivarUsuario();

}