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
	}else if(imagen["size"]>500000){
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

// **********************************************************************
// Editar Procentaje

// Porcentaje(utilidad) del producto
function editarPrecioVenta(){

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
			$("#editarIdProducto").attr('value', idProducto);
			$("#editarProductoDescripcion").attr('value', reply["descripcion"]);
			$("#editarProductoCategoria").attr('value', reply["categoria"]);
			$("#editarProductoCompra").attr('value', reply["precio_compra"]);
			$("#editarProductoVenta").attr('value', reply["precio_venta"]);
			$("#editarUtilidad").attr('value', reply["utilidad"]);
			$("#actualFoto").attr('value', reply["ruta_imagen"]);

			if (reply["ruta_imagen"] != "") {
				$(".imagenPreviaEditar").attr('src',reply["ruta_imagen"]);
			}
		}
	});

});