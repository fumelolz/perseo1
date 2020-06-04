<?php 

// $item Es el parametro con el que se va a evaluar en la clase ctrMostrarClientes que en la base de datos sería $item = "id_cliente"
// $valor = id_cliente(2)
// $tabla = El nombre de la tabla en este caso "clientes"

// Tareas Hacer variables, $_POST[""]


class ControladorClientes{

	static public function ctrMostrarClientes($item,$valor){

		$tabla1 = "personas";
		$tabla2 = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla1,$tabla2,$item,$valor);

		return $respuesta;

	}

	// Esta función crea los clientes !!!
	static public function ctrCrearCliente(){
		if (isset($_POST["clienteNombre"])) {

			$tabla1 = "personas";
			$tabla2 = "clientes";

			$datos = array('nombre' => $_POST["clienteNombre"],
						   'ap_Paterno' => $_POST["clienteApPaterno"],
						   'ap_Materno' => $_POST["clienteApMaterno"],
						   'rfc' => $_POST["clienteRfc"],
						   'ine' => $_POST["clienteIne"],
						   'direccion' => $_POST["clienteDireccion"],
						   'pais' => $_POST["clientePais"],
						   'estado' => $_POST["clienteEstado"],
						   'ciudad' => $_POST["clienteCiudad"],
						   'fecha_nacimiento' => $_POST["clienteFechaNacimiento"]);


			$respuesta = ModeloClientes::mdlCrearCliente($tabla1,$tabla2,$datos);
			echo '<pre>'; print_r($respuesta); echo '</pre>';

		}
	}

	// Esta función edita los clientes !!!
	static public function ctrEditarCliente(){
		if (isset($_POST["editarIdCliente"])) {

			$tabla = "personas";

			$datos = array('id_persona' => $_POST["editarIdCliente"],
						   'nombre' => $_POST["editarClienteNombre"],
						   'ap_Paterno' => $_POST["editarClienteApPaterno"],
						   'ap_Materno' => $_POST["editarClienteApMaterno"],
						   'rfc' => $_POST["editarClienteRfc"],
						   'ine' => $_POST["editarClienteIne"],
						   'direccion' => $_POST["editarClienteDireccion"],
						   'pais' => $_POST["editarClientePais"],
						   'estado' => $_POST["editarClienteEstado"],
						   'ciudad' => $_POST["editarClienteCiudad"],
						   'fecha_nacimiento' => $_POST["editarClienteFechaNacimiento"]);

			// Muestra los datos que trae el array 
			// echo '<pre>'; print_r($datos); echo '</pre>';

		    $respuesta = ModeloClientes::mdlEditarCliente($tabla,$datos);
			echo '<pre>'; print_r($respuesta); echo '</pre>';

			if ($respuesta=="ok") {
				$alerta = AlertasPersonalizadas::alertaExito("EDITADO","SE EDITO CORRECTAMENTE","clientes");
			}

		}
	}

	// Funcion para borrar cliente
	static public function ctrEliminarCliente(){

		if (isset($_GET["idClienteEliminar"])) {
			
			$tabla = "clientes";

			$id_persona = $_GET["idClienteEliminar"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla,$id_persona);
			
			if ($respuesta=="ok") {
				$alerta = AlertasPersonalizadas::alertaExito("Eliminado","Se elimino correctamente","clientes");
			}

		}

	}

	//Funcion para mostrar los telefonos
	static public function ctrMostrarTelefonos($item,$valor){

		$tabla = "telefonos_personas";
		$respuesta = ModeloClientes::mdlMostrarTelefonos($tabla, $item, $valor);
		return $respuesta;
	}

	//Funcion para editar telefono
	static public function ctrEditarTelefonoClientes(){

		if (isset($_POST["idTelefono"])) {

			$tabla = "telefonos_personas";

			$datos = array('id_telefono' => $_POST["idTelefono"],
						   'descripcion' => $_POST["editarDescripcionTC"],
						   'telefono' => $_POST["editarTelefonoTC"],
						   );

		   $respuesta = ModeloClientes::mdlEditarTelefonos($tabla,$datos);

			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("TELEFONO EDITADO","Se edito el telefono correctamente","clientes");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo Editar","A ocurrido un error al editar telefono","error");
			}

		}
	}
	//Funcion para eliminar telefono cliente
	static public function ctrEliminarTelefonoCliente(){

		if (isset($_GET["idTelefono"])) {

			$tabla = "telefonos_personas";

			$id_telefono = $_GET["idTelefono"];

			$respuesta = ModeloClientes::mdlEliminarTelefonoCliente($tabla,$id_telefono);
			// echo '<pre>'; print_r($respuesta); echo '</pre>';

			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("TELEFONO ELIMINADO","El telefono se elimino correctamete","clientes");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se puede eliminar","A ocurrido un error al borrar el telefono","error");
			}

		}

	}

	//Funcion para agregar telefonos clientes
	static public function ctrAgregarTelefonoCliente(){

		if (isset($_POST["crearTelefonoCliente"])) {

			$tabla = "telefonos_personas";
			
			$datos = array('id_persona' => $_POST["crearTelefonoCliente"],
							'telefono' => $_POST["inputAgregarTelefonoCliente"],
							'descripcion' => $_POST["inputAgregarDescripcionCliente"],
							);

			$respuesta = ModeloClientes::mdlCrearTelefono($tabla,$datos);

			if($respuesta=="ok"){
				$alerta= AlertasPersonalizadas::alertaExito("AGREGADO","Se agrego correctamente","clientes"); 
			}
			else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo agregar","A ocurrido un error al agregar proveedor","error");
			}

			}

	}

	//Funcion mostrar a todos los correo
	static public function ctrMostrarCorreos($item,$valor){
		$tabla = "email_personas";
		$respuesta = ModeloClientes::mdlMostrarCorreos($tabla, $item, $valor);
		return $respuesta;
	}

	//Funcion editar Correo
	static public function ctrEditarCorreosCliente(){
		
		if (isset($_POST["idCorreo"])) {

			$tabla = "email_personas";

			$datos = array('id_email' => $_POST["idCorreo"],
						   'email' => $_POST["inputEditarCorreoCliente"],
						   );

		   $respuesta = ModeloClientes::mdlEditarCorreos($tabla,$datos);

			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("CORREO EDITADO","Se edito el correo correctamente","clientes");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo Editar","A ocurrido un error al editar correo","error");
			}

		}
	}

	static public function ctrEliminarCorreoCliente(){

		if (isset($_GET["idCorreo"])) {

			$tabla = "email_personas";

			$id_email = $_GET["idCorreo"];

			$respuesta = ModeloClientes::mdlEliminarCorreoCliente($tabla,$id_email);
			// echo '<pre>'; print_r($respuesta); echo '</pre>';
			if ($respuesta=="ok") {
				$alerta= AlertasPersonalizadas::alertaExito("CORREO ELIMINADO","El correo se elimino correctamete","clientes");
			}else{
				$alerta= AlertasPersonalizadas::alertaError("No se puede eliminar","A ocurrido un error al borrar el corrreo","error");
			}

		}

	}

	static public function ctrAgregarCorreoCliente(){

		if (isset($_POST["crearCorreoCliente"])) {

			$tabla = "email_personas";
			
			$datos = array('id_persona' => $_POST["crearCorreoCliente"],
							'email' => $_POST["inputAgregarCorreoCliente"],
							);

			$respuesta = ModeloClientes::mdlCrearCorreo($tabla,$datos);

			if($respuesta=="ok"){
				$alerta= AlertasPersonalizadas::alertaExito("AGREGADO","Se agrego correctamente","clientes");
			}
			else{
				$alerta= AlertasPersonalizadas::alertaError("No se pudo agregar","A ocurrido un error al agregar","error");
			}

			}

	}

}