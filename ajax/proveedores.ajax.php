<?php 

require_once '../controladores/proveedores.controlador.php';
require_once '../modelos/proveedores.modelos.php';

class AjaxProveedores{

	public $idProveedor;

	public function ajaxMostrarProveedor(){

		$item = "id_proveedor";
		$valor = $this->idProveedor;

		$respuesta = ControladorProveedores::ctrMostrarProveedor($item,$valor);

		echo json_encode($respuesta);
	}

}

if (isset($_POST["mostrarProveedor"])) {
	$mostrar = new AjaxClientes();
	$mostrar -> idProveedor = $_POST["mostrarProveedor"];
	$mostrar -> ajaxMostrarProveedor();
}