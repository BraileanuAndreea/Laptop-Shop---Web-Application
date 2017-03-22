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
	$id = $_GET["id"];
	$producator = $_GET["producator"];
	$model = $_GET["model"];
	$pret = $_GET["pret"];
	$greutate = $_GET["greutate"];
	$culoare = $_GET["culoare"];
	$stoc = $_GET["stoc"];
	$producator_CPU = $_GET["producator_CPU"];
	$model_CPU = $_GET["model_CPU"];
	$ram = $_GET["memorie_RAM"];
	$rezolutie = $_GET["rezolutie"];
	$diagonala = $_GET["diagonala"];

	//sql query
	$sql1 = "UPDATE `Produs` SET `pret`=$pret,`stoc`=$stoc,`producator`='$producator',`model`='$model',`culoare`='$culoare',`greutate`=$greutate 
			 WHERE `ID`=$id";
	echo($sql1);
	mysqli_query($conn, $sql1);
	echo $conn->error;

	$sql2 = "UPDATE `Produs_Componenta` SET `valoareText`='$producator_CPU' WHERE `produsID`=$id AND `cheie`='producator'";
	echo($sql2);
	mysqli_query($conn, $sql2);
	echo $conn->error;

	$sql3 = "UPDATE `Produs_Componenta` SET `valoareText`='$model_CPU' WHERE `produsID`=$id AND `cheie`='model'";
	echo($sql3);
	mysqli_query($conn, $sql3);
	echo $conn->error;

	$sql4 = "UPDATE `Produs_Componenta` SET `valoareNumerica`=$ram WHERE `produsID`=$id AND `cheie`='RAM'";
	echo($sql4);
	mysqli_query($conn, $sql4);
	echo $conn->error;

	$sql5 = "UPDATE `Produs_Componenta` SET `valoareText`=$rezolutie WHERE `produsID`=$id AND `cheie`='rezolutie'";
	echo($sql5);
	mysqli_query($conn, $sql5);
	echo $conn->error;

	$sql6 = "UPDATE `Produs_Componenta` SET `valoareNumerica`=$diagonala WHERE `produsID`=$id AND `cheie`='diagonala'";
	echo($sql6);	
	mysqli_query($conn, $sql6);
	echo $conn->error;

	
	mysqli_close($conn);

	header('Location: http://localhost/proiectBD/Laptops/laptops.php');
	exit;
?>