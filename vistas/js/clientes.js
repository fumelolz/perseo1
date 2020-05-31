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

//Funcion para Mostrar el contacto de los proveedores
$(document).on('click', '.btnContactoCliente', function(event) {
	
	var idCliente = $(this).attr('idCliente');

	var datosClientes = new FormData();
	datosClientes.append('mostrarCliente',idCliente);

	var datosTelefonos = new FormData();
	datosTelefonos.append('mostrarTelefonos',idCliente);

	// var datosCorreos= new FormData();
	// datosCorreos.append('mostrarCorreos',idCliente);

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: datosClientes,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			 $("#nombreCliente").text(respuesta["nombre"]+" "+respuesta["ap_Paterno"]);

			 //Mando el id del proveedor al modal agregar telefono
			 $("#idClienteinfo").empty();
			 $("#idClienteinfo").append('<input class="form-control" type="hidden" id="crearTelefonoCliente" name="crearTelefonoCliente" value='+respuesta["id_cliente"]+'>');
			 //Mando el id del proveedor al modal agregar correo
			 // $("#idProveedorinfo2").empty();
			 // $("#idProveedorinfo2").append('<input class="form-control" type="hidden" id="crearCorreo" name="crearCorreo" value='+respuesta["id_proveedor"]+'>');

		}
	});

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: datosTelefonos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#MostrarTelefonosCI2").empty();
			if(respuesta.length==0){
				$("#MostrarTelefonosCI2").append('<div class="col-12 text-secondary"> <i class="fas fa-info-circle mr-2"></i>No se encontraron telefonos de este cliente.</div>');
			}

			for (var i = 0; i < respuesta.length; i++){
				//Se crea la descripcion  del telefono con una columna de 12 columnas
				$("#MostrarTelefonosCI2").append('<div class="col-12"><div class="text-secondary">'+respuesta[i]["descripcion"]+'</div></div>');

				//Se crea el icono de telefono con una columa de 2
				$("#MostrarTelefonosCI2").append('<div class="col-2"><i class="fas fa-phone-square-alt fa-2x text-secondary"></i></div>');
				//Se crea el numero del proveedor con una columna de 6
				$("#MostrarTelefonosCI2").append('<div class="col-6"><p class="text-secondary overflow-auto telefonoPortapapeles" style="font-size: 20px;" data-toggle="tooltip" data-placement="top" title="Da clic para copiarlo al portapapeles.">'+respuesta[i]["telefono"]+'</p></div>');
				//Se crea el boton para editar de 2 columna
				$("#MostrarTelefonosCI2").append('<div class="col-1"><i class="far fa-edit btnEditarTelefonoCliente text-warning" data-toggle="modal" data-target="#modalEditarTelefonosCliente" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				//Se crea el boton´para eliminar telefono de 2 columnas
				$("#MostrarTelefonosCI2").append('<div class="col-1"><i class="far fa-trash-alt btnEliminarTelefonoCliente text-danger" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				
			}

		}
	});
	
	// $.ajax({
	// 	url:"ajax/proveedores.ajax.php",
	// 	method:"POST",
	// 	data: datosCorreos,
	// 	cache: false,
	// 	contentType: false,
	// 	processData: false,
	// 	dataType: "json",
	// 	success: function(respuesta){
	// 		console.log(respuesta);

	// 		$("#MostrarCorreosCD").empty();

	// 		if(respuesta.length==0){
	// 			$("#MostrarCorreosCD").append('<div class="col-12 text-secondary"> <i class="fas fa-info-circle mr-2"></i>No se  encontraron correos de este proveedor</div>');
	// 		}

	// 		for (var i = 0; i < respuesta.length; i++){
	// 			//Se crea la descripcion  del correo con una columna de 12 columnas
	// 			$("#MostrarCorreosCD").append('<div class="col-12"><div class="text-secondary">Correo no.'+(i+1)+'</div></div>');

	// 			//Se crea el icono de correo con una columna de 2
	// 			$("#MostrarCorreosCD").append('<div class="col-2"><i class="fas fa-envelope fa-2x text-secondary"></i></div>');
	// 			//Se crea el correo con una columna de 6
	// 			$("#MostrarCorreosCD").append('<div class="col-6"><div class="text-secondary overflow-auto emailPortapapeles" data-toggle="tooltip" data-placement="top" title="Da clic para copiarlo al portapapeles.">'+respuesta[i]["email"]+'</div></div>');
	// 			//Se crea el boton para editar de 2 columna
	// 			$("#MostrarCorreosCD").append('<div class="col-1"><i class="far fa-edit btnEditarCorreoProveedor text-warning" data-toggle="modal" data-target="#modalEditarCorreosProveedor" idCorreo="'+respuesta[i]["id_email"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
	// 			//Se crea el boton´para eliminar correo
	// 			$("#MostrarCorreosCD").append('<div class="col-1"><i class="far fa-trash-alt btnEliminarCorreoProveedor text-danger" idCorreo="'+respuesta[i]["id_email"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				
	// 		}

	// 	}
	// });
});

//Funcion para ver los telefonos por id
$(document).on('click', '.btnEditarTelefonoCliente', function(event) {
	
	var idTelefono = $(this).attr('idTelefono');

	var datosTelefonos = new FormData();
	datosTelefonos.append('mostrarIdTelefono',idTelefono);

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: datosTelefonos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log(idTelefono);
			$("#editarDescripcionTelefonoCliente").empty();
			$("#editarTelefonoCliente").empty();
			console.log("Entro");

			for(var i = 0; i < respuesta.length; i++){
				$("#editarDescripcionTelefonoCliente").append('<input type="hidden" id="idTelefono" name="idTelefono" value='+respuesta[i]["id_telefono"]+'>'+
					'Descripcion: '+
					'<input type="text"  class="form-control" placeholder="Descripcion" id="editarDescripcionTC" name="editarDescripcionTC" value="'+respuesta[i]["descripcion"]+'"" required>'
					);
				$("#editarTelefonoCliente").append('No. Telefono'+
			  	'<input type="text"  class="form-control" placeholder="Telefono" id="editarTelefonoTC" name="editarTelefonoTC" value='+respuesta[i]["telefono"]+' required>');
			  
			}
	
		}
	});

	
});

//Funcion para eliminar un telefono
//Boton para eliminar telefono
$(document).on('click', '.btnEliminarTelefonoCliente', function(event) {
	
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
			console.log("holassdsadsadsa");
		if(result.value){

			 window.location = "index.php?ruta=clientes&idTelefono="+idTelefono;

		}

	});

});
