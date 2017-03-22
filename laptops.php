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
	//echo "Connected successfully";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="laptopsPage.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<div><img  class = "title_laptops" src="laptopuri-01.png"></div>
			<!-- END img title-->
			<!-- START add_laptop button -->
			<div class="div_add_laptop">
				<div class="center"><button data-toggle="modal" data-target="#add" class="btn btn-primary center-block add_laptop" style="outline: none;">Adauga</button></div>
				<!-- line modal -->
				<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
							<h3 class="modal-title" id="lineModalLabel">Introduceti un laptop nou:</h3>
						</div>
						<div class="modal-body">
							
				            <!-- content goes here -->
							<form action="add_laptop.php" method="POST">
								<div class="form-group">
									<label for="producator">Producator laptop</label>
									<input type="text" name="producator" class="form-control" id="producator" placeholder="Introduceti producatorul">
								</div>
								<div class="form-group">
									<label for="model">Model laptop</label>
									<input type="text" name="model" class="form-control" id="model" placeholder="Introduceti modelul">
								</div>
								<div class="form-group">
									<label for="pret">Pret (RON)</label>
									<input type="text" name="pret" class="form-control" id="pret" placeholder="Introduceti pretul">
								</div>
								<div class="form-group">
									<label for="culoare">Culoare</label>
									<input type="text" name="culoare" class="form-control" id="culoare" placeholder="Introduceti culoarea">
								</div>
								<div class="form-group">
									<label for="greutate">Greutate (Kg)</label>
									<input type="text" name="greutate" class="form-control" id="greutate" placeholder="Introduceti greutatea">
								</div>
								<div class="form-group">
									<label for="stoc">Stoc</label>
									<input type="text" name="stoc" class="form-control" id="stoc" placeholder="Introduceti stocul">
								</div>
								<div class="form-group">
									<label for="producator_CPU">Producator CPU</label>
									<input type="text" name="producator_CPU" class="form-control" id="producator_CPU" placeholder="Introduceti producatorul CPU">
								</div>
								<div class="form-group">
									<label for="model_CPU">Model CPU</label>
									<input type="text" name="model_CPU" class="form-control" id="model_CPU" placeholder="Introduceti modelul CPU">
								</div>
								<div class="form-group">
									<label for="memorie_RAM">Memorie RAM</label>
									<input type="text" name="memorie_RAM" class="form-control" id="memorie_RAM" placeholder="Introduceti memoria RAM">
								</div>
								<div class="form-group">
									<label for="rezolutie">Rezolutie display</label>
									<input type="text" name="rezolutie" class="form-control" id="rezolutie" placeholder="Introduceti rezolutia">
								</div>
								<div class="form-group">
									<label for="diagonala">Diagonala display</label>
									<input type="text" name="diagonala" class="form-control" id="diagonala" placeholder="Introduceti diagonala">
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
				  </div>
				</div>
			</div>
			<!-- END add_laptop button -->
			<div class="row">
			    	<div class="col-md-12">
			    		<?php
			    			$sql1 = "SELECT ID, pret, stoc, producator, model, culoare, greutate
									FROM Produs ";
							$result1 = $conn->query($sql1);

							if ($result1->num_rows > 0) {
							    // output data of each row
							    while($row1 = $result1->fetch_assoc()) {
							    	$counter = 0;
							    	$id = $row1["ID"];
							    	$producator = $row1["producator"];
							    	$model = $row1["model"];
							    	$pret = $row1["pret"];
							    	$greutate = $row1["greutate"];
							    	$culoare = $row1["culoare"];
							    	$stoc = $row1["stoc"];
							    	$data_target = "#form" . $id;
							    	$form_id = "form" . $id;
							    	echo '
							    		<div class="product" style="width: 1200px; margin: 0 auto;">
							    		<div class="col-sm-6 col-md-6">
											<div class="thumbnail" style="border: 4px solid #3E4651; border-radius: 10px;">
												<h4 class="text-center"><span class="label label-info">' . $row1["producator"] . '</span></h4>
												<img src="laptop1.jpg" class="img-responsive">
												<div class="caption">
													<div class="row">
														<div class="col-md-8 col-xs-8">
															<h3>'.$row1["producator"].' '.$row1["model"].'</h3>
														</div>
														<div class="col-md-4 col-xs-4 price" style="color: #F1664D">
															<h3>
															<label>'.$row1["pret"].' RON</label></h3>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4 col-xs-4 price" style="color: #F1664D">
															<p>Stoc: '.$row1["stoc"].'</p>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 col-xs-12">
															<p>'.$row1["greutate"].' Kg, '.$row1["culoare"].', ';

														$sql2 = "SELECT P.ID, C.nume, PC.cheie, PC.valoareNumerica, Pc.valoareText 
																FROM Produs P INNER JOIN Produs_Componenta PC ON(P.ID = PC.produsID) INNER JOIN Componenta C ON(PC.componentaID = C.ID) 
																WHERE P.ID = ".$row1["ID"].";";
														$result2 = $conn->query($sql2);

														if ($result2->num_rows > 0) {
														    // output data of each row
														    while($row2 = $result2->fetch_assoc()) {
														    	if($row2["valoareNumerica"] == null){
														    		echo ($row2["valoareText"]);
														    	}
														    	else{
														    		echo ($row2["valoareNumerica"]);
														    	}
														    	if($row2["cheie"] === "producator"){
														    		$producator_CPU = $row2["valoareText"];
														    	}
														    	if($row2["cheie"] === "model"){
														    		$model_CPU = $row2["valoareText"];
														    	}
														    	if($row2["cheie"] === "rezolutie"){
														    		$rezolutie = $row2["valoareText"];
														    	}
														    	if($row2["cheie"] === "RAM"){
														    		echo " GB";
														    		$ram = $row2["valoareNumerica"];
														    	}
														    	if($row2["cheie"] === "diagonala"){
														    		echo " inch";
														    		$diagonala = $row2["valoareNumerica"];
														    	}
														    	echo ", ";
														    }
														}
														echo'</p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-4 col-xs-4 ">
																<div class="span4">
														            <!-- START modify btn -->
											            			<div class="center"><button data-toggle="modal" data-target="'.$data_target.'" class="btn btn-primary center-block" style="outline: none; margin-left: 69px!important;">Modifica</button></div>
																	<!-- line modal -->
																	<div class="modal fade" id="'.$form_id.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
																		<div class="modal-dialog">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
																					<h3 class="modal-title" id="lineModalLabel">Introduceti modificarile:</h3>
																				</div>
																				<div class="modal-body">
																					<form action="update_laptop.php" method="GET">
																						<div class="form-group" style="display: none;" >
																							<label for="id">ID</label>
																							<input type="text" name="id" value="'.$id.'" class="form-control" id="id" placeholder="Introduceti producatorul">
																						</div>
																						<div class="form-group">
																							<label for="producator">Producator laptop</label>
																							<input type="text" name="producator" value="'.$producator.'" class="form-control" id="producator" placeholder="Introduceti producatorul">
																						</div>
																						<div class="form-group">
																							<label for="model">Model laptop</label>
																							<input type="text" name="model" value="'.$model.'" class="form-control" id="model" placeholder="Introduceti modelul">
																						</div>
																						<div class="form-group">
																							<label for="pret">Pret (RON)</label>
																							<input type="text" name="pret" value="'.$pret.'" class="form-control" id="pret" placeholder="Introduceti pretul">
																						</div>
																						<div class="form-group">
																							<label for="culoare">Culoare</label>
																							<input type="text" name="culoare" value="'.$culoare.'" class="form-control" id="culoare" placeholder="Introduceti culoarea">
																						</div>
																						<div class="form-group">
																							<label for="greutate">Greutate (Kg)</label>
																							<input type="text" name="greutate" value="'.$greutate.'" class="form-control" id="greutate" placeholder="Introduceti greutatea">
																						</div>
																						<div class="form-group">
																							<label for="stoc">Stoc</label>
																							<input type="text" name="stoc" value="'.$stoc.'" class="form-control" id="stoc" placeholder="Introduceti stocul">
																						</div>
																						<div class="form-group">
																							<label for="producator_CPU">Producator CPU</label>
																							<input type="text" name="producator_CPU" value="'.$producator_CPU.'" class="form-control" id="producator_CPU" placeholder="Introduceti producatorul CPU">
																						</div>
																						<div class="form-group">
																							<label for="model_CPU">Model CPU</label>
																							<input type="text" name="model_CPU" value="'.$model_CPU.'" class="form-control" id="model_CPU" placeholder="Introduceti modelul CPU">
																						</div>
																						<div class="form-group">
																							<label for="memorie_RAM">Memorie RAM</label>
																							<input type="text" name="memorie_RAM" value="'.$ram.'" class="form-control" id="memorie_RAM" placeholder="Introduceti memoria RAM">
																						</div>
																						<div class="form-group">
																							<label for="rezolutie">Rezolutie display</label>
																							<input type="text" name="rezolutie" value="'.$rezolutie.'" class="form-control" id="rezolutie" placeholder="Introduceti rezolutia">
																						</div>
																						<div class="form-group">
																							<label for="diagonala">Diagonala display</label>
																							<input type="text" name="diagonala" value="'.$diagonala.'" class="form-control" id="diagonala" placeholder="Introduceti diagonala">
																						</div>
																						<button type="submit" class="btn btn-default">Submit</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
														        <!-- END modify btn -->
														        <div >
														        	<div class="center" >
														        		<button data-toggle="modal" data-target="#delete" class="delete_laptop_btn btn btn-primary center-block" style="margin-top: -96px!important; margin-left: 350px!important;">
														        			Delete
														        		</button>
														        	</div>
														        	<form style="display: none" action="delete_laptop.php" method="post" class="delete_laptop_form">
										    							<input id="submit_del" type="text" name = "id"    value="'.$id.'">
																	</form>
														        </div>
													        </div>
														</div>
													</div>
													<p></p>
												</div>
											</div>
										</div>
							    	';
							    	$counter ++;
							    }
							}
			    		?>
						
			        </div> 
				</div>
			</div>
		</div>		
	</body>
</html>

<script>
	$(".delete_laptop_btn").each(function(index) {		
		$(this).click(function () {
			$(".delete_laptop_form").eq(index).submit(); 
		});
		  
	})
</script>

<?php
	$conn->close();
?>