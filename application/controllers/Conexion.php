<?php	

	public function processData(){
		//$name=$_REQUEST["name"];
		//$last_name=$_REQUEST["last_name"];
		try {
		    $gbd = new PDO('mysql:host=localhost;dbname=test', "root", 12345);
		    
		    $sql="insert into person (name, last_name) values('$this->name','$this->last_name')";

		    $gbd->exec($sql);
		    /*foreach($gbd->query('SELECT * from FOO') as $fila) {
		        print_r($fila);
		    }*/
		    $gbd = null;

		    echo "Ingreso a la base de datos exitoso";
		   
		} catch (PDOException $e) {
		    print "¡Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}