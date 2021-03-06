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
		$valor = $this->idProveedor;

		$respuesta = ControladorProveedores::ctrMostrarTelefonos($item,$valor);

		echo json_encode($respuesta);
	}
	public function ajaxMostrarIdTelefonosProveedor(){

		$item = "id_telefono";
		$valor = $this->idTelefono;

		$respuesta = ControladorProveedores::ctrMostrarTelefonos($item,$valor);

		echo json_encode($respuesta);
	}

	public function ajaxMostrarCorreosProveedor(){

		$item = "id_proveedor";
		$valor = $this->idProveedor;

		$respuesta = ControladorProveedores::ctrMostrarCorreos($item,$valor);

		echo json_encode($respuesta);
	}
	public function ajaxMostrarIdCorreoProveedor(){

		$item = "id_email";
		$valor = $this->idCorreo;

		$respuesta = ControladorProveedores::ctrMostrarCorreos($item,$valor);

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

if (isset($_POST["mostrarTelefonos"])) {
	$mostrar = new AjaxProveedores();
	$mostrar -> idProveedor = $_POST["mostrarTelefonos"];
	$mostrar -> ajaxMostrarTelefonosProveedor();
}
if (isset($_POST["mostrarIdTelefono"])) {
	$mostrar = new AjaxProveedores();
	$mostrar -> idTelefono = $_POST["mostrarIdTelefono"];
	$mostrar -> ajaxMostrarIdTelefonosProveedor();
}
if (isset($_POST["mostrarCorreos"])) {
	$mostrar = new AjaxProveedores();
	$mostrar -> idProveedor = $_POST["mostrarCorreos"];
	$mostrar -> ajaxMostrarCorreosProveedor();
}
if(isset($_POST["mostrarIdCorreo"])){
	$mostrar = new AjaxProveedores();
	$mostrar -> idCorreo = $_POST["mostrarIdCorreo"];
	$mostrar -> ajaxMostrarIdCorreoProveedor();
}
