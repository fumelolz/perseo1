<?php 

// Controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/clientes.controlador.php'; //Controlador de clientes

// Modelos 
require_once 'modelos/clientes.modelos.php'; //Modelo de clientes

$plantilla = new ControladorPLantilla();
$plantilla -> ctrPlantilla();