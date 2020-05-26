<?php 

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelos.php';

class AjaxProductos{

	public $idProducto;
	public $idCategoria;

	public function ajaxMostrarProductos(){

		$item = "id_producto";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);

		echo json_encode($respuesta);

	}

	public function ajaxMostrarCategorias(){

		$item = "id_categoria";
		$valor = $this->idCategoria;

		$respuesta = ControladorProductos::ctrMostrarCategorias($item,$valor);

		echo json_encode($respuesta);

	}


}

if (isset($_POST["idProductoEditar"])) {
	$mostrar = new AjaxProductos();
	$mostrar -> idProducto = $_POST["idProductoEditar"];
	$mostrar -> ajaxMostrarProductos();
	
}

if (isset($_POST["idCategoriaEditar"])) {
	$mostrar = new AjaxProductos();
	$mostrar -> idCategoria = $_POST["idCategoriaEditar"];
	$mostrar -> ajaxMostrarCategorias();
}