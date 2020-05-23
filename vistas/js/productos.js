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