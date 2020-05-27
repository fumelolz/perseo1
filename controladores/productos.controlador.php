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

		return $respuesta;

	}

	// Esta funcion consulta el stock de cada producto por su id
	static public function ctrMostrarStockProducto($id_producto){

		$entrada = ModeloProductos::mdlMostrarStockProductoEntrada($id_producto);
		$salida = ModeloProductos::mdlMostrarStockProductoSalida($id_producto);

		return $entrada["total_entrada"]-$salida["total_salida"];

	}

	// Activar el producto
	static public function ctrActivarProducto($item1,$valor1,$item2,$valor2){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlActivarProducto($tabla,$item1,$valor1,$item2,$valor2);

		return $respuesta;

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

			// Muestra los datos del array
			//echo '<pre>'; print_r($datos); echo '</pre>';

			$respuesta = ModeloProductos::mdlCrearProducto($tabla,$datos);

			// Muestra la respeusta
			//echo '<pre>'; print_r($respuesta); echo '</pre>';

			if ($respuesta == "ok") {
				$alerta = AlertasPersonalizadas::alertaExito("Producto agregado correctamente", "El producto ha sido agregado con exito","productos");
			}

		}
	}

	// Editar productos
	static public function ctrEditarProducto(){

		if (isset($_POST["editarIdProducto"])) {
			
			$id_producto = $_POST["editarIdProducto"];
			$descripcion = $_POST["editarProductoDescripcion"];
			$precio_compra = $_POST["editarProductoCompra"];
			$precio_venta = $_POST["editarProductoVenta"];
			$categoria = $_POST["editarProductoCategoria"];
			$utilidad = $_POST["editarUtilidad"];
			$tabla = "productos";
			$ruta_imagen = $_POST["fotoActual"]; 

			if (isset($_FILES["editarProductoFoto"]["tmp_name"]) && !empty($_FILES["editarProductoFoto"]["tmp_name"])) {
					
				list($ancho,$alto) = getimagesize($_FILES["editarProductoFoto"]["tmp_name"]);

				/* Crear El directorio donde vamos a guardar la foto del proucto */
				$directorio = "vistas/img/productos/".$id_producto;

				if (!empty($_POST["fotoActual"])) {
					unlink($_POST["fotoActual"]);
				}else{
					mkdir($directorio,0755);
				}

				/* De acuerdo al tipo de imagen jpeg */
				if ($_FILES["editarProductoFoto"]["type"] == "image/jpeg") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/productos/".$id_producto."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarProductoFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagejpeg($destino,$ruta_imagen);
				}

				/* De acuerdo al tipo de imagen png */
				if ($_FILES["editarProductoFoto"]["type"] == "image/png") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/productos/".$id_producto."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarProductoFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagepng($destino,$ruta_imagen);
				}

			}

			$datos = array(
				'id_producto' => $id_producto,
				'descripcion' => $descripcion,
				'utilidad' => $utilidad,
				'precio_compra' => $precio_compra,
				'precio_venta' => $precio_venta,
				'ruta_imagen' => $ruta_imagen,
				'categoria' => $categoria);

			// echo '<pre>'; print_r($datos); echo '</pre>';
			$respuesta = ModeloProductos::mdlEditarProducto($tabla,$datos);
			// echo '<pre>'; print_r($respuesta); echo '</pre>';

			if ($respuesta == "ok") {
				$alerta = AlertasPersonalizadas::alertaExito("Producto actualizado correctamente", "El producto ha sido actualizado con exito","productos");
			}

		}

	}

	static public function ctrEliminarProducto(){

		if (isset($_GET["idProductoEliminar"])) {
				
			$id_producto = $_GET["idProductoEliminar"];
			$ruta_imagen = $_GET["foto"];
			$tabla = "productos";

			if ($ruta_imagen != "") {
				
				unlink($ruta_imagen);
				rmdir("vistas/img/productos/".$id_producto);

			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla,$id_producto);

			if ($respuesta == "ok") {
				$alerta = AlertasPersonalizadas::alertaExito("Producto eliminado correctamente", "El producto ha sido eliminado con exito","productos");
			}
		}

	}

}