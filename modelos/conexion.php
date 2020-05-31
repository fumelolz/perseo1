<?php 

class Conexion {

	static public function conectar(){
		$link = new PDO("mysql:host=187.227.69.54;dbname=perseov1","perseo","perseo123");
		$link->exec("set names utf8");
		return $link;
	}

}