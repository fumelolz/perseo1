<?php 

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelos.php';

class AjaxUsuarios{

	public $idUsuario;

	public function ajaxMostrarUsuario(){

		$item = "id_persona";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

		echo json_encode($respuesta);

	}

}

if (isset($_POST["idUsuarioEditar"])) {
	
	$mostrar = new AjaxUsuarios();
	$mostrar -> idUsuario = $_POST["idUsuarioEditar"];
	$mostrar -> ajaxMostrarUsuario();

}