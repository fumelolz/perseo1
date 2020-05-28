<?php 

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelos.php';

class TablaProductos{

	public function ajaxMostrarTablaProductos(){

		$item = null;
		$valor = null;

		$productos = ControladorProductos::ctrMostrarProductos($item,$valor);

		$jsonData = '{"data": [';

		for ($i=0; $i < count($productos) ; $i++) { 

				$id_producto = $productos[$i]["id_producto"];
				$descripcion = $productos[$i]["descripcion"];
				$precio_compra = $productos[$i]["precio_compra"];
				$precio_venta = $productos[$i]["precio_venta"];
				$stockRespuesta = ControladorProductos::ctrMostrarStockProducto($id_producto);
				$imagen = $productos[$i]["ruta_imagen"];
				$estado = $productos[$i]["estado"];

				if ($stockRespuesta>=20) {
					$stock = "<button class='btn btn-success'>".$stockRespuesta."</button>";
				}else if($stockRespuesta<20 && $stockRespuesta>=10){
					$stock = "<button class='btn btn-warning'>".$stockRespuesta."</button>";
				}else if($stockRespuesta<10){
					$stock = "<button class='btn btn-danger'>".$stockRespuesta."</button>";
				}

				if($imagen){
					$imagen_producto = "<button class='btn btn-light img' imagen='".$imagen."'><img src='".$imagen."' class='img-thumbnail' width=50 height=50></button>";
				}else{
					$imagen_producto = "<img src='vistas/img/producto-not-found.jpg' class='img-thumbnail' width=50 height=50>";
				}

				if ($estado == 0) {
					$estado_producto = "<center><button class='btn btn-danger btnActivarProducto' estado='1' idProducto='".$id_producto."'>Desactivado</button></center>";
				}else{
					$estado_producto = "<center><button class='btn btn-success btnActivarProducto' estado='0' idProducto='".$id_producto."'>Activado</button></center>";
				}

				$acciones = "<center><div class='btn-group-sm'><button class='btn btn-warning btnEditarProducto' data-toggle='modal' data-target='#modalEditarProducto' idProducto='".$id_producto."'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$id_producto."' foto='".$imagen."'><i class='fas fa-times'></i></button></div><center>";

				$jsonData .='[
					"'.$id_producto.'",
					"'.$descripcion.'",
					"$'.$precio_compra.'",
					"$'.$precio_venta.'",
					"'.$stock.'",
					"'.$imagen_producto.'",
					"'.$estado_producto.'",
					"'.$acciones.'"
				],'; 

		}

		$jsonData = substr($jsonData, 0,-1);

		$jsonData .=']}';

		echo $jsonData;

	}

}

$activarTabla = new TablaProductos();
$activarTabla -> ajaxMostrarTablaProductos();