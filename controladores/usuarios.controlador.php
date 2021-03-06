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
			$rfc = $_POST["usuarioRfc"];
			$ine = $_POST["usuarioIne"];
			$direccion = $_POST["usuarioDireccion"];
			$pais = $_POST["usuarioPais"];
			$estado = $_POST["usuarioEstado"];
			$ciudad = $_POST["usuarioCiudad"];
			$fecha_nacimiento = $_POST["usuarioFechaNacimiento"];
			$username = strtolower($_POST["usuarioUsername"]);
			$password = crypt($_POST["usuarioPassword"], '$2a$07$hayvcesawdquesnwoasusdos$');
			$nivel = $_POST["usuarioNivel"];
			$fecha_alta  = ControladorDB::ctrMostrarFecha();
			$ruta_imagen = "";

			if (isset($_FILES["usuarioFoto"]["tmp_name"]) && !empty($_FILES["usuarioFoto"]["tmp_name"])) {	
				
				list($ancho,$alto) = getimagesize($_FILES["usuarioFoto"]["tmp_name"]);

				/* Crear El directorio donde vamos a guardar la foto del usuario */
				$directorio = "vistas/img/usuarios/".$username;
				mkdir($directorio,0755);

				/* De acuerdo al tipo de imagen jpeg */
				if ($_FILES["usuarioFoto"]["type"] == "image/jpeg") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/usuarios/".$username."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["usuarioFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagejpeg($destino,$ruta_imagen);
				}

				/* De acuerdo al tipo de imagen png */
				if ($_FILES["usuarioFoto"]["type"] == "image/png") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/usuarios/".$username."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["usuarioFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagepng($destino,$ruta_imagen);
				}

			}

			$datos = array('nombre' => $nombre,
				'ap_Paterno' => $ap_Paterno,
				'ap_Materno' => $ap_Materno,
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
				'fecha_alta' => $fecha_alta["fecha"],
				'ruta_imagen' => $ruta_imagen);

			// Mostrar los datos del array
		    //echo '<pre>'; print_r($datos); echo '</pre>';

			$respuesta = ModeloUsuarios::mdlCrearUsuario($tabla1,$tabla2,$datos);
			echo '<pre>'; print_r($respuesta); echo '</pre>';

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
			$ruta_imagen = $_POST["fotoActual"];

			if (isset($_POST["editarUsuarioPassword"]) && !empty($_POST["editarUsuarioPassword"])) {
				$password = crypt($passwordNuevo, '$2a$07$hayvcesawdquesnwoasusdos$');
			}else{
				$password = $passwordActual;
			}

			if (isset($_FILES["editarUsuarioFoto"]["tmp_name"]) && !empty($_FILES["editarUsuarioFoto"]["tmp_name"])) {
					
				list($ancho,$alto) = getimagesize($_FILES["editarUsuarioFoto"]["tmp_name"]);

				/* Crear El directorio donde vamos a guardar la foto del proucto */
				$directorio = "vistas/img/usuarios/".$username;

				if (!empty($_POST["fotoActual"])) {
					unlink($_POST["fotoActual"]);
				}else{
					mkdir($directorio,0755);
				}

				/* De acuerdo al tipo de imagen jpeg */
				if ($_FILES["editarUsuarioFoto"]["type"] == "image/jpeg") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/usuarios/".$username."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarUsuarioFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagejpeg($destino,$ruta_imagen);
				}

				/* De acuerdo al tipo de imagen png */
				if ($_FILES["editarUsuarioFoto"]["type"] == "image/png") {

					/* Guardamos en el directorio */

					$aleatorio = mt_rand(100,999);

					$ruta_imagen = "vistas/img/usuarios/".$username."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarUsuarioFoto"]["tmp_name"]);

					$destino = imagecreatetruecolor($ancho, $alto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);

					imagepng($destino,$ruta_imagen);
				}

			}

			$datos = array('id_persona' => $id_persona,
				'nombre' => $nombre,
				'ap_Paterno' => $ap_Paterno,
				'ap_Materno' => $ap_Materno,
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
				'fecha_alta' => $fecha_alta["fecha"],
				'ruta_imagen' => $ruta_imagen);

			// Mostrar los datos del array
			// echo '<pre>'; print_r($datos); echo '</pre>';

			$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla1,$tabla2,$datos);
			// echo '<pre>'; print_r($respuesta); echo '</pre>';

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

	static public function ctrActivarUsuario($item1,$valor1,$item2,$valor2){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActivarUsuario($tabla,$item1,$valor1,$item2,$valor2);

		return $respuesta;

	}

	static public function ctrLoginUsuario(){

		if (isset($_POST["username"])) {

			$username = strtolower($_POST["username"]);
			$password = crypt($_POST["password"], '$2a$07$hayvcesawdquesnwoasusdos$');
			
			$tabla = "usuarios";

			$item = "usuario";
			$valor = $username;

			$respuesta = ModeloUsuarios::mdlMostrarUsuarioDatos($tabla,$item,$valor);
			
			if ($username == $respuesta["username"]) {
				
				if (hash_equals($password,$respuesta["password"])) {
					
					if ($respuesta["state"] == 1) {

						$datos_usuario = ControladorUsuarios::ctrMostrarUsuarios("id_persona",$respuesta["id_persona"]);

						$_SESSION["logged"]= "ok";
						$_SESSION["id_usuario"] = $respuesta["id_usuario"];
						$_SESSION["username"] = $respuesta["username"];
						$_SESSION["nombre_usuario"] = $datos_usuario["nombre"].' '.$datos_usuario["ap_Paterno"];
						$_SESSION["nivel"] = $respuesta["nivel"];
						$_SESSION["fecha_alta"] = $respuesta["fecha_alta"];
						$_SESSION["ruta_imagen"] = $respuesta["ruta_imagen"];
						$_SESSION["token"] = md5(uniqid(mt_rand(), true));

						$fecha_servidor = ControladorDB::ctrMostrarFecha();

						$item1 = "id_usuario";
						$valor1 = $respuesta["id_usuario"];
						$item2 = "ultimo_login";
						$valor2 = $fecha_servidor["fecha"].' '.$fecha_servidor["hora"];


						$respuesta = ModeloUsuarios::mdlActivarUsuario($tabla,$item1,$valor1,$item2,$valor2);
						
						if ($respuesta == "ok") {
							echo '<script> 
							var url = window.location.pathname;
							window.location = url; 
							</script>';
						}

					}else{
						echo 'El usuario esta desactivado';
					}

				}else{
					echo 'La contraseña no coincide';
				}

			}else{
				echo 'Hubo un error en el usuario';
			}

		}

	}

	static public function cerrarSesion(){

		if (isset($_GET["csrf"]) && $_GET["csrf"] == $_SESSION["token"]) {

			session_destroy();

			echo "
			<script>
			window.location = 'home'
			</script>";

		}else{
			echo "
			<script>
			window.location = 'esto-noexiste'
			</script>";
		}

	}

}