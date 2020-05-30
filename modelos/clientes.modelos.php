<?php 
 
require_once 'conexion.php';

class ModeloClientes{

	// Muestra todos los clientes y tambien filtra por id_cliente
	static public function mdlMostrarClientes($tabla1,$tabla2,$item,$valor){

		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("
				SELECT * 
				FROM $tabla1
				INNER JOIN $tabla2
				ON $tabla1.id_persona=$tabla2.id_persona
				WHERE personas.$item = :$item
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

	// Función parar crear un cliente
	static public function mdlCrearCliente($tabla1,$tabla2,$datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla1(nombre,ap_Paterno,ap_Materno,rfc,ine,direccion,pais,estado,ciudad,fecha_nacimiento) VALUES(:nombre,:ap_Paterno,:ap_Materno,:rfc,:ine,:direccion,:pais,:estado,:ciudad,:fecha_nacimiento)");
		$stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(id_persona) VALUES(:id_persona)");

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

		$stmt3 -> execute();

		$ultimo_persona_registrada = $stmt3 -> fetch();
		$u_p_r = $ultimo_persona_registrada[0]+1;

		$stmt2 -> bindParam(":id_persona",$u_p_r,PDO::PARAM_INT);

		if($stmt -> execute() && $stmt2 -> execute()){
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


	// Funcion para editar un cliente por su id
	static public function mdlEditarCliente($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, ap_Paterno=:ap_Paterno, ap_Materno=:ap_Materno, rfc=:rfc, ine=:ine, direccion=:direccion, pais=:pais, estado=:estado, ciudad=:ciudad, fecha_nacimiento=:fecha_nacimiento WHERE id_persona=:id_persona");

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

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	// Funccion para eliminar un cliente por su id, no se leimina si no que cambia su estado a inhabilitado
	static public function mdlEliminarCliente($tabla,$id_persona){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado_cliente=0 WHERE id_persona=:id_persona");

		$stmt -> bindParam(":id_persona",$id_persona,PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;

	}

	//Funcion para Mostrar los telefonos
	static public function mdlMostrarTelefonos($tabla, $item, $valor){
			if($item != null){ 
				$stmt = Conexion::conectar()->prepare(" SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item,$valor,PDO::PARAM_INT);

				$stmt -> execute();

				return $stmt -> fetchAll();
			}
			else{
				$stmt = Conexion::conectar()->prepare(" SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();
			}

			$stmt -> close();
			$stmt = null;
	}

	//Funcion para editar Telefonos
	static public function mdlEditarTelefonos($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET telefono=:telefono, descripcion=:descripcion WHERE id_telefono=:id_telefono");

		$stmt -> bindParam(":id_telefono",$datos["id_telefono"],PDO::PARAM_INT);
		$stmt -> bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}

	//Funcion para eliminar telefonos clientes
	static public function mdlEliminarTelefonoCliente($tabla,$id_telefono){

		$stmt = Conexion::conectar()->prepare("DELETE FROM  $tabla WHERE id_telefono=:id_telefono");

		$stmt -> bindParam(":id_telefono",$id_telefono,PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "ok";
		}else{
			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}
	//Funcion para agregar telefono clientes
	static public function mdlCrearTelefono($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_persona,telefono,descripcion) VALUES(:id_persona,:telefono,:descripcion)");

		$stmt -> bindParam(":id_persona",$datos["id_persona"],PDO::PARAM_STR);
		$stmt -> bindParam(":telefono",$datos["telefono"],PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
		$stmt = null;
	}

}