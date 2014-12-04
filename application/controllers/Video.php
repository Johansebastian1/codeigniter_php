<?php

class video extends CI_controller{

	public function verificar(){
		if( isset($_COOKIE['locacion']) ){
			try 
			{
				$gbd = new PDO('mysql:host=localhost;dbname=new_schema1',"root",12345);
				$sql=" select videoId, title, thumbnails from cancion";
			   	$sth = $gbd->prepare( $sql );
				$sth->execute();
				$results = $sth->fetchAll(PDO::FETCH_ASSOC);
				/**echo "Busqueda exitosa";**/
				$res = json_encode($results);
				print_r($res);

			}catch(PDOException $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
				die();
			}

		}
		else{
			setcookie('locacion', 1);
		}
	}

	public function insertarLista(){
		try 
		{
			$gbd = new PDO('mysql:host=localhost;dbname=new_schema1',"root",12345);
			$sql="insert into lista (id) values(1)";
			$gbd->exec($sql);
			$gbd = null;
			echo "Ingreso a la base de datos exitoso de la lista";
			   
		}catch(PDOException $e) {
			print "¡Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

	public function insertarCancion(){
		$lista =  file_get_contents('php://input');
		$decode=json_decode($lista, true);
		$videoId = $decode['videoId'];
		$titulo = $decode['titulo'];
		$url = $decode['urlimagen'];
		try{
			$gbd = new PDO('mysql:host=localhost;dbname=new_schema1',"root",12345);
			$sql=" insert into cancion (videoId, title, thumbnails, lista) values('$videoId', '$titulo', '$url', 1) ";
			$gbd->exec($sql);
			$gbd = null;
			echo "Ingreso a la base de datos exitoso de la cancion";
			   
			}catch(PDOException $e) {
			    print "¡Error!: " . $e->getMessage() . "<br/>";
			    die();
			}
	}

	public function eliminarCancion(){
		$lista =  file_get_contents('php://input');
		$decode=json_decode($lista, true);
		$videoId = $decode['videoId'];
		try{
			$gbd = new PDO('mysql:host=localhost;dbname=new_schema1',"root",12345);
			$sql=" delete from cancion where videoId = '$videoId' ";
			$gbd->exec($sql);
			$gbd = null;
			echo "Elimino de la base de datos la cancion";
			   
			}catch(PDOException $e) {
			    print "¡Error!: " . $e->getMessage() . "<br/>";
			    die();
			}
	}

}