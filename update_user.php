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
	$nume = $_GET["nume_user"];
	$prenume = $_GET["prenume"];
	$email = $_GET["email"];
	$adresa = $_GET["adresa_user"];
	$telefon = $_GET["telefon"];
	$username = $_GET["username"];
	$password = $_GET["password"];
	$gen = $_GET["gen"];

	echo($adresa);
	$sql1 = "UPDATE `Utilizator` SET `nume`='$nume',`prenume`= '$prenume',`email`='$email',`adresa`='$adresa',`telefon`='$telefon',`username`='$username',`password`='$password',`gen`='$gen' WHERE ID = $id";
	mysqli_query($conn, $sql1);
	echo $conn->error;

	mysqli_close($conn);

	header('Location: http://localhost/proiectBD/users.php');
	exit;
?>