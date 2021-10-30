<?php 

class Conexion {
	static public function conectar() {
		$link = new PDO("mysql:host=localhost;dbname=u506566286_wisascun","u506566286_ascun",">^LlRS@2hG");
		$link -> exec("set names utf8");
		return $link;
	}
	
}