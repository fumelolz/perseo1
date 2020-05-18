$(document).on('click', '.btnEditarProveedor', function(event) {
	
	var idProveedor = $(this).attr('idProveedor');

	var data = new FormData();
	data.append('mostrarProveedor',idProveedor);

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			// Muestra lo que trae la respuesta
			console.log("respuesta", respuesta);

		}
	});
	
});