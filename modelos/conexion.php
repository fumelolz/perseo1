<?php 

class Conexion {

	static public function conectar(){
		$link = new PDO("mysql:host=187.228.59.69;dbname=perseov1","perseo","perseo123", array(
    		PDO::ATTR_PERSISTENT => true
		));
		$link->exec("set names utf8");
		return $link;
	}

}