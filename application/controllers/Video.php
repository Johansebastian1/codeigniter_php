<?php

class Video extends CI_controller{

	public function guardar(){

		if( isset($_COOKIE['locacion']) ){

		}
		else{
			setcookie('locacion', 1);
			//id de la lista de reproduccion
			$lista = $_REQUEST['lista'];
			print_r($lista[0]);
		}
		$lista = $_REQUEST['lista'];
			print_r($lista[0]);
		//echo "asd";
		//enviar los datos a la base de datos
		//obtener el arreglo que tiene las canciones
		//recorrerlo
		//enviar los datos

	}
}
