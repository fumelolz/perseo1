<?php 

// $item Es el parametro con el que se va a evaluar en la clase ctrMostrarProductos que en la base de datos sería $item = "id_producto"
// $valor = id_prodcuto(2)
// $tabla = El nombre de la tabla en este caso "prodcutos"


class ControladorProductos{

	static public function ctrMostrarProductos($item,$valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla,$item,$valor);

		return $respuesta;

	}

	static public function ctrMostrarCategorias($item,$valor){

		$tabla = "categorias_productos";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla,$item,$valor);

		$listaCategorias = array();

		$arrayName = array(1,2);

		for ($i=0; $i < count($respuesta); $i++) { 
			$listaCategorias[$i]["id_categoria"] = $respuesta[$i]["id_categoria"];
			$listaCategorias[$i]["descripcion"] = ucfirst(strtolower($respuesta[$i]["descripcion"])); 
		} 

		return $listaCategorias;

	}

	// Esta funcion consulta el stock de cada producto por su id
	static public function ctrMostrarStockProducto($id_producto){

		$entrada = ModeloProductos::mdlMostrarStockProductoEntrada($id_producto);
		$salida = ModeloProductos::mdlMostrarStockProductoSalida($id_producto);

		return $entrada["total_entrada"]-$salida["total_salida"];

	}

	// Esta función crea los Productos !!!
	static public function ctrCrearProducto(){

		$item = null;
		$valor = null;
		$ultimo_id_producto = 0;

		$productos = ControladorProductos::ctrMostrarProductos($item,$valor);

		if ($productos) {
			foreach ($productos as $key => $value) {
			# code...
			}

			$ultimo_id_producto = $value["id_producto"]+1;
		}else{
			$ultimo_id_producto = 1;
		}

		

		

		if (isset($_POST["productoDescripcion"])) {
			
			$descripcion = $_POST["productoDescripcion"];
			$precio_compra = $_POST["productoCompra"];
			$precio_venta = $_POST["productoVenta"];
			$categoria = $_POST["productoCategoria"];
			$utilidad = $_POST["utilidad"];
			$tabla = "productos";
			$ruta_imagen = "";

			if (isset($_FILES["productoFoto"]["tmp_name"]) && !empty($_FILES["productoFoto"]["tmp_name"])) {	
				
				list($ancho,$alto) = getimagesize($_FILES["productoFoto"]["tmp_name"]);

				/* Crear El directorio donde vamos a guardar la foto del usuario */
				$directorio = "vistas/img/productos/".$ultimo_id_producto;
				mkdir($directorio,0755);

				/* De acuerdo al tipo de imagen jpeg */
				if ($_FILES["productoFoto"]["type"] == "image/jpeg") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/productos/".$ultimo_id_producto."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["productoFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagejpeg($destino,$ruta_imagen);
				}

				/* De acuerdo al tipo de imagen png */
				if ($_FILES["productoFoto"]["type"] == "image/png") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/productos/".$ultimo_id_producto."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["productoFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagepng($destino,$ruta_imagen);
				}

			}

			$datos = array(
				'descripcion' => $descripcion,
				'utilidad' => $utilidad,
				'precio_compra' => $precio_compra,
				'precio_venta' => $precio_venta,
				'ruta_imagen' => $ruta_imagen,
				'categoria' => $categoria);

			echo '<pre>'; print_r($datos); echo '</pre>';
			$respuesta = ModeloProductos::mdlCrearProducto($tabla,$datos);
			echo '<pre>'; print_r($respuesta); echo '</pre>';

		}
	}

}