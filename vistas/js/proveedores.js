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
			//console.log("respuesta", respuesta);
			$("#editarIdProveedor").attr('value',respuesta["id_proveedor"]);
			$("#editarProveedorNombre").attr('value',respuesta["nombre"]);

		}
	});
	
});

// Boton para elminar un cliente
$(document).on('click', '.btnEliminarProveedor', function(event) {
	
	var idProveedor = $(this).attr('idProveedor');
	
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al proveedor',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar proveedor!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=proveedores&idProveedorEliminar="+idProveedor;

		}

	});

});