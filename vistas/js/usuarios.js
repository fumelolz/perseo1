// Editar un usuario
$(document).on('click', '.btnEditarUsuario', function(event) {

	$("#editarUsuarioFoto").val("");
	
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
			$("#editarUsuarioRfc").attr('value', reply["rfc"]);
			$("#editarUsuarioIne").attr('value', reply["ine"]);
			$("#editarUsuarioDireccion").attr('value', reply["direccion"]);
			$("#editarUsuarioPais").attr('value', reply["pais"]);
			$("#editarUsuarioEstado").attr('value', reply["estado"]);
			$("#editarUsuarioCiudad").attr('value', reply["ciudad"]);
			$("#editarUsuarioFechaNacimiento").attr('value', reply["fecha_nacimiento"]);
			$("#passActual").attr('value', reply["password"]);
			$("#fotoActual").attr('value', reply["ruta_imagen"]);
			$("#editarUsuarioUsername").attr('value', reply["username"]);

			if (reply["nivel"] == 0) {
				$("#editarUsuarioNivel0").attr('checked', true);
			}else if(reply["nivel"] == 1){
				$("#editarUsuarioNivel1").attr('checked', true);
			}

			if (reply["ruta_imagen"] != "") {
				$(".imagenPreviaEditar").attr('src',reply["ruta_imagen"]);
			}else if(reply["ruta_imagen"] == ""){
				$(".imagenPreviaEditar").attr('src', 'vistas/img/producto-default.png');
			}

		}
	});

});

/*Subir foto de usuario*/

$("#usuarioFoto").change(function(event) {
	$(".imagenPrevia").attr('src', '');

	var imagen = this.files[0];
	
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$("#usuarioFoto").attr('value', '');
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(imagen["size"]>500000){
		$("#usuarioFoto").attr('value', '');
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe pesar menos de 5Mb",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else{
		var imageData = new FileReader;
		imageData.readAsDataURL(imagen);
		$(imageData).on('load', function(event) {
			
			var imageUrl = event.target.result;
			$(".imagenPrevia").attr('src', imageUrl);
			
		});
	}

});

/*Editar foto de usuario*/

$("#editarUsuarioFoto").change(function(event) {
	$(".imagenPreviaEditar").attr('src', '');

	var imagen = this.files[0];
	
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$("#editarUsuarioFoto").attr('value', '');
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(imagen["size"]>500000){
		$("#editarUsuarioFoto").attr('value', '');
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe pesar menos de 5Mb",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else{
		var imageData = new FileReader;
		imageData.readAsDataURL(imagen);
		$(imageData).on('load', function(event) {
			
			var imageUrl = event.target.result;
			$(".imagenPreviaEditar").attr('src', imageUrl);
			
		});
	}

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