<?php 

require_once '../controladores/clientes.controlador.php';
require_once '../modelos/clientes.modelos.php';

class AjaxClientes{

	public $idCliente;
	public $estado;

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

	public function ajaxMostrarCorreosCliente(){

		$item = "id_persona";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarCorreos($item,$valor);

		echo json_encode($respuesta);
	}

	public function ajaxMostrarIdCorreoCliente(){

		$item = "id_email";
		$valor = $this->idCorreo;

		$respuesta = ControladorClientes::ctrMostrarCorreos($item,$valor);

		echo json_encode($respuesta);
	}

	public function ajaxActivarCliente(){

		$item1 = "id_persona";
		$valor1 = $this->idCliente;
		$item2 = "estado_cliente";
		$valor2 = $this->estado;

		$respuesta = ControladorClientes::ctrActivarCliente($item1,$valor1,$item2,$valor2);

		echo $respuesta;
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
if (isset($_POST["mostrarCorreos"])) {
	$mostrar = new AjaxClientes();
	$mostrar -> idCliente = $_POST["mostrarCorreos"];
	$mostrar -> ajaxMostrarCorreosCliente();
}
if(isset($_POST["mostrarIdCorreo"])){
	$mostrar = new AjaxClientes();
	$mostrar -> idCorreo = $_POST["mostrarIdCorreo"];
	$mostrar -> ajaxMostrarIdCorreoCliente();
}

if (isset($_POST["idClienteEstado"])) {
	$cambiarEstado = new AjaxClientes();
	$cambiarEstado -> estado = $_POST["estado"];
	$cambiarEstado -> idCliente = $_POST["idClienteEstado"];
	$cambiarEstado -> ajaxActivarCliente();
}