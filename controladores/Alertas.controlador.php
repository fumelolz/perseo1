<?php
// static public function alertaBasica($mensaje){
// 		$data='<script></script>';
// 		echo $data;
// 	}

class AlertasPersonalizadas{

	static public function alertaExito($titulo, $descripcion){
		$data='<script>
		Swal.fire(
  		"'.$titulo.'",
 	    "'.$descripcion.'",
        "success"
         ).then(function (result){
				if(result.value){
					window.location="clientes";
				}
         	});
         </script>';
	  echo $data;
	}

	static public function alertaBasica($mensaje){
		$data='<script>
					Swal.fire("'.$mensaje.'");
			  </script>';
		echo $data;
	}

	static public function alertaTitulo($titulo, $descripcion){
		$data='<script>
					Swal.fire(
					  "'.$titulo.'",
					  "'.$descripcion.'",
					  "question"
					);
			  </script>';
		echo $data;
	}
	public static function alertaError($titulo, $descripcion,$footer){
		$data='<script>
					Swal.fire({
					  icon: "error",
					  title: "'.$titulo.'",
					  text: "'.$descripcion.'",
					  footer: "'.$footer.'"
					});
			  </script>';
		echo $data;
	}
	public static function alertaImagen($imagen,$tamano,$descripcion){
		$data='<script>
					Swal.fire({
					  imageUrl: "'.$imagen.'",
					  imageHeight: '.$tamano.',
					  imageAlt: "'.$descripcion.'"
					});
			  </script>';
		echo $data;
	}
	public static function alertaPregunta($titulo,$descripcion,$confirmacion,$titulo2,$descripcion2){
		$data='<script>
					Swal.fire({
					  title: "'.$titulo.'",
					  text: "'.$descripcion.'",
					  icon: "warning",
					  showCancelButton: true,
					  confirmButtonColor: "#3085d6",
					  cancelButtonColor: "#d33",
					  confirmButtonText: "'.$confirmacion.'"
					}).then((result) => {
					  if (result.value) {
					    Swal.fire(
					      "'.$titulo2.'",
					      "'.$descripcion2.'",
					      "success"
					    )
					  }
					});
			  </script>';
		echo $data;
	}
}