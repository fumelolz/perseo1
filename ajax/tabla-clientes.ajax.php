<?php 

require_once '../controladores/clientes.controlador.php';
require_once '../modelos/clientes.modelos.php';

class TablaClientes{

	public function ajaxMostrarTablaClientes(){

		$activos = 0;

		$item = null;
		$valor = null;

		$clientes = ControladorClientes::ctrMostrarClientes($item,$valor);

		$jsonData = '{"data": [';

		for ($i=0; $i < count($clientes) ; $i++) { 

			if ($clientes[$i]["estado_cliente"]==1) {
				$id_persona = $clientes[$i]["id_persona"];
	            $nombre = $clientes[$i]["nombre"];
	            $ap_Paterno = $clientes[$i]["ap_Paterno"];
	            $ap_Materno = $clientes[$i]["ap_Materno"];
	            $ciudad = $clientes[$i]["ciudad"];

	            $acciones = "<center><div class='btn-group-sm'><button class='btn btn-outline-info btnInspeccionarCliente' data-toggle='modal' data-target='#modalInspeccionarCliente' idCliente='".$id_persona."'>Inspeccionar</button></div><center>";

				$jsonData .='[
						"'.$id_persona.'",
						"'.$nombre." ".$ap_Paterno." ".$ap_Materno.'",
						"'.$ciudad.'",
						"'.$acciones.'"
					],';

				$activos +=1;	
			}

		}

		$jsonData = substr($jsonData, 0,-1);

		$jsonData .=']}';

		$jsonDataVacio = '{"data": [';
		$jsonDataVacio .=']}';

		if ($activos >= 1) {
			echo $jsonData;
		}else{
			echo $jsonDataVacio;
		}

	}

}

$activarTabla = new TablaClientes();
$activarTabla -> ajaxMostrarTablaClientes();