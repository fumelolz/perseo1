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
		}
	});

});