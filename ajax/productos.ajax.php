<?php 

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelos.php';

class AjaxProductos{

	public $idProducto;
	
	

	public function ajaxMostrarProductos(){

		$item = "id_producto";
		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);

		echo json_encode($respuesta);

	}

	public $idCategoria;

	public function ajaxMostrarCategorias(){

		$item = "id_categoria";
		$valor = $this->idCategoria;

		$respuesta = ControladorProductos::ctrMostrarCategorias($item,$valor);

		echo json_encode($respuesta);

	}

	public $estado;

	public function ajaxActivarProducto(){

		$item1 = "id_producto";
		$valor1 = $this->idProducto;
		$item2 = "estado";
		$valor2 = $this->estado;

		$respuesta = ControladorProductos::ctrActivarProducto($item1,$valor1,$item2,$valor2);
		
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

if (isset($_POST["idProductoEstado"])) {
	$activar = new AjaxProductos();
	$activar -> idProducto = $_POST["idProductoEstado"];
	$activar -> estado = $_POST["estado"];
	$activar -> ajaxActivarProducto();
}