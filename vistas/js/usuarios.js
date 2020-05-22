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
			}else if(reply["nivel"] == 1){
				$("#editarUsuarioNivel1").attr('checked', true);
			}

		}
	});

});

// Boton para elminar un usuario
$(document).on('click', '.btnEliminarUsuario', function(event) {
	
	var idUsuario = $(this).attr('idUsuario');
	
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al Usuario?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar Usuario!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=usuarios&idUsuarioEliminar="+idUsuario;

		}

	});

});

// Click para activar un usuario 
$(document).on('click', '.btnActivarUsuario', function(event) {

	var idUsuario = $(this).attr('idUsuario');
	var estado = $(this).attr('estado');
	
	var data = new FormData();
	data.append('idActivarUsuario',idUsuario);
	data.append('estado',estado);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(reply){

			if (window.matchMedia("(max-width:767px)").matches) {

				Swal.fire({
					type: 'success',
					title: 'El usuario ha sido actualizado',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
				}).then(function(result){

					if(result.value){

						window.location = 'usuarios';

					}

				});
			}
		}
	});

	if (estado == 0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estado', '1');
	}else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estado', '0');
	}


});