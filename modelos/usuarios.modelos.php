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

			$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

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

	// Función parar editar un usuario
	static public function mdlEditarUsuario($tabla1,$tabla2,$datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla1 SET nombre=:nombre, ap_Paterno=:ap_Paterno, ap_Materno=:ap_Materno, email=:email, rfc=:rfc, ine=:ine, direccion=:direccion, pais=:pais, estado=:estado, ciudad=:ciudad, fecha_nacimiento=:fecha_nacimiento WHERE id_persona=:id_persona");
		$stmt2 = Conexion::conectar()->prepare("UPDATE $tabla2 SET password=:password, nivel=:nivel WHERE id_persona=:id_persona");

		$stmt -> bindParam(":id_persona",$datos["id_persona"],PDO::PARAM_INT);
		$stmt -> bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt -> bindParam(":ap_Paterno",$datos["ap_Paterno"],PDO::PARAM_STR);
		$stmt -> bindParam(":ap_Materno",$datos["ap_Materno"],PDO::PARAM_STR);
		$stmt -> bindParam(":email",$datos["email"],PDO::PARAM_STR);
		$stmt -> bindParam(":rfc",$datos["rfc"],PDO::PARAM_STR);
		$stmt -> bindParam(":ine",$datos["ine"],PDO::PARAM_STR);
		$stmt -> bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
		$stmt -> bindParam(":pais",$datos["pais"],PDO::PARAM_STR);
		$stmt -> bindParam(":estado",$datos["estado"],PDO::PARAM_STR);
		$stmt -> bindParam(":ciudad",$datos["ciudad"],PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_nacimiento",$datos["fecha_nacimiento"],PDO::PARAM_STR);

		$stmt2 -> bindParam(":id_persona",$datos["id_persona"],PDO::PARAM_INT);
		$stmt2 -> bindParam(":password",$datos["password"],PDO::PARAM_STR);
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