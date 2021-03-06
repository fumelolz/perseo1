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

	var datosTelefonos = new FormData();
	datosTelefonos.append('mostrarTelefonos',idProveedor);

	var datosCorreos= new FormData();
	datosCorreos.append('mostrarCorreos',idProveedor);

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
			 $("#idProveedorinfo").append('<input class="form-control" type="hidden" id="crearTelefono" name="crearTelefono" value='+respuesta["id_proveedor"]+'>');
			 //Mando el id del proveedor al modal agregar correo
			 $("#idProveedorinfo2").empty();
			 $("#idProveedorinfo2").append('<input class="form-control" type="hidden" id="crearCorreo" name="crearCorreo" value='+respuesta["id_proveedor"]+'>');

			// console.log(respuesta["id_proveedor"]);
		}
	});

	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: datosTelefonos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#MostrarTelefonosCI").empty();
			if(respuesta.length==0){
				$("#MostrarTelefonosCI").append('<div class="col-12 text-secondary"> <i class="fas fa-info-circle mr-2"></i>No se encontraron telefonos de este proveedor</div>');
			}

			for (var i = 0; i < respuesta.length; i++){
				//Se crea la descripcion  del telefono con una columna de 12 columnas
				$("#MostrarTelefonosCI").append('<div class="col-12"><div class="text-secondary">'+respuesta[i]["descripcion"]+'</div></div>');

				//Se crea el icono de telefono con una columa de 2
				$("#MostrarTelefonosCI").append('<div class="col-2"><i class="fas fa-phone-square-alt fa-2x text-secondary"></i></div>');
				//Se crea el numero del proveedor con una columna de 6
				$("#MostrarTelefonosCI").append('<div class="col-6"><p class="text-secondary overflow-auto telefonoPortapapeles" style="font-size: 20px;" data-toggle="tooltip" data-placement="top" title="Da clic para copiarlo al portapapeles.">'+respuesta[i]["telefono"]+'</p></div>');
				//Se crea el boton para editar de 2 columna
				$("#MostrarTelefonosCI").append('<div class="col-1"><i class="far fa-edit btnEditarTelefonoProveedor text-warning" data-toggle="modal" data-target="#modalEditarTelefonosProveedor" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				//Se crea el boton´para eliminar telefono de 2 columnas
				$("#MostrarTelefonosCI").append('<div class="col-1"><i class="far fa-trash-alt btnEliminarTelefonoProveedor text-danger" idTelefono="'+respuesta[i]["id_telefono"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				
			}

		}
	});
	
	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: datosCorreos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log(respuesta);

			$("#MostrarCorreosCD").empty();

			if(respuesta.length==0){
				$("#MostrarCorreosCD").append('<div class="col-12 text-secondary"> <i class="fas fa-info-circle mr-2"></i>No se  encontraron correos de este proveedor</div>');
			}

			for (var i = 0; i < respuesta.length; i++){
				//Se crea la descripcion  del correo con una columna de 12 columnas
				$("#MostrarCorreosCD").append('<div class="col-12"><div class="text-secondary">Correo no.'+(i+1)+'</div></div>');

				//Se crea el icono de correo con una columna de 2
				$("#MostrarCorreosCD").append('<div class="col-2"><i class="fas fa-envelope fa-2x text-secondary"></i></div>');
				//Se crea el correo con una columna de 6
				$("#MostrarCorreosCD").append('<div class="col-6"><div class="text-secondary overflow-auto emailPortapapeles" data-toggle="tooltip" data-placement="top" title="Da clic para copiarlo al portapapeles.">'+respuesta[i]["email"]+'</div></div>');
				//Se crea el boton para editar de 2 columna
				$("#MostrarCorreosCD").append('<div class="col-1"><i class="far fa-edit btnEditarCorreoProveedor text-warning" data-toggle="modal" data-target="#modalEditarCorreosProveedor" idCorreo="'+respuesta[i]["id_email"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				//Se crea el boton´para eliminar correo
				$("#MostrarCorreosCD").append('<div class="col-1"><i class="far fa-trash-alt btnEliminarCorreoProveedor text-danger" idCorreo="'+respuesta[i]["id_email"]+'" data-dismiss="modal" style="cursor: pointer"></i></div>');
				
			}

		}
	});
});

$(document).on("mouseleave", '.telefonoPortapapeles', function (event) {
   $(this).parent().removeClass("bg bg-info rounded");
   $(this).removeClass("text-white").addClass("text-secondary");
});

$(document).on("mouseover", '.telefonoPortapapeles', function (event) {
   $(this).parent().addClass("bg bg-info rounded");
   $(this).removeClass("text-secondary").addClass("text-white");
});

$(document).on("mouseleave", '.emailPortapapeles', function (event) {
   $(this).parent().removeClass("bg bg-info rounded");
   $(this).removeClass("text-white").addClass("text-secondary");
});

$(document).on("mouseover", '.emailPortapapeles', function (event) {
   $(this).parent().addClass("bg bg-info rounded");
   $(this).removeClass("text-secondary").addClass("text-white");
});

$(document).on('click', '.emailPortapapeles', function(event) {
	$portapapeles = $("<input>");
	$(this).parent().append($portapapeles);
	$portapapeles.val($(this).html()).select();
	document.execCommand("copy");
	$portapapeles.remove();
	Swal.fire('Correo electronico copiado');
});

$(document).on('click', '.telefonoPortapapeles', function(event) {
	$portapapeles = $("<input>");
	$(this).parent().append($portapapeles);
	$portapapeles.val($(this).html()).select();
	document.execCommand("copy");
	$portapapeles.remove();
	Swal.fire('Numero de telefono copiado');
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

			for(var i = 0; i < respuesta.length; i++){
				$("#editarDescripcion").append('<input type="hidden" id="idTelefono" name="idTelefono" value='+respuesta[i]["id_telefono"]+'>'+
					'Descripcion: '+
					'<input type="text"  class="form-control" placeholder="Descripcion" id="editarDescripcionT" name="editarDescripcionT" value="'+respuesta[i]["descripcion"]+'"" required>'
					);
				$("#editaTelefonos").append('No. Telefono'+
			  	'<input type="text"  class="form-control" placeholder="Telefono" id="editarTelefonoT" name="editarTelefonoT" value='+respuesta[i]["telefono"]+' required>');
			  	console.log(respuesta[i]["descripcion"]);
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

//Funcion para editar el correo
$(document).on('click', '.btnEditarCorreoProveedor', function(event) {
	
	var idCorreo = $(this).attr('idCorreo');

	var dataCorreo = new FormData();
	dataCorreo.append('mostrarIdCorreo',idCorreo);


	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method:"POST",
		data: dataCorreo,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#editarCorreo").empty();

			for(var i = 0; i < respuesta.length; i++){
				$("#editarCorreo").append('<input type="hidden" id="idCorreo" name="idCorreo" value='+respuesta[i]["id_email"]+'>'+
					'Correo: '+
					'<input type="text"  class="form-control" placeholder="Correo" id="editarCorreo" name="editarCorreo" value="'+respuesta[i]["email"]+'"" required>'
					);
			}
	
		}
	});

	
});
//Boton para eliminar un correo del proveedor
$(document).on('click', '.btnEliminarCorreoProveedor', function(event) {
	
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

			 window.location = "index.php?ruta=proveedores&idCorreo="+idCorreo;

		}

	});

});