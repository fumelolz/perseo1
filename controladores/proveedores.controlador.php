<?php
// $item Es el parametro con el que se va a evaluar en la clase ctrMostrarProductos que en la base de datos sería $item = "id_proveedor"
// $valor = id_proveedor(2)
// $tabla = El nombre de la tabla en este caso "proveedores"

	class ControladorProveedores{
		static public function ctrMostrarProveedores($item,$valor){
			$tabla="proveedores";
			$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrCrearProveedor(){
			if (isset($_POST["proveedorNombre"])) {

			$tabla = "proveedores";

			$datos = array('nombre' => $_POST["proveedorNombre"],
						   'fecha_alianza' => $_POST["proveedorFechaAlianza"],
						   'estado' => $_POST["proveedorEstado"],
						   'ultima_fecha_compra' => $_POST["proveedorUFC"],);

			$respuesta = ModeloProveedores::mdlCrearProveedor($tabla,$datos);
			echo '<pre>'; print_r($respuesta); echo '</pre>';

		}
		}
	} 