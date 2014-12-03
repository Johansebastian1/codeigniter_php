<?php

class video extends CI_controller{

	public function guardar() {
		
		if( isset($_COOKIE['locacion']) ){
		}
		else{
			setcookie('locacion', 1);
			
			$lista =  file_get_contents('php://input');
			$decode=json_decode($lista,true);
			$videoId = $decode['videoId'];
			$titulo = $decode['titulo'];
			$url = $decode['urlimagen'];

			try {
			    $gbd = new PDO('mysql:host=localhost;dbname=new_schema1', "root", 12345);
			    
			    $sql="insert into lista (id) values(1)";

			    $gbd->exec($sql);

			    $sql="insert into cancion (videoId, title, thumbnails, lista) values('$videoId', '$titulo', '$url', 1)";

			    $gbd->exec($sql);

			    echo "Ingreso a la base de datos exitoso de la cancion";
			  
			  	/**foreach($gbd->query('SELECT * from FOO') as $fila) {
			        print_r($fila);
			    }**/
			    $gbd = null;
			   
			} catch (PDOException $e) {
			    print "¡Error!: " . $e->getMessage() . "<br/>";
			    die();
			}
		}
	}
}