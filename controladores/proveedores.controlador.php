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

	static public function ctrActivarProveedor($item1,$valor1,$item2,$valor2){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlActivarProveedor($tabla,$item1,$valor1,$item2,$valor2);

		return $respuesta;

	}

	static public function ctrMostrarTelefonos($item,$valor){
		$tabla = "telefonos_proveedores";
		$respuesta = ModeloProveedores::mdlMostrarTelefonos($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrEditarTelefonoProveedor(){
		if (isset($_POST["idTelefono"])) {

			$tabla = "telefonos_proveedores";

			$datos = array('id_telefono' => $_POST["idTelefono"],
						   'descripcion' => $_POST["editarDescripcionT"],
						   'telefono' => $_POST["editarTelefonoT"],
						   );

		     // Muestra los datos que trae el array 
			  //echo '<pre>'; print_r($datos); echo '</pre>';

		   $respuesta = ModeloProveedores::mdlEditarTelefonos($tabla,$datos);

			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("TELEFONO EDITADO","Se edito el telefono correctamente","proveedores");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo Editar","A ocurrido un error al editar telefono","error");
			}

		}
	}

	static public function ctrEliminarTelefonoProveedor(){

		if (isset($_GET["idTelefono"])) {

			$tabla = "telefonos_proveedores";

			$id_telefono = $_GET["idTelefono"];

			$respuesta = ModeloProveedores::mdlEliminarTelefonoProveedor($tabla,$id_telefono);
			// echo '<pre>'; print_r($respuesta); echo '</pre>';

			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("TELEFONO ELIMINADO","El telefono se elimino correctamete","proveedores");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se puede eliminar","A ocurrido un error al borrar el telefono","error");
			}

		}

	}

	static public function ctrAgregarTelefonoProveedor(){

		if (isset($_POST["crearTelefono"])) {

			$tabla = "telefonos_proveedores";
			
			$datos = array('id_proveedor' => $_POST["crearTelefono"],
							'telefono' => $_POST["inputAgregarTelefono"],
							'descripcion' => $_POST["inputAgregarDescripcion"],
							);

			$respuesta = ModeloProveedores::mdlCrearTelefono($tabla,$datos);

			if($respuesta=="ok"){
				$alerta= AlertasPersonalizadas::alertaExito("AGREGADO","Se agrego correctamente","proveedores");
			}
			else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo agregar","A ocurrido un error al agregar proveedor","error");
			}

			}

	}

	static public function ctrAgregarCorreoProveedor(){

		if (isset($_POST["crearCorreo"])) {

			$tabla = "email_proveedores";
			
			$datos = array('id_proveedor' => $_POST["crearCorreo"],
							'email' => $_POST["inputAgregarCorreo"],
							);

			$respuesta = ModeloProveedores::mdlCrearCorreo($tabla,$datos);

			if($respuesta=="ok"){
				$alerta= AlertasPersonalizadas::alertaExito("AGREGADO","Se agrego correctamente","proveedores");
			}
			else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo agregar","A ocurrido un error al agregar proveedor","error");
			}

			}

	}

	static public function ctrMostrarCorreos($item,$valor){
		$tabla = "email_proveedores";
		$respuesta = ModeloProveedores::mdlMostrarCorreos($tabla, $item, $valor);
		return $respuesta;
	}

} 