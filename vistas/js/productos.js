/*Data Table*/
$(".tablaProductos").DataTable({
	"ajax": "ajax/tabla-productos.ajax.php",
	"responsive":true,
	"deferRender":true,
	"retrieve":true,
	"processing":true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}
});

// Porcentaje(utilidad) del producto
function precioVenta(){

	var porcentaje = $(".nuevoPorcentaje").val();
	var precioCompra = $(".precioCompra").val();

	var precioVenta = Number((precioCompra*porcentaje)/100)+Number(precioCompra);
	$(".precioVenta").attr('value', precioVenta);

}

// Cuando se cambia el porcentaje
$(document).on('change', '.nuevoPorcentaje', function(event) {

	if ($("#porcentaje").prop('checked')) {
		precioVenta();
	}

});

// Cuando el precio de compra es cambiado
$(document).on('keyup', '.precioCompra', function(event) {
	
	if ($("#porcentaje").prop('checked')) {
		precioVenta();
	}else{
		$(".precioVenta").attr('value', $(this).val());
	}

});


// Cuando el Checkbox de porcentaje es activado o viceversa
$(document).on('change', '#porcentaje', function(event) {
	
	if ($("#porcentaje").prop('checked')) {
		precioVenta();
	}else{
		$(".precioVenta").attr('value', $(".precioCompra").val());
	}

});

/*Subir foto de producto*/

$("#productoFoto").change(function(event) {
	$(".imagenPrevia").attr('src', '');

	var imagen = this.files[0];
	
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$("#productoFoto").attr('value', '');
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(imagen["size"]>5000000){
		$("#productoFoto").attr('value', '');
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

/*Editar foto de producto*/

$("#editarProductoFoto").change(function(event) {
	$(".imagenPreviaEditar").attr('src', '');

	var imagen = this.files[0];
	
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
		$("#editarProductoFoto").attr('value', '');
		Swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: "La imagen debe estar en formato JPG o PNG",
			showConfirmButton:true,
			confirmButtonText: 'Cerrar',
			closeOnConfirm: false
		})
	}else if(imagen["size"]>5000000){
		$("#editarProductoFoto").attr('value', '');
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

// **********************************************************************
// Editar Procentaje

// Porcentaje(utilidad) del producto
function editarPrecioVenta(){

	var porcentaje = $(".editarPorcentaje").val();
	var precioCompra = $(".editarPrecioCompra").val();

	var precioVenta = Number((precioCompra*porcentaje)/100)+Number(precioCompra);
	$(".editarPrecioVenta").attr('value', precioVenta);

}

// Cuando se cambia el porcentaje
$(document).on('change', '.editarPorcentaje', function(event) {

	if ($("#editarPorcentaje").prop('checked')) {
		editarPrecioVenta();
	}

});

// Cuando el precio de compra es cambiado
$(document).on('keyup', '.editarPrecioCompra', function(event) {
	
	if ($("#editarPorcentaje").prop('checked')) {
		editarPrecioVenta();
	}else{
		$(".editarPrecioVenta").attr('value', $(this).val());
	}

});


// Cuando el Checkbox de porcentaje es activado o viceversa
$(document).on('change', '#editarPorcentaje', function(event) {
	
	if ($("#editarPorcentaje").prop('checked')) {
		editarPrecioVenta();
	}else{
		$(".editarPrecioVenta").attr('value', $(".editarPrecioCompra").val());
	}

});

// ********************************************************************************


// Click a una imagen
$(document).on('click', '.img', function(event) {
	console.log("Le diste click perro");
});

// Boton para editar producto
$(document).on('click', '.btnEditarProducto', function(event) {
	
	var idProducto = $(this).attr('idProducto');
	console.log("idProducto", idProducto);

	var data = new FormData();
	data.append('idProductoEditar',idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){

			var data2 = new FormData();
			data2.append('idCategoriaEditar',reply["categoria"]);

			$.ajax({
				url:"ajax/productos.ajax.php",
				method:"POST",
				data: data2,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(reply){
					$("#editarProductoCategoria").html(reply["descripcion"]);
				}
			});



			$("#editarIdProducto").attr('value', idProducto);
			$("#editarProductoDescripcion").attr('value', reply["descripcion"]);
			$("#editarProductoCategoria").attr('value', reply["categoria"]);
			$("#editarProductoCompra").attr('value', reply["precio_compra"]);
			$("#editarProductoVenta").attr('value', reply["precio_venta"]);
			$("#editarUtilidad").attr('value', reply["utilidad"]);
			$("#fotoActual").attr('value', reply["ruta_imagen"]);

			if (reply["ruta_imagen"] != "") {
				$(".imagenPreviaEditar").attr('src',reply["ruta_imagen"]);
			}
		}
	});

});

// Boton para elminar un producto
$(document).on('click', '.btnEliminarProducto', function(event) {
	
	var idProducto = $(this).attr('idProducto');
	var foto = $(this).attr('foto');

	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al Producto?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar Producto!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=productos&idProductoEliminar="+idProducto+"&foto="+foto;

		}

	});

});


// Activar o desactivar producto
$(document).on('click', '.btnActivarProducto', function(event) {
	
	var idProducto = $(this).attr('idProducto');
	var estado = $(this).attr('estado');

	var data = new FormData();
	data.append('idProductoEstado', idProducto);
	data.append('estado', estado);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		success: function(reply){

			if (window.matchMedia("(max-width:767px)").matches) {

				Swal.fire({
					type: 'success',
					title: 'El producto ha sido actualizado',
					showConfirmButton:true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
				}).then(function(result){

					if(result.value){

						window.location = 'productos';

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