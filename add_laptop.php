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
	$sql1 = "INSERT INTO `Produs`(`pret`, `stoc`, `producator`, `model`, `culoare`, `greutate`) 
			 VALUES (".$_POST["pret"].",".$_POST["stoc"].",'".$_POST["producator"]."','".$_POST["model"]."','".$_POST["culoare"]."',".$_POST["greutate"].")";
	mysqli_query($conn, $sql1);
	echo $conn->error;

	$sql2 = "SELECT MAX(ID) AS maxID FROM `Produs`";
	$result = $conn->query($sql2);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$maxID = $row["maxID"];
		}
	}
	mysqli_query($conn, $sql2);
	echo $conn->error;

	$sql3 = "INSERT INTO `Produs_Componenta`(`produsID`, `componentaID`, `cheie`, `valoareNumerica`, `valoareText`) 
			 VALUES ($maxID,1,'producator', NULL, '".$_POST["producator_CPU"]."')";
	mysqli_query($conn, $sql3);
	echo $conn->error;

	$sql4 = "INSERT INTO `Produs_Componenta`(`produsID`, `componentaID`, `cheie`, `valoareNumerica`, `valoareText`) 
			 VALUES ($maxID,1,'model', NULL , '".$_POST["model_CPU"]."')";
	mysqli_query($conn, $sql4);
	echo $conn->error;

	$sql5 = "INSERT INTO `Produs_Componenta`(`produsID`, `componentaID`, `cheie`, `valoareNumerica`, `valoareText`) 
			 VALUES ($maxID,2,'RAM', ".$_POST["memorie_RAM"].", NULL)";
	mysqli_query($conn, $sql5);
	echo $conn->error;

	$sql6 = "INSERT INTO `Produs_Componenta`(`produsID`, `componentaID`, `cheie`, `valoareNumerica`, `valoareText`) 
			 VALUES ($maxID,3,'rezolutie', NULL, '".$_POST["rezolutie"]."')";
	mysqli_query($conn, $sql6);
	echo $conn->error;

	$sql7 = "INSERT INTO `Produs_Componenta`(`produsID`, `componentaID`, `cheie`, `valoareNumerica`, `valoareText`) 
			 VALUES ($maxID,3,'diagonala', ".$_POST["diagonala"].", NULL)";
	mysqli_query($conn, $sql7);
	echo $conn->error;


	mysqli_close($conn);

	header('Location: http://localhost/proiectBD/Laptops/laptops.php');
	exit;
?>