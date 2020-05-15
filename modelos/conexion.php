<?php 

class Conexion {

	static public function conectar(){
		$link = new PDO("mysql:host=187.227.131.240;dbname=perseov1","magadan","magadan1234");
		$link->exec("set names utf8");
		return $link;
	}

}