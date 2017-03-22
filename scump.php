<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_DATABASE", "LaptopShopNou");
	// Create connection
	$conn = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	//sql query
	$sql = "SELECT P.ID AS ID, P.pret AS pret, P.stoc AS stoc, P.producator AS producator, P.model AS model, P.culoare AS culoare, P.greutate AS greutate, P.imagine AS imag, C.nume AS nume, PC.cheie AS cheie, PC.valoareNumerica AS valnum, Pc.valoareText AS valtext
			FROM Produs P INNER JOIN Produs_Componenta PC ON(P.ID = PC.produsID)
						  INNER JOIN Componenta C ON(PC.componentaID = C.ID)
			WHERE P.pret =(SELECT MAX(pret) FROM `Produs`)
			ORDER BY P.ID;";

	$result = $conn->query($sql);
	echo $conn->error;
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$pret = $row["pret"];
	    	$producator =  $row["producator"];
	    	$model = $row["model"];
	    	$culoare = $row["culoare"];
	    	$greutate = $row["greutate"];
	    	$imagine = $row["imag"];
	    	if($row["cheie"] === 'producator'){
	    		$prodCPU = $row["valtext"];
	    	}
	    	if($row["cheie"] === 'model'){
	    		$modelCPU = $row["valtext"];
	    	}
	    	if($row["cheie"] === 'rezolutie'){
	    		$rezolutie = $row["valtext"];
	    	}
	    	if($row["cheie"] === 'diagonala'){
	    		$diagonala = $row["valnum"];
	    	}
	    	if($row["cheie"] === 'RAM'){
	    		$ram = $row["valnum"];
	    	}
	    }
	}

	echo ($pret);
	echo "</br>";
	echo ($modelCPU);
	echo "</br>";
	echo ($ram);
	echo "</br>";
	mysqli_query($conn, $sql);
	echo $conn->error;

	mysqli_close($conn);
?>