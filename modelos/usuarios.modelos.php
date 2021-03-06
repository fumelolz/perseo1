<?php 

require_once 'conexion.php';

class ModeloUsuarios{

	static public function mdlMostrarUsuarios($tabla1,$tabla2,$item,$valor){

		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla1
				INNER JOIN $tabla2
				ON $tabla1.id_persona=$tabla2.id_persona
				WHERE $tabla1.$item = :$item
				");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla1
				INNER JOIN $tabla2
				ON $tabla1.id_persona=$tabla2.id_persona");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarUsuarioDatos($tabla,$item,$valor){

		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE username = :$item ");

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		

		$stmt -> close();

		$stmt = null;

	}

	// Función parar crear un usuario
	static public function mdlCrearUsuario($tabla1,$tabla2,$datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(nombre,ap_Paterno,ap_Materno,rfc,ine,direccion,pais,estado,ciudad,fecha_nacimiento) VALUES(:nombre,:ap_Paterno,:ap_Materno,:rfc,:ine,:direccion,:pais,:estado,:ciudad,:fecha_nacimiento)");
		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(id_persona,username,password,ruta_imagen,fecha_alta,nivel) VALUES(:id_persona,:username,:password,:ruta_imagen,:fecha_alta,:nivel)");

		$stmt3 = Conexion::conectar()->prepare("SELECT id_persona FROM personas ORDER BY id_persona DESC LIMIT 1");

		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":ap_Paterno",$datos["ap_Paterno"],PDO::PARAM_STR);
		$stmt -> bindParam(":ap_Materno",$datos["ap_Materno"],PDO::PARAM_STR);
		$stmt -> bindParam(":rfc",$datos["rfc"],PDO::PARAM_STR);
		$stmt -> bindParam(":ine",$datos["ine"],PDO::PARAM_STR);
		$stmt -> bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
		$stmt -> bindParam(":pais",$datos["pais"],PDO::PARAM_STR);
		$stmt -> bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
		$stmt -> bindParam(":ciudad",$datos["ciudad"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_nacimiento",$datos["fecha_nacimiento"],PDO::PARAM_STR);

		$stmt -> execute();
		$stmt3 -> execute();

		$ultimo_persona_registrada = $stmt3 -> fetch();
		$u_p_r = $ultimo_persona_registrada[0];

		$stmt2 -> bindParam(":id_persona",$u_p_r,PDO::PARAM_INT);
		$stmt2 -> bindParam(":username",$datos["username"],PDO::PARAM_STR);
		$stmt2 -> bindParam(":password",$datos["password"],PDO::PARAM_STR);
		$stmt2 -> bindParam(":ruta_imagen",$datos["ruta_imagen"],PDO::PARAM_STR);
		$stmt2 -> bindParam(":fecha_alta",$datos["fecha_alta"],PDO::PARAM_STR);
		$stmt2 -> bindParam(":nivel",$datos["nivel"],PDO::PARAM_INT);

		if($stmt2 -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
		$stmt2 -> close();
		$stmt2 = null;

		$stmt3 -> close();
		$stmt3 =null;

	}

	// Función parar editar un usuario
	static public function mdlEditarUsuario($tabla1,$tabla2,$datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla1 SET nombre=:nombre, ap_Paterno=:ap_Paterno, ap_Materno=:ap_Materno, rfc=:rfc, ine=:ine, direccion=:direccion, pais=:pais, estado=:estado, ciudad=:ciudad, fecha_nacimiento=:fecha_nacimiento WHERE id_persona=:id_persona");
		$stmt2 = Conexion::conectar()->prepare("UPDATE $tabla2 SET password=:password, ruta_imagen=:ruta_imagen, nivel=:nivel WHERE id_persona=:id_persona");

		$stmt -> bindParam(":id_persona",$datos["id_persona"],PDO::PARAM_INT);
		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":ap_Paterno",$datos["ap_Paterno"],PDO::PARAM_STR);
		$stmt -> bindParam(":ap_Materno",$datos["ap_Materno"],PDO::PARAM_STR);
		$stmt -> bindParam(":rfc",$datos["rfc"],PDO::PARAM_STR);
		$stmt -> bindParam(":ine",$datos["ine"],PDO::PARAM_STR);
		$stmt -> bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
		$stmt -> bindParam(":pais",$datos["pais"],PDO::PARAM_STR);
		$stmt -> bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
		$stmt -> bindParam(":ciudad",$datos["ciudad"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_nacimiento",$datos["fecha_nacimiento"],PDO::PARAM_STR);

		$stmt2 -> bindParam(":id_persona",$datos["id_persona"],PDO::PARAM_INT);
		$stmt2 -> bindParam(":password",$datos["password"],PDO::PARAM_STR);
		$stmt2 -> bindParam(":ruta_imagen",$datos["ruta_imagen"],PDO::PARAM_STR);
		$stmt2 -> bindParam(":nivel",$datos["nivel"],PDO::PARAM_INT);

		if($stmt -> execute() && $stmt2 -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
		$stmt2 -> close();
		$stmt2 = null;

	}

	static public function mdlActivarUsuario($tabla,$item1,$valor1,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2=:$item2 WHERE $item1=:$item1");

		$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_INT);
		$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";

		}

		$stmt -> close();
		$stmt = null;
	}
}