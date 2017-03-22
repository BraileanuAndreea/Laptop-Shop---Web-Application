


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="rapoartePage.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class = "mycontainer">
		<!-- Start meniu -->
		<div class = "menu">
			<ul>
				<li class = "tab">
					<a href="http://localhost/proiectBD/home.php" target="_top">
						Acasa
					</a>
				</li>
				<li class = "tab tab2">
					<a href="http://localhost/proiectBD/Laptops/laptops.php" target="_top">
						Laptopuri
					</a>
				</li>
				<li class= "tab tab2">
					<a href="http://localhost/proiectBD/users.php" target="_top">
						Utilizatori
					</a>
				</li>
				<li class= "tab tab2">
					<a href="http://localhost/proiectBD/Comenzi/comenzi.php" target="_top">
						Comenzi
					</a>
				</li>
				<li class= "tab tab2">
					<a href="http://localhost/proiectBD/Rapoarte/rapoarte.php" target="_top">
						Rapoarte
					</a>
				</li>
			</ul>
		</div>
		<!-- START img title-->
		<div><img  class = "title_rapoarte" src="rapoarte.png"></div>
		<!-- END img title-->
		</br>

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-money fa-2x"></i></div></a>
						<div class="circle-tile-content dark-blue" style="height: 150px;">
							<div class="circle-tile-description text-faded"> 
								Cel mai scump laptop
							</div>
							<!--<div class="circle-tile-number text-faded ">265</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href='#myModal1' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal1' style="color: white;margin-top: 40px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div>
<!--  START Modal cel mai scump laptop -->
				<div class="modal fade" id='playerModal1' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Cel mai scump laptop</h4>
					</div>
					<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9">
					<div id="player" class="embed-responsive-item">
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
							$sql1 = "SELECT P.ID AS ID, P.pret AS pret, P.stoc AS stoc, P.producator AS producator, P.model AS model, P.culoare AS culoare, P.greutate AS greutate, P.imagine AS imag, C.nume AS nume, PC.cheie AS cheie, PC.valoareNumerica AS valnum, Pc.valoareText AS valtext
									FROM Produs P INNER JOIN Produs_Componenta PC ON(P.ID = PC.produsID)
												  INNER JOIN Componenta C ON(PC.componentaID = C.ID)
									WHERE P.pret =(SELECT MAX(pret) FROM `Produs`)
									ORDER BY P.ID;";

							$result1 = $conn->query($sql1);
							echo $conn->error;
							if ($result1->num_rows > 0) {
							    // output data of each row
							    while($row = $result1->fetch_assoc()) {
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

							echo '
							<div class="twPc-divStats">
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<center>
							        <i class="fa fa-laptop fa-5x"></i>
								</center>
								<h1 class="text-muted text-center" style="color: #F0664D"><span class="glyphicon glyphicon-piggy-bank"></span>  '.$pret.' RON</h1>
								<p></p>
								<p></p>
								<hr>
								<ul class="twPc-Arrange">
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/following" title="885 Following">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Producator</span>
											<span class="twPc-StatValue">'.$producator.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Model</span>
											<span class="twPc-StatValue">'.$model.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Greutate</span>
											<span class="twPc-StatValue">'.$greutate.' Kg</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Culoare</span>
											<span class="twPc-StatValue">'.$culoare.'</span>
										</a>
									</li>
								</ul>
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<hr>
								<h2 class="text-muted text-center" style="color: #47B2BA"><span class="fa fa-cog"></span> Specificatii</h2>
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<hr>
								<ul class="twPc-Arrange">
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/following" title="885 Following">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Producator CPU</span>
											<span class="twPc-StatValue">'.$prodCPU.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Model CPU</span>
											<span class="twPc-StatValue">'.$modelCPU.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">RAM</span>
											<span class="twPc-StatValue">'.$ram.' GB</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Rezolutie</span>
											<span class="twPc-StatValue">'.$rezolutie.' </span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Diagonala</span>
											<span class="twPc-StatValue">'.$diagonala.' inch</span>
										</a>
									</li>
								</ul>
								<p></p>
								<p></p>
								<hr>
							</div>';
							echo $conn->error;
						?>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!--  END Modal cel mai scump laptop -->
<!--  START Modal cel mai ieftin laptop -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading middle"><i class="fa fa-laptop fa-2x"></i></div></a>
						<div class="circle-tile-content red" style="height: 150px;">
							<div class="circle-tile-description text-faded">
								Cel mai ieftin laptop
							</div>
							<!--<div class="circle-tile-number text-faded ">10</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href='#myModal2' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal2' style="color: white;margin-top: 40px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div> 
				<div class="modal fade" id='playerModal2' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Cel mai ieftin laptop</h4>
					</div>
					<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9">
					<div id="player" class="embed-responsive-item">
						<?php
							$sql2 = "SELECT P.ID AS ID, P.pret AS pret, P.stoc AS stoc, P.producator AS producator, P.model AS model, P.culoare AS culoare, P.greutate AS greutate, P.imagine AS imag, C.nume AS nume, PC.cheie AS cheie, PC.valoareNumerica AS valnum, Pc.valoareText AS valtext
									FROM Produs P INNER JOIN Produs_Componenta PC ON(P.ID = PC.produsID)
												  INNER JOIN Componenta C ON(PC.componentaID = C.ID)
									WHERE P.pret =(SELECT MIN(pret) FROM `Produs`)
									ORDER BY P.ID;";

							$result2 = $conn->query($sql2);
							echo $conn->error;
							if ($result2->num_rows > 0) {
							    // output data of each row
							    while($row2 = $result2->fetch_assoc()) {
							    	$pret2 = $row2["pret"];
							    	$producator2 =  $row2["producator"];
							    	$model2 = $row2["model"];
							    	$culoare2 = $row2["culoare"];
							    	$greutate2 = $row2["greutate"];
							    	$imagine2 = $row2["imag"];
							    	if($row2["cheie"] === 'producator'){
							    		$prodCPU2 = $row2["valtext"];
							    	}
							    	if($row2["cheie"] === 'model'){
							    		$modelCPU2 = $row2["valtext"];
							    	}
							    	if($row2["cheie"] === 'rezolutie'){
							    		$rezolutie2 = $row2["valtext"];
							    	}
							    	if($row2["cheie"] === 'diagonala'){
							    		$diagonala2 = $row2["valnum"];
							    	}
							    	if($row2["cheie"] === 'RAM'){
							    		$ram2 = $row2["valnum"];
							    	}
							    }
							}

							echo '
							<div class="twPc-divStats">
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<center>
							        <i class="fa fa-laptop fa-5x"></i>
								</center>
								<h1 class="text-muted text-center" style="color: #F0664D"><span class="glyphicon glyphicon-piggy-bank"></span>  '.$pret2.' RON</h1>
								<p></p>
								<p></p>
								<hr>
								<ul class="twPc-Arrange">
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/following" title="885 Following">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Producator</span>
											<span class="twPc-StatValue">'.$producator2.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Model</span>
											<span class="twPc-StatValue">'.$model2.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Greutate</span>
											<span class="twPc-StatValue">'.$greutate2.' Kg</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Culoare</span>
											<span class="twPc-StatValue">'.$culoare2.'</span>
										</a>
									</li>
								</ul>
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<hr>
								<h2 class="text-muted text-center" style="color: #47B2BA"><span class="fa fa-cog"></span> Specificatii</h2>
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<hr>
								<ul class="twPc-Arrange">
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/following" title="885 Following">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Producator CPU</span>
											<span class="twPc-StatValue">'.$prodCPU2.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Model CPU</span>
											<span class="twPc-StatValue">'.$modelCPU2.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">RAM</span>
											<span class="twPc-StatValue">'.$ram2.' GB</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Rezolutie</span>
											<span class="twPc-StatValue">'.$rezolutie2.' </span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Diagonala</span>
											<span class="twPc-StatValue">'.$diagonala2.' inch</span>
										</a>
									</li>
								</ul>
								<p></p>
								<p></p>
								<hr>
							</div>';
						?>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!--  END Modal cel mai ieftin laptop -->
<!--  START Modal cel mai cumparat laptop -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-laptop fa-2x"></i></div></a>
						<div class="circle-tile-content dark-blue" style="height: 150px;">
							<div class="circle-tile-description text-faded"> 
								Cel mai cumparat laptop
							</div>
							<!--<div class="circle-tile-number text-faded ">265</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href='#myModal3' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal3' style="color: white;margin-top: 40px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="modal fade" id='playerModal3' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Cel mai cumparat laptop</h4>
					</div>
					<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9">
					<div id="player" class="embed-responsive-item">
						<?php
							$sql3 = "SELECT A.ProdusID AS ID, A.Producator AS Producator, A.Model AS Model, A.Pret AS Pret, MAX(A.NrCumparariPerProdus) AS Cumparari
								FROM (SELECT P.ID AS ProdusID, P.producator AS Producator, P.model AS Model, P.pret AS Pret, COUNT(*) AS NrCumparariPerProdus
								        FROM Produs P INNER JOIN Comanda_Produs CP ON(P.ID = CP.produsID)
								                      INNER JOIN Comanda C ON(CP.comandaID = C.ID)
								                      INNER JOIN Utilizator U ON(C.UtilizatorID = U.ID)
								        GROUP BY P.ID
								        ORDER BY C.ID) AS A;";

							$result3 = $conn->query($sql3);
							echo $conn->error;
							if ($result3->num_rows > 0) {
							    // output data of each row
							    while($row3 = $result3->fetch_assoc()) {
							    	$pret3 = $row3["Pret"];
							    	$producator3 =  $row3["Producator"];
							    	$model3 = $row3["Model"];
							    	$cumparari = $row3["Cumparari"];
							    }
							}

							echo '
							<div class="twPc-divStats">
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<center>
							        <i class="fa fa-laptop fa-5x"></i>
								</center>
								<h1 class="text-muted text-center" style="color: #F0664D"><span class="glyphicon glyphicon-piggy-bank"></span>  '.$pret3.' RON</h1>
								<p></p>
								<p></p>
								<hr>
								<ul class="twPc-Arrange">
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/following" title="885 Following">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Producator</span>
											<span class="twPc-StatValue">'.$producator3.'</span>
										</a>
									</li>
									<li class="twPc-ArrangeSizeFit">
										<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
											<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Model</span>
											<span class="twPc-StatValue">'.$model3.'</span>
										</a>
									</li>
								</ul>
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<hr>
								<h1 class="text-muted text-center" style="color: #47B2BA"><span class="glyphicon glyphicon-shopping-cart"></span> Cumparat de : '.$cumparari.' ori</h1>
								<p></p>
								<p></p>
								<p></p>
								<p></p>
								<hr>
							</div>';
						?>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!--  END Modal cel mai cumparat laptop -->
<!--  START utilizatorii cu mai mult de 3 comenzi -->
				<!--  Al doilea rand -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-user fa-2x"></i></div></a>
						<div class="circle-tile-content dark-blue" style="height: 150px;">
							<div class="circle-tile-description text-faded"> 
								Utilizatorii cu mai mult de 3 comenzi
							</div>
							<!--<div class="circle-tile-number text-faded ">265</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href='#myModal4' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal4' style="color: white;margin-top: 40px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="modal fade" id='playerModal4' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Utilizatorii cu mai mult de 3 comenzi</h4>
					</div>
					<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9">
					<div id="player" class="embed-responsive-item">
						<div class="row">
						<?php
							$sql4 = "SELECT C.UtilizatorID, U.nume AS nume, U.prenume AS prenume, U.username AS username, U.adresa AS adresa, U.email AS email, U.telefon AS telefon, U.gen AS gen
									FROM Produs P INNER JOIN Comanda_Produs CP ON(P.ID = CP.produsID)
												  INNER JOIN Comanda C ON(CP.comandaID = C.ID)
									              INNER JOIN Utilizator U ON(C.UtilizatorID = U.ID)
									GROUP BY C.UtilizatorID
									HAVING COUNT(C.ID) > 3";

							$result4 = $conn->query($sql4);
							echo $conn->error;
							if ($result4->num_rows > 0) {
							    // output data of each row
							    while($row4 = $result4->fetch_assoc()) {
							    	$nume4 = $row4["nume"];
							    	$prenume4 = $row4["prenume"];
							    	$username4 = $row4["username"];
							    	$adresa4 = $row4["adresa"];
							    	$email4 = $row4["email"];
							    	$telefon4 = $row4["telefon"];
							    	$gen4 = $row4["gen"];

							    	echo'
							        <div class="col-xs-4 col-sm-4 col-md-4">
							            <div class="well well-sm">
							                <div class="row centered">
							                    <div class="col-sm-12 col-md-12 centered">';
						                    		if($gen4 === 'F')
						                    			echo '<img src="female.png" class="img-responsive" alt="Cinque Terre" width="304" height="236">';
						                    		else if($gen4 === 'M')
						                    			echo '<img src="male.png" class="img-responsive" alt="Cinque Terre" width="304" height="236">';
							                        echo '<h4>
							                            '.$nume4.' '.$prenume4.'</h4>
							                        <small><cite title="San Francisco, USA">'.$adresa4.'<i class="glyphicon glyphicon-map-marker">
							                        </i></cite></small>
							                        <p>
							                        	<i class="glyphicon glyphicon-user"></i>'.$username4.'
							                            <br />
							                            <i class="glyphicon glyphicon-envelope"></i>'.$email4.'
							                            <br />
							                            <i class="glyphicon glyphicon-phone"></i>'.$telefon4.'
							                            <br />
							                        <!-- Split button -->
							                    </div>
							                </div>
							            </div>
							        </div>';
							    }
							}
						?>
						</div>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!--  END utilizatorii cu mai mult de 3 comenzi -->
<!--  START utilizatorul cu cele mai multe laptopuri cumparate -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading middle"><i class="fa fa-user fa-2x"></i></div></a>
						<div class="circle-tile-content red" style="height: 150px;">
							<div class="circle-tile-description text-faded">
								Utilizatorul cu cele mai multe laptopuri cumparate
							</div>
							<!--<div class="circle-tile-number text-faded ">10</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href='#myModal5' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal5' style="color: white;margin-top: 20px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div> 
				<div class="modal fade" id='playerModal5' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Utilizatorul cu cele mai multe laptopuri cumparate</h4>
					</div>
					<div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
					<div class="embed-responsive embed-responsive-16by9 centru">
					<div id="player" class="embed-responsive-item">
						<div class="row">
						<?php
							$sql5 = "SELECT Rez.UserID AS id, Rez.UserNume AS nume, Rez.UserPrenume AS prenume, Rez.Username AS username, Rez.Adresa AS adresa, Rez.Telefon AS telefon, Rez.Gen AS gen, Rez.Email AS email, MAX(Rez.NrLaptopuriCumparatePerUtilizator) AS laptopuri
									FROM(	SELECT C.UtilizatorID AS UserID, U.nume As UserNume, U.prenume AS UserPrenume, U.username AS Username, U.email AS Email, U.telefon AS Telefon, U.adresa AS Adresa, U.gen AS Gen, COUNT(*) AS NrLaptopuriCumparatePerUtilizator
									        FROM Produs P INNER JOIN Comanda_Produs CP ON(P.ID = CP.produsID)
									                      INNER JOIN Comanda C ON(CP.comandaID = C.ID)
									                      INNER JOIN Utilizator U ON(C.UtilizatorID = U.ID)
									        GROUP BY C.UtilizatorID
									        ORDER BY C.ID) AS Rez";

							$result5 = $conn->query($sql5);
							echo $conn->error;
							if ($result5->num_rows > 0) {
							    // output data of each row
							    while($row5 = $result5->fetch_assoc()) {
							    	$nume5 = $row5["nume"];
							    	$prenume5 = $row5["prenume"];
							    	$username5 = $row5["username"];
							    	$adresa5 = $row5["adresa"];
							    	$email5 = $row5["email"];
							    	$telefon5 = $row5["telefon"];
							    	$gen5 = $row5["gen"];
							    	$nr5 = $row5["laptopuri"];

							    	echo'
							        <div class="col-xs-4 col-sm-4 col-md-4">
							            <div class="well well-sm">
							                <div class="row centered">
							                    <div class="col-sm-12 col-md-12 centered">';
						                    		if($gen5 === 'F')
						                    			echo '<img src="female.png" class="img-responsive" alt="Cinque Terre" width="304" height="236">';
						                    		else if($gen5 === 'M')
						                    			echo '<img src="male.png" class="img-responsive" alt="Cinque Terre" width="304" height="236">';
							                        echo '<h4>
							                            '.$nume5.' '.$prenume5.'</h5>
							                        <small><cite title="San Francisco, USA">'.$adresa5.'<i class="glyphicon glyphicon-map-marker">
							                        </i></cite></small>
							                        <p>
							                        	<i class="glyphicon glyphicon-user"></i>'.$username5.'
							                            <br />
							                            <i class="glyphicon glyphicon-envelope"></i>'.$email5.'
							                            <br />
							                            <i class="glyphicon glyphicon-phone"></i>'.$telefon5.'
							                            <br />
							                            <h4 class="text-muted text-center" style="color: #47B2BA"><span class="fa fa-laptop"></span> Numar de laptopuri cumparate: '.$nr5.'</h4>
							                        <!-- Split button -->
							                    </div>
							                </div>
							            </div>
							        </div>';
							    }
							}
							
						?>
						</div>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!--  END utilizatorul cu cele mai multe laptopuri cumparate -->
<!--  START utilizatorul cu cea mai scumpa comanda -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-user fa-2x"></i></div></a>
						<div class="circle-tile-content dark-blue" style="height: 150px;">
							<div class="circle-tile-description text-faded"> 
								Utilizatorul cu cea mai scumpa comanda
							</div>
							<!--<div class="circle-tile-number text-faded ">265</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href='#myModal6' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal6' style="color: white;margin-top: 40px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="modal fade" id='playerModal6' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Utilizatorul cu cea mai scumpa comanda</h4>
					</div>
					<div class="modal-body" style="max-height: calc(100vh - 210px);overflow-y: auto;">
					<div class="embed-responsive embed-responsive-16by9 centru">
					<div id="player" class="embed-responsive-item">
						<div class="row">
						<?php
							$sql6 = "SELECT A.UserID, A.Nume AS nume, A.Prenume AS prenume, A.Username AS username, A.Email AS email, A.Telefon AS telefon, A.Adresa AS adresa, A.Gen AS gen, MAX(A.PretTotalComanda) AS pret
									FROM (SELECT C.ID AS ComandaID,C.UtilizatorID AS UserID, U.nume AS Nume, U.prenume AS Prenume, U.username AS Username, U.email AS Email, U.telefon AS Telefon, U.adresa AS Adresa, U.gen AS Gen, SUM(P.pret) AS PretTotalComanda
									        FROM Produs P INNER JOIN Comanda_Produs CP ON(P.ID = CP.produsID)
									                      INNER JOIN Comanda C ON(CP.comandaID = C.ID)
									                      INNER JOIN Utilizator U ON(C.UtilizatorID = U.ID)
									        GROUP BY C.ID
									        ORDER BY C.ID) AS A";

							$result6 = $conn->query($sql6);
							echo $conn->error;
							if ($result6->num_rows > 0) {
							    // output data of each row
							    while($row6 = $result6->fetch_assoc()) {
							    	$nume6 = $row6["nume"];
							    	$prenume6 = $row6["prenume"];
							    	$username6 = $row6["username"];
							    	$adresa6 = $row6["adresa"];
							    	$email6 = $row6["email"];
							    	$telefon6 = $row6["telefon"];
							    	$gen6 = $row6["gen"];
							    	$pret6 = $row6["pret"];

							    	echo'
							        <div class="col-xs-4 col-sm-4 col-md-4">
							            <div class="well well-sm">
							                <div class="row centered">
							                    <div class="col-sm-12 col-md-12 centered">';
						                    		if($gen6 === 'F')
						                    			echo '<img src="female.png" class="img-responsive" alt="Cinque Terre" width="304" height="236">';
						                    		else if($gen6 === 'M')
						                    			echo '<img src="male.png" class="img-responsive" alt="Cinque Terre" width="304" height="236">';
							                        echo '<h4>
							                            '.$nume6.' '.$prenume6.'</h6>
							                        <small><cite title="San Francisco, USA">'.$adresa6.'<i class="glyphicon glyphicon-map-marker">
							                        </i></cite></small>
							                        <p>
							                        	<i class="glyphicon glyphicon-user"></i>'.$username6.'
							                            <br />
							                            <i class="glyphicon glyphicon-envelope"></i>'.$email6.'
							                            <br />
							                            <i class="glyphicon glyphicon-phone"></i>'.$telefon6.'
							                            <br />
							                            <h4 class="text-muted text-center" style="color: #47B2BA"><span class="fa fa-laptop"></span> Cost comanda: </br>'.$pret6.' RON</h4>
							                        <!-- Split button -->
							                    </div>
							                </div>
							            </div>
							        </div>';
							    }
							}
							
						?>
						</div>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!-- END utilizatorul cu cea mai scumpa comanda-->
				<!--  Al treilea rand -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-laptop fa-2x"></i></div></a>
						<div class="circle-tile-content dark-blue" style="height: 150px;">
							<div class="circle-tile-description text-faded"> 
								Lista laptopuri pentru fiecare producator
							</div>
							<!--<div class="circle-tile-number text-faded ">265</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href="#" style="color: white; margin-top: 40px;">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div>
<!-- START Numar laptopuri vandute pentru fiecare producator -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading middle"><i class="fa fa-laptop fa-2x"></i></div></a>
						<div class="circle-tile-content red" style="height: 150px;">
							<div class="circle-tile-description text-faded">
								Numar laptopuri vandute pentru fiecare producator
							</div>
							<!--<div class="circle-tile-number text-faded ">10</div>-->
							<p></p>
							<p></p>
							<a class="circle-tile-footer" href='#myModal8' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal8' style="color: white;margin-top: 20px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div> 
				<div class="modal fade" id='playerModal8' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Numar laptopuri vandute pentru fiecare producator</h4>
					</div>
					<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9">
					<div id="player" class="embed-responsive-item">
						<?php
							$sql8 = "SELECT P.producator AS producator, COUNT(*) AS nr
									FROM Produs P INNER JOIN Comanda_Produs CP ON(P.ID = CP.produsID)
												  INNER JOIN Comanda C ON(CP.comandaID = C.ID)
									              INNER JOIN Utilizator U ON(C.UtilizatorID = U.ID)
									GROUP  BY P.producator
									ORDER BY C.ID;";

							$result8 = $conn->query($sql8);
							echo $conn->error;
							if ($result8->num_rows > 0) {
							    // output data of each row
							    while($row8 = $result8->fetch_assoc()) {
							    	$producator8 =  $row8["producator"];
							    	$nr8 = $row8["nr"];
							    	echo '
									<div class="twPc-divStats">
										<ul class="twPc-Arrange">
											<li class="twPc-ArrangeSizeFit">
												<a href="https://twitter.com/mertskaplan/following" title="885 Following">
													<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Producator</span>
													<span class="twPc-StatValue">'.$producator8.'</span>
												</a>
											</li>
											<li class="twPc-ArrangeSizeFit">
												<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
													<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Numar laptopuri vandute</span>
													<span class="twPc-StatValue">'.$nr8.'</span>
												</a>
											</li>
										</ul>
										<hr>
									</div>';
							    }
							}
						?>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!-- END Numar laptopuri vandute pentru fiecare producator -->
<!-- START Numar laptopuri vandute in functie de culoare -->
				<div class="col-lg-4 col-sm-6">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-laptop fa-2x"></i></div></a>
						<div class="circle-tile-content dark-blue" style="height: 150px;">
							<div class="circle-tile-description text-faded"> 
								Numar laptopuri vandute in functie de culoare
							</div>
							<!--<div class="circle-tile-number text-faded ">265</div>-->
							<a class="circle-tile-footer" href='#myModal9' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#playerModal9' style="color: white;margin-top: 30px; outline: none">Afiseaza <i class="fa fa-chevron-circle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="modal fade" id='playerModal9' role='dialog' tabindex='-1'>
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header">
						<button class="close" aria-label='Close' data-dismiss='modal', type='button'>
						<span aria-hidden='true'>×</span></button>
						<h4 class="modal-title">Numar laptopuri vandute in functie de culoare</h4>
					</div>
					<div class="modal-body">
					<div class="embed-responsive embed-responsive-16by9" style="margin-top:  50px;">
					<div id="player" class="embed-responsive-item">
					<hr>
						<?php
							$sql9 = "SELECT P.culoare AS culoare, COUNT(*) AS nr
									FROM Produs P INNER JOIN Comanda_Produs CP ON(P.ID = CP.produsID)
												  INNER JOIN Comanda C ON(CP.comandaID = C.ID)
									              INNER JOIN Utilizator U ON(C.UtilizatorID = U.ID)
									GROUP  BY P.culoare
									ORDER BY C.ID;";

							$result9 = $conn->query($sql9);
							echo $conn->error;
							if ($result9->num_rows > 0) {
							    // output data of each row
							    while($row9 = $result9->fetch_assoc()) {
							    	$culoare9 =  $row9["culoare"];
							    	$nr9 = $row9["nr"];
							    	echo '
									<div class="twPc-divStats">
										<ul class="twPc-Arrange">
											<li class="twPc-ArrangeSizeFit">
												<a href="https://twitter.com/mertskaplan/following" title="985 Following">
													<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Laptop</span>
													<span class="twPc-StatValue">'.$culoare9.'</span>
												</a>
											</li>
											<li class="twPc-ArrangeSizeFit">
												<a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
													<span class="twPc-StatLabel twPc-block" style="color: #ACADAD">Numar laptopuri vandute</span>
													<span class="twPc-StatValue">'.$nr9.'</span>
												</a>
											</li>
										</ul>
										<hr>
									</div>';
							    }
							}
						?>
					</div>
					</div>
					</div>
						
					</div>
					</div>
				</div>
<!-- END Numar laptopuri vandute in functie de culoare -->
<!-- START Lista laptopuri cu pretul aflat intr-un interval si care provin de la un anumit producator -->
				<div class="col-lg-12 col-sm-12">
					<div class="circle-tile ">
						<a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-list fa-2x"></i></div></a>
						<div class="circle-tile-content dark-blue" style="height: 200px;">
							<div class="circle-tile-description text-faded"> 
								Lista laptopuri cu pretul aflat intr-un interval si care provin de la un anumit producator
							</div>
							<form name="raport" action="pret_raport.php" method="POST" style=" display:inline!important;">
							</br>
							Pret minim: <input type="text" name="min"><br>
							Pret maxim: <input type="text" name="max"><br>
							Producator:
							<select name="producator">
								<option value="ASUS">ASUS</option>
								<option value="Lenovo">Lenovo</option>
								<option value="Acer">Acer</option>
								<option value="Apple">Apple</option>
								<option value="HP">HP</option>
								</select>
								</br>
								<input type="submit" value="Submit">
								<!-- other single input form boxes follow this select -->
							</form>
						</div>
					</div>
				</div>
<!-- END Lista laptopuri cu pretul aflat intr-un interval si care provin de la un anumit producator -->
			</div> 
		</div>  
</body>
</html>

