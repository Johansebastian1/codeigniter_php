<?php

class video extends CI_controller{

	public function guardar() {
		
		//if( isset($_COOKIE['locacion']) ){

		//}
		//else{
			//setcookie('locacion', 1);
			//id de la lista de reproduccion
			//$lista = $_REQUEST['lista'];
			//print_r($lista[0]);
		//}
		
		// se captura el arreglo en formato cadena
		$listaStr = $this->input->POST('lista');

		//se convierte la cadena a un verdadero arreglo json
		$lista = json_decode( $listaStr );
		

		// como para probar, se devuelve el mismo arreglo json como respuesta
		header('content-type: application/json');
		echo json_encode( $lista );

		//echo "asd";
		//enviar los datos a la base de datos
		//obtener el arreglo que tiene las canciones
		//recorrerlo
		//enviar los datos

		//print_r(  );
		
		for( $i = 0; $i < $lista; $i++){
			echo "".$i.id;
		}
		
		/**try {
		    $gbd = new PDO('mysql:host=localhost;dbname=new_schema1', "root", 12345);
		    
		    $sql="insert into lista (id) values(1)";

		    $gbd->exec($sql);

		    echo "Ingreso a la base de datos exitoso de la lista";

		    $sql="insert into cancion (lista, title, thumbnails) values(1, 'ay vamos', 'iuupiuept')";echo "Ingreso a la base de datos exitoso de la cancion";

		    echo "Ingreso a la base de datos exitoso de la cancion";

		    $gbd->exec($sql);
		    foreach($gbd->query('SELECT * from FOO') as $fila) {
		        print_r($fila);
		    }
		    $gbd = null;
		   
		} catch (PDOException $e) {
		    print "¡Error!: " . $e->getMessage() . "<br/>";
		    die();
		}**/
	}
}