// Ajax
// $.ajax({
// 		url:"ajax/ruta",
// 		method:"POST",
// 		data: data,
// 		cache: false,
// 		contentType: false,
// 		processData: false,
// 		dataType: "json",
// 		success: function(reply){
// 			console.log("reply", reply);
// 		}
// 	});


// Se llama la acción al boton editar cliente al momento de hacer click

$(document).on('click', '.btnEditarCliente', function(event) {
	
	var idCliente = $(this).attr('idCliente');

	var data = new FormData();
	data.append('mostrarCliente',idCliente);

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			// Muestra lo que trae la respuesta
			// console.log("respuesta", respuesta);

			$("#editarIdCliente").attr('value', respuesta["id_persona"]);
			$("#editarClienteNombre").attr('value', respuesta["nombre"]);
			$("#editarClienteApPaterno").attr('value', respuesta["ap_Paterno"]);
			$("#editarClienteApMaterno").attr('value', respuesta["ap_Materno"]);
			$("#editarClienteEmail").attr('value', respuesta["email"]);
			$("#editarClienteRfc").attr('value', respuesta["rfc"]);
			$("#editarClienteIne").attr('value', respuesta["ine"]);
			$("#editarClienteDireccion").attr('value', respuesta["direccion"]);
			$("#editarClientePais").attr('value', respuesta["pais"]);
			$("#editarClienteEstado").attr('value', respuesta["estado"]);
			$("#editarClienteCiudad").attr('value', respuesta["ciudad"]);
			$("#editarClienteFechaNacimiento").attr('value', respuesta["fecha_nacimiento"]);
		}
	});
	
});

// Boton para elminar un cliente
$(document).on('click', '.btnEliminarCliente', function(event) {
	
	var idCliente = $(this).attr('idCliente');
	
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al cliente?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar cliente!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=clientes&idClienteEliminar="+idCliente;

		}

	});

});
