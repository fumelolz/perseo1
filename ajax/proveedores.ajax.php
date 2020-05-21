<?php 

require_once '../controladores/proveedores.controlador.php';
require_once '../modelos/proveedores.modelos.php';

class AjaxProveedores{

	public $idProveedor;
	public $estado;

	public function ajaxMostrarProveedor(){

		$item = "id_proveedor";
		$valor = $this->idProveedor;

		$respuesta = ControladorProveedores::ctrMostrarProveedores($item,$valor);

		echo json_encode($respuesta);
	}

	public function ajaxActivarProveedor(){

		$item1 = "id_proveedor";
		$valor1 = $this->idProveedor;
		$item2 = "estado";
		$valor2 = $this->estado;

		$respuesta = ControladorProveedores::ctrActivarProveedor($item1,$valor1,$item2,$valor2);
	}

	public function ajaxMostrarTelefonosProveedor(){

		$item = "id_proveedor";
		$valor = 1;

		$respuesta = ControladorProveedores::ctrMostrarTelefonoss($item,$valor);

		echo json_encode($respuesta);
	}

}

if (isset($_POST["mostrarProveedor"])) {
	$mostrar = new AjaxProveedores();
	$mostrar -> idProveedor = $_POST["mostrarProveedor"];
	$mostrar -> ajaxMostrarProveedor();
}

if (isset($_POST["idProveedorEstado"])) {
	$cambiarEstado = new AjaxProveedores();
	$cambiarEstado -> estado = $_POST["estado"];
	$cambiarEstado -> idProveedor = $_POST["idProveedorEstado"];
	$cambiarEstado -> ajaxActivarProveedor();
}

if (isset($_POST["IdTelefono"])) {
	$mostrar = new AjaxProveedores();
	$mostrar -> idProveedor = $_POST["IdTelefono"];
	$mostrar -> ajaxMostrarTelefonosProveedor();
}
