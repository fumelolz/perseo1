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

// Activar Proveedor
$(document).on('click', '.btnActivarProveedor', function(event) {
	
	var idProveedor = $(this).attr('idProveedor');
	var estado = $(this).attr('estado');

	var data = new FormData();
	data.append('idProveedorEstado', idProveedor);
	data.append('estado', estado);

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(reply){

			//console.log("reply", reply);

			if (window.matchMedia("(max-width:767px)").matches) {

				Swal.fire({
					type: 'success',
					title: 'El usuario ha sido actualizado',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
				}).then(function(result){

					if(result.value){

						window.location = 'proveedores-eliminados';

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

//Funcion para ver los telefonos
$(document).on('click', '.btnTelefonoProveedor', function(event) {
	
	var idProveedor = $(this).attr('idProveedor');

	var data = new FormData();
	data.append('mostrarProveedor',idProveedor);

	var data1 = new FormData();
	data1.append('mostrarTelefonos',idProveedor);

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			 $("#idProveedorT").text(respuesta["id_proveedor"]);
			 $("#nombreProveedorT").text(respuesta["nombre"]);
			// console.log(respuesta["id_proveedor"]);
		}
	});

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data1,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			//console.log("respuesta", respuesta);
			$(".addTelefonos").empty();

			for (var i = 0; i < respuesta.length; i++) {
				$(".addTelefonos").append('<tr><td>'+
										respuesta[i]["descripcion"]+
										'</td><td>'+respuesta[i]["telefono"]+
										'</td><td>'+
										'<center>'+
										'<div class="btn-group-sm">'+
										'<button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.respuesta[i]["id_telefono"].'" >'+
										'<i class="fas fa-pencil-alt"></i></button>'+
										'<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.respuesta[i]["id_telefono"].'">'+
										'<i class="fas fa-times"></i>'+
										'</button>'+
										'</div>'+
										'</center>'+
										'</td></tr>')
			}

		}
	});
	
});
