<?php 

require_once '../controladores/clientes.controlador.php';
require_once '../modelos/clientes.modelos.php';

class AjaxClientes{

	public $idCliente;

	public function ajaxMostrarCliente(){

		$item = "id_persona";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item,$valor);

		echo json_encode($respuesta);
	}

	public function ajaxMostrarTelefonos(){

		$item = "id_persona";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarTelefonos($item,$valor);

		echo json_encode($respuesta);
	}

	public function ajaxMostrarIdTelefonosCliente(){

		$item = "id_telefono";
		$valor = $this->idTelefono;

		$respuesta = ControladorClientes::ctrMostrarTelefonos($item,$valor);

		echo json_encode($respuesta);
	}

}

if (isset($_POST["mostrarCliente"])) {
	$mostrar = new AjaxClientes();
	$mostrar -> idCliente = $_POST["mostrarCliente"];
	$mostrar -> ajaxMostrarCliente();
}
if (isset($_POST["mostrarTelefonos"])) {
	$mostrar = new AjaxClientes();
	$mostrar -> idCliente = $_POST["mostrarTelefonos"];
	$mostrar -> ajaxMostrarTelefonos();
}
if (isset($_POST["mostrarIdTelefono"])) {
	$mostrar = new AjaxClientes();
	$mostrar -> idTelefono = $_POST["mostrarIdTelefono"];
	$mostrar -> ajaxMostrarIdTelefonosCliente();
}