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
			$datos = array('nombre' => $_POST["proveedorNombre"]);
			$respuesta = ModeloProveedores::mdlCrearProveedor($tabla,$datos);
			if($respuesta=="ok"){
				$alerta= AlertasPersonalizadas::alertaExito("AGREGADO","Se agrego correctamente","proveedores");
			}
			else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo agregar","A ocurrido un error al agregar proveedor","error");
			}

			}
		}

		static public function ctrEditarProveedor(){
			if (isset($_POST["editarIdProveedor"])) {

			$tabla = "proveedores";

			$datos = array('id_proveedor' => $_POST["editarIdProveedor"],
						   'nombre' => $_POST["editarProveedorNombre"],
						   );

		     // Muestra los datos que trae el array 
			  //echo '<pre>'; print_r($datos); echo '</pre>';

		   $respuesta = ModeloProveedores::mdlEditarProveedor($tabla,$datos);

			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("EDITADO","Se edito el proveedor correctamente","proveedores");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo Editar","A ocurrido un error al editar proveedor","error");
			}

		}
		}

		// Funcion para borrar proveedores
	static public function ctrEliminarProveedor(){

		if (isset($_GET["idProveedorEliminar"])) {

			$tabla = "proveedores";

			$id_proveedor = $_GET["idProveedorEliminar"];

			$respuesta = ModeloProveedores::mdlEliminarProveedor($tabla,$id_proveedor);
			// echo '<pre>'; print_r($respuesta); echo '</pre>';

			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("Proveedor eliminado","El proveedor se elimino correctamete","proveedores");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se puede eliminar","A ocurrido un error al editar proveedor","error");
			}

		}

	}



	} 