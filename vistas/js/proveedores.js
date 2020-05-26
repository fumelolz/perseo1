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

//Funcion para ver todos los telefonos del usuario
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
			 // $("#idProveedorT").text(respuesta["id_proveedor"]);
			 $("#nombreProveedorT").text(respuesta["nombre"]);

			 //Mando el id del proveedor al modal agregar telefono
			 $("#idProveedorinfo").empty();
			 $("#idProveedorinfo").append('<input class="form-control" type="hidden" id="idProveedor" name="idProveedor" value='+respuesta["id_proveedor"]+'>');
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

			// for (var i = 0; i < respuesta.length; i++) {
			// 	$(".addTelefonos").append('<tr><td>'+
			// 							respuesta[i]["descripcion"]+
			// 							'</td><td>'+respuesta[i]["telefono"]+
			// 							'</td><td>'+
			// 							'<center>'+
			// 							'<div class="btn-group-sm">'+
			// 							'<button class="btn btn-warning btnEditarTelefonoProveedor" data-toggle="modal" data-target="#modalEditarTelefonosProveedor" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal">'+
			// 							'<i class="fas fa-pencil-alt"></i></button>'+
			// 							'<button class="btn btn-danger btnEliminarTelefonoProveedor" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal">'+
			// 							'<i class="fas fa-times"></i>'+
			// 							'</button>'+
			// 							'</div>'+
			// 							'</center>'+
			// 							'</td></tr>')
			// }
			for (var i = 0; i < respuesta.length; i++){
				//Se crea la descripcion  del telefono con una columna de 6 y la descripcion de correo de 6 columnas
				$("#divMostrarContacto").append('<div class="col-6"><p class="text-secondary">'+respuesta[i]["descripcion"]+'</p></div>'+
										'<div class="col-6"><p class="text-secondary">Correo '+(i+1)+'</p></div>');
				//Se crea el icono de telefono con una columa de 1
				$("#divMostrarContacto").append('<div class="col-1"><i class="fas fa-phone-square-alt fa-2x text-secondary"></i></div>');
				//Se crea el numero del proveedor con una columna de 3
				$("#divMostrarContacto").append('<div class="col-3"><p class="text-secondary" style="font-size: 20px;">'+respuesta[i]["telefono"]+'</p></div>');
				//Se crea los botones para editar o eliminar el numero de proveedor con una columna de 2
				$("#divMostrarContacto").append('<div class="col-2"><center>'+
										'<div class="btn-group-sm">'+
										'<button class="btn btn-warning btnEditarTelefonoProveedor" data-toggle="modal" data-target="#modalEditarTelefonosProveedor" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal">'+
										'<i class="fas fa-pencil-alt"></i></button>'+
										'<button class="btn btn-danger btnEliminarTelefonoProveedor" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal">'+
										'<i class="fas fa-times"></i>'+
										'</button>'+
										'</div>'+
										'</center></div>');
				//Se crea el icono de correo con una columna de 1
				$("#divMostrarContacto").append('<div class="col-1"><i class="fas fa-envelope fa-2x text-secondary"></i></div>');
				//Se crea el correo con una columna de 3
				$("#divMostrarContacto").append('<div class="col-3"><p class="text-secondary" style="font-size: 20px;">'+respuesta[i]["telefono"]+'</p></div>');
				//Se los botnes de acciones con una columna de 2
				$("#divMostrarContacto").append('<div class="col-2"><center>'+
										'<div class="btn-group-sm">'+
										'<button class="btn btn-warning btnEditarTelefonoProveedor" data-toggle="modal" data-target="#modalEditarTelefonosProveedor" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal">'+
										'<i class="fas fa-pencil-alt"></i></button>'+
										'<button class="btn btn-danger btnEliminarTelefonoProveedor" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal">'+
										'<i class="fas fa-times"></i>'+
										'</button>'+
										'</div>'+
										'</center></div>');

			}

		}
	});
	
});

//Funcion para ver los telefonos por id
$(document).on('click', '.btnEditarTelefonoProveedor', function(event) {
	
	var idTelefono = $(this).attr('idTelefono');

	var data = new FormData();
	data.append('mostrarIdTelefono',idTelefono);

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log(idTelefono);
			$("#editarDescripcion").empty();
			$("#editaTelefonos").empty();
			$("#EditnombreProvedor").text(respuesta[0]["id_proveedor"]);

			for(var i = 0; i < respuesta.length; i++){
				$("#editarDescripcion").append('<input type="hidden" id="idTelefono" name="idTelefono" value='+respuesta[i]["id_telefono"]+'>'+
					'Descripcion: '+
					'<input type="text"  class="form-control" placeholder="Descripcion" id="editarDescripcionT" name="editarDescripcionT" value='+respuesta[i]["descripcion"]+' required>'
					);
				$("#editaTelefonos").append('No. Telefono'+
			  	'<input type="text"  class="form-control" placeholder="Telefono" id="editarTelefonoT" name="editarTelefonoT" value='+respuesta[i]["telefono"]+' required>');
			}
	
		}
	});

	
});

//Boton para eliminar telefono
$(document).on('click', '.btnEliminarTelefonoProveedor', function(event) {
	
	var idTelefono = $(this).attr('idTelefono');
	
	Swal.fire({
		type: 'warning',
		title: '¿Estas seguro de eliminar este telefono?',
		text:'Se eliminara el telefono y no podras revertir el cambio.',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar Telefono!',
	}).then(function(result){

		if(result.value){

			 window.location = "index.php?ruta=proveedores&idTelefono="+idTelefono;

		}

	});

});