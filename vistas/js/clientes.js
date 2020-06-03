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
	console.log(idCliente);
	
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
			console.log("Borrado");

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

    var datosCorreos= new FormData();
	datosCorreos.append('mostrarCorreos',idCliente);

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
			  $("#idClienteInfoCorreo").empty();
			  $("#idClienteInfoCorreo").append('<input class="form-control" type="hidden" id="crearCorreoCliente" name="crearCorreoCliente" value='+respuesta["id_cliente"]+'>');

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
	
	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: datosCorreos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log(respuesta);

			$("#MostrarCorreosCD2").empty();

			if(respuesta.length==0){
				$("#MostrarCorreosCD2").append('<div class="col-12 text-secondary"> <i class="fas fa-info-circle mr-2"></i>No se  encontraron correos de este cliente.</div>');
			}

			for (var i = 0; i < respuesta.length; i++){

				//Se crea la descripcion  del correo con una columna de 12 columnas
				$("#MostrarCorreosCD2").append('<div class="col-12"><div class="text-secondary">Correo no.'+(i+1)+'</div></div>');

				//Se crea el icono de correo con una columna de 2
				$("#MostrarCorreosCD2").append('<div class="col-2"><i class="fas fa-envelope fa-2x text-secondary"></i></div>');
				//Se crea el correo con una columna de 6
				$("#MostrarCorreosCD2").append('<div class="col-6"><div class="text-secondary overflow-auto emailPortapapeles" data-toggle="tooltip" data-placement="top" title="Da clic para copiarlo al portapapeles.">'+respuesta[i]["email"]+'</div></div>');
				//Se crea el boton para editar de 2 columna
				$("#MostrarCorreosCD2").append('<div class="col-1"><i class="far fa-edit btnEditarCorreoCliente text-warning" data-toggle="modal" data-target="#modalEditarCorreosCliente" idCorreo="'+respuesta[i]["id_email"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				//Se crea el boton´para eliminar correo
				$("#MostrarCorreosCD2").append('<div class="col-1"><i class="far fa-trash-alt btnEliminarCorreoCliente text-danger" idCorreo="'+respuesta[i]["id_email"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				
			}

		}
	});
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

//Funcion para editar el correo
$(document).on('click', '.btnEditarCorreoCliente', function(event) {
	
	var idCorreo = $(this).attr('idCorreo');

	var dataCorreo = new FormData();
	dataCorreo.append('mostrarIdCorreo',idCorreo);


	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: dataCorreo,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#editarCorreoCliente").empty();

			for(var i = 0; i < respuesta.length; i++){
				$("#editarCorreoCliente").append('<input type="hidden" id="idCorreo" name="idCorreo" value='+respuesta[i]["id_email"]+'>'+
					'Correo: '+
					'<input type="text"  class="form-control" placeholder="Correo" id="inputEditarCorreoCliente" name="inputEditarCorreoCliente" value="'+respuesta[i]["email"]+'"" required>'
					);
			}
	
		}
	});

	
});

//Boton para eliminar un correo del cliente
$(document).on('click', '.btnEliminarCorreoCliente', function(event) {
	
	var idCorreo = $(this).attr('idCorreo');
	
	Swal.fire({
		type: 'warning',
		title: '¿Estas seguro de eliminar este correo?',
		text:'Se eliminara el correo y no podras revertir el cambio.',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar Correo!',
	}).then(function(result){

		if(result.value){

			 window.location = "index.php?ruta=clientes&idCorreo="+idCorreo;

		}

	});

});

//Funcion para mostrarlos datos de un cliente
$(document).on('click', '.btnInspeccionarCliente', function(event) {
	
	var idCliente = $(this).attr('idCliente');
	
	var datosClientes = new FormData();
	datosClientes.append('mostrarCliente',idCliente);


	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: datosClientes,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#m_i_c-botonModificar").empty();
			$("#m_i_c-botonEliminar").empty();


			// $("#m_i_c-IdCliente").empty();
			// $("#m_i_c-IdCliente").append('<input type="hidden" id="idPersona" name="idPerosona" value='+respuesta["id_persona"]+'>');

			$("#m_i_c-nombre").text(respuesta["nombre"]);
			$("#m_i_c-apellidos").text(respuesta["ap_Paterno"]+" "+respuesta["ap_Materno"]);
			$("#m_i_c-rfc").text(respuesta["rfc"]);
			$("#m_i_c-ine").text(respuesta["ine"]);
			$("#m_i_c-direccion").text(respuesta["direccion"]);
			$("#m_i_c-pais").text(respuesta["pais"]);
			$("#m_i_c-estado").text(respuesta["estado"]);
			$("#m_i_c-ciudad").text(respuesta["ciudad"]);
			$("#m_i_c-fechaNacimiento").text(respuesta["fecha_nacimiento"]);

			$("#m_i_c-botonModificar").append('<button class="btn btn-warning btnEditarCliente float-left" data-toggle="modal" data-target="#modalEditarCliente" data-dismiss="modal" idCliente="'+respuesta["id_persona"]+'" ><i class="fas fa-pencil-alt"></i></button>');

			$("#m_i_c-botonEliminar").append('<button class="btn btn-danger btnEliminarCliente float-left ml-2" idCliente="'+respuesta["id_persona"]+'"><i class="fas fa-times"></i></button>');

			$("#m_i_c-botonContactar").append('<button class="btn btn-info btnContactoCliente" data-toggle="modal" data-target="#modalContactoCliente" idCliente="'+respuesta["id_persona"]+'" ><i class="far fa-address-book text-white"></i></button>');
		}
	});

});