<?php 

class ControladorUsuarios{

	static public function ctrMostrarUsuarios($item,$valor){

		$tabla1 = "personas";
		$tabla2 = "usuarios";
		

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla1,$tabla2,$item,$valor);

		return $respuesta;

	}

	static public function ctrCrearUsuario(){

		if (isset($_POST["usuarioNombre"])) {

			$tabla1 = "personas";
			$tabla2 = "usuarios";
			
			$nombre = $_POST["usuarioNombre"];
			$ap_Paterno = $_POST["usuarioApPaterno"];
			$ap_Materno = $_POST["usuarioApMaterno"];
			$email = $_POST["usuarioEmail"];
			$rfc = $_POST["usuarioRfc"];
			$ine = $_POST["usuarioIne"];
			$direccion = $_POST["usuarioDireccion"];
			$pais = $_POST["usuarioPais"];
			$estado = $_POST["usuarioEstado"];
			$ciudad = $_POST["usuarioCiudad"];
			$fecha_nacimiento = $_POST["usuarioFechaNacimiento"];
			$username = $_POST["usuarioUsername"];
			$password = crypt($_POST["usuarioPassword"], '$2a$07$hayvcesawdquesnwoasusdos$');
			$nivel = $_POST["usuarioNivel"];
			$fecha_alta  = ControladorDB::ctrMostrarFecha();

			$datos = array('nombre' => $nombre,
						   'ap_Paterno' => $ap_Paterno,
						   'ap_Materno' => $ap_Materno,
						   'email' => $email,
						   'rfc' => $rfc,
						   'ine' => $ine,
						   'direccion' => $direccion,
						   'pais' => $pais,
						   'estado' => $estado,
						   'ciudad' => $ciudad,
						   'fecha_nacimiento' => $fecha_nacimiento,
						   'username' => $username,
						   'password' => $password,
						   'nivel' => $nivel,
						   'fecha_alta' => $fecha_alta);

			// Mostrar los datos del array
			// echo '<pre>'; print_r($datos); echo '</pre>';

			$respuesta = ModeloUsuarios::mdlCrearUsuario($tabla1,$tabla2,$datos);

			if ($respuesta = "ok") {
				$alerta = AlertasPersonalizadas::alertaExito("Usuario Creado", "El usuario ha sido creado correctamente","usuarios");
			}else{
				$alerta = AlertasPersonalizadas::alertaBasica("Ha ocurrido un error");
			}

		}
		
	}

	static public function ctrEditarUsuario(){

		if (isset($_POST["editarIdUsuario"])) {

			$tabla1 = "personas";
			$tabla2 = "usuarios";

			$id_persona = $_POST["editarIdUsuario"];
			$nombre = $_POST["editarUsuarioNombre"];
			$ap_Paterno = $_POST["editarUsuarioApPaterno"];
			$ap_Materno = $_POST["editarUsuarioApMaterno"];
			$email = $_POST["editarUsuarioEmail"];
			$rfc = $_POST["editarUsuarioRfc"];
			$ine = $_POST["editarUsuarioIne"];
			$direccion = $_POST["editarUsuarioDireccion"];
			$pais = $_POST["editarUsuarioPais"];
			$estado = $_POST["editarUsuarioEstado"];
			$ciudad = $_POST["editarUsuarioCiudad"];
			$fecha_nacimiento = $_POST["editarUsuarioFechaNacimiento"];
			$username = $_POST["editarUsuarioUsername"];
			$passwordActual = $_POST["passActual"];
			$passwordNuevo = $_POST["editarUsuarioPassword"];
			$nivel = $_POST["editarUsuarioNivel"];
			$fecha_alta  = ControladorDB::ctrMostrarFecha();
			$password = "";

			if (isset($_POST["editarUsuarioPassword"]) && !empty($_POST["editarUsuarioPassword"])) {
				$password = crypt($passwordNuevo, '$2a$07$hayvcesawdquesnwoasusdos$');
			}else{
				$password = $passwordActual;
			}

			

			$datos = array('id_persona' => $id_persona,
						   'nombre' => $nombre,
						   'ap_Paterno' => $ap_Paterno,
						   'ap_Materno' => $ap_Materno,
						   'email' => $email,
						   'rfc' => $rfc,
						   'ine' => $ine,
						   'direccion' => $direccion,
						   'pais' => $pais,
						   'estado' => $estado,
						   'ciudad' => $ciudad,
						   'fecha_nacimiento' => $fecha_nacimiento,
						   'username' => $username,
						   'password' => $password,
						   'nivel' => $nivel,
						   'fecha_alta' => $fecha_alta);

			// Mostrar los datos del array
			echo '<pre>'; print_r($datos); echo '</pre>';

		    $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla1,$tabla2,$datos);
			echo '<pre>'; print_r($respuesta); echo '</pre>';

			if ($respuesta = "ok") {
				$alerta = AlertasPersonalizadas::alertaExito("Usuario Actualizado", "El usuario ha sido actualizado correctamente","usuarios");
			}else{
				$alerta = AlertasPersonalizadas::alertaBasica("Ha ocurrido un error");
			}

		}
		
	}

	static public function ctrEliminarUsuario(){

		if (isset($_GET["idUsuarioEliminar"])) {
			echo '<script>alert("Si")</script>';
		}

	}

}