<?php 

// Controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/clientes.controlador.php'; //Controlador de clientes
require_once 'controladores/productos.controlador.php';//Controlador de los productos
require_once 'controladores/proveedores.controlador.php';//Controlador de los proveedores
require_once 'controladores/Alertas.controlador.php';

// Modelos 
require_once 'modelos/clientes.modelos.php'; //Modelo de clientes
require_once 'modelos/productos.modelos.php';//Modelo de productos
require_once 'modelos/proveedores.modelos.php';//Modelo de proveedores


$plantilla = new ControladorPLantilla();
$plantilla -> ctrPlantilla();