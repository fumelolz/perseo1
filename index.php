<?php 

// Controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/clientes.controlador.php'; //Controlador de clientes
require_once 'controladores/productos.controlador.php';//Controlador de los productos

// Modelos 
require_once 'modelos/clientes.modelos.php'; //Modelo de clientes
require_once 'modelos/productos.modelos.php';//Modelo de productos

$plantilla = new ControladorPLantilla();
$plantilla -> ctrPlantilla();