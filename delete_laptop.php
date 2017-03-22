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

	$id = $_POST["id"];
	mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0;");

	$sql1 = "DELETE FROM `Produs` WHERE ID = $id;";
	mysqli_query($conn, $sql1);
	echo $conn->error;

	$sql2 = "DELETE FROM `Produs_Componenta` WHERE produsID = $id;";
	mysqli_query($conn, $sql2);
	echo $conn->error;

	mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0;");
	$sql3 = "UPDATE `Comanda_Produs` SET `produsID`=null WHERE produsID = $id;";
	mysqli_query($conn, $sql3);
	echo $conn->error;

	mysqli_close($conn);

	header('Location: http://localhost/proiectBD/Laptops/laptops.php');
	exit;	
?>