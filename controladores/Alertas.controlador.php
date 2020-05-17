<?php
class AlertasPersonalizadas{
	static public function alertaExito($titulo, $descripcion){
		$data='<script>
		Swal.fire(
  		"'.$titulo.'",
 	    "'.$descripcion.'",
        "success"
         )
         </script>';
	  echo $data;
	}
}