// Editar un usuario
$(document).on('click', '.btnEditarUsuario', function(event) {
	
	var idUsuario = $(this).attr('idUsuario');
	
	var data = new FormData();
	data.append('idUsuarioEditar',idUsuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);
			$("#editarIdUsuario").attr('value',reply["id_persona"]);
			$("#editarUsuarioNombre").attr('value', reply["nombre"]);
			$("#editarUsuarioApPaterno").attr('value', reply["ap_Paterno"]);
			$("#editarUsuarioApMaterno").attr('value', reply["ap_Materno"]);
			$("#editarUsuarioEmail").attr('value', reply["email"]);
			$("#editarUsuarioRfc").attr('value', reply["rfc"]);
			$("#editarUsuarioIne").attr('value', reply["ine"]);
			$("#editarUsuarioDireccion").attr('value', reply["direccion"]);
			$("#editarUsuarioPais").attr('value', reply["pais"]);
			$("#editarUsuarioEstado").attr('value', reply["estado"]);
			$("#editarUsuarioCiudad").attr('value', reply["ciudad"]);
			$("#editarUsuarioFechaNacimiento").attr('value', reply["fecha_nacimiento"]);
			$("#passActual").attr('value', reply["password"]);
			$("#editarUsuarioUsername").attr('value', reply["username"]);

			if (reply["nivel"] == 0) {
				$("#editarUsuarioNivel0").attr('checked', true);
			}else{
				$("#editarUsuarioNivel1").attr('checked', true);
			}

		}
	});

});