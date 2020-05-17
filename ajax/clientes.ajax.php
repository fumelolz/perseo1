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

}

if (isset($_POST["mostrarCliente"])) {
	$mostrar = new AjaxClientes();
	$mostrar -> idCliente = $_POST["mostrarCliente"];
	$mostrar -> ajaxMostrarCliente();
}