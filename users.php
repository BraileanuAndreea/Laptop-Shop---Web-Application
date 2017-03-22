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
		<link rel="stylesheet" type="text/css" href="usersPage.css">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<link href="dialogPage.css" rel="stylesheet"> <!-- Including CSS File Here-->
		<!-- Including CSS & jQuery Dialog UI Here-->
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
		<script src="dialogPage.js" type="text/javascript"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class = "mycontainer">
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
			<img  class = "title_users" src="User_page/users.png">
			<!-- START add_user button -->
			<div class="div_add_laptop">
				<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block add_laptop" style="outline: none;">Adauga</button></div>
				<!-- line modal -->
				<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
							<h3 class="modal-title" id="lineModalLabel">Introduceti un utilizator nou:</h3>
						</div>
						<div class="modal-body">
							
				            <!-- content goes here -->
							<form action="add_user.php" method="POST">
								<div class="form-group">
									<label for="nume">Nume</label>
									<input type="text" name="nume" class="form-control" id="nume" placeholder="Introduceti numele">
								</div>
								<div class="form-group">
									<label for="prenume">Prenume</label>
									<input type="text" name="prenume" class="form-control" id="prenume" placeholder="Introduceti prenumele">
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control" id="email" placeholder="Introduceti email-ul">
								</div>
								<div class="form-group">
									<label for="adresa">Adresa</label>
									<input type="text" name="adresa" class="form-control" id="adresa" placeholder="Introduceti adresa">
								</div>
								<div class="form-group">
									<label for="telefon">Telefon</label>
									<input type="text" name="telefon" class="form-control" id="telefon" placeholder="Introduceti telefonul">
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control" id="username" placeholder="Introduceti username-ul">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" id="password" placeholder="Introduceti parola">
								</div>
								<div class="form-group">
									<label for="gen">Gen</label>
									<input type="text" name="gen" class="form-control" id="gen" placeholder="Introduceti genul">
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
				  </div>
				</div>
			</div>
			<!-- END add_user button -->
			<div>
				<!--<div class="div_add_btn">
					<div id="dialog" title="Utilizator nou">
						<form action="add_user.php" method="post" class="add_user_form">
							<label>Nume:</label>
							<input id="nume" name="nume" type="text">
							<label>Prenume:</label>
							<input id="prenume" name="prenume" type="text">
							<label>Email:</label>
							<input id="email" name="email" type="text">
							<label>Adresa:</label>
							<input id="adresa" name="adresa" type="text">
							<label>Telefon:</label>
							<input id="telefon" name="telefon" type="text">
							<label>Username:</label>
							<input id="username" name="username" type="text">
							<label>Password:</label>
							<input id="password" name="password" type="text">
							<label>Gen:</label>
							<input id="gen" name="gen" type="text">
							<input id="submit" type="submit" value="Submit">
						</form>
					</div>
				<input id="button" type="button" value="Adauga">
				</div>-->
				<ul>
					<?php
						$sql = "SELECT id, nume, prenume, email, adresa, telefon, username, password, gen 
								FROM Utilizator
								WHERE activ = 1";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    // output data of each row
						    $counter = 0;
						    while($row = $result->fetch_assoc()) {	
							    $id = $row["id"];
							    $data_target = "#form" . $id;
								$form_id = "form" . $id;
								$nume = $row["nume"];
								$prenume = $row["prenume"];
								$email = $row["email"];
								$adresa = $row["adresa"];
								$telefon = $row["telefon"];
								$username = $row["username"];
								$password = $row["password"];
								$gen = $row["gen"];
						    	echo '<div>';
							    	echo '<li class="li_user">';
							    		echo '<div class="div_user">';
							    			echo '<div class="div_photo">';
								    			if($row["gen"] === 'F') 
								    				echo '<img class="photo" src="female.png">';
								    			else echo '<img class="photo" src="male.png">';
								    		echo '</div>';
											echo "<ul>";
												echo '<li class="details">';
													echo ($row["nume"]. " ". $row["prenume"]);
													echo " - ";
													echo ($username);
												echo "</li>";
												echo '<li class="details">';
													echo ($row["email"]);
												echo "</li>";
												echo '<li class="details">';
													echo ($row["adresa"]);
												echo "</li>";
												echo '<li class="details">';
													echo ($row["telefon"]);
												echo "</li>";
											echo "<ul>";
								        echo "</div>";
							        echo "</li>";
							        /*echo '<button class="delete_btn">
							        		<img class="img_delete_btn" src="User_page/delete.png"></img>
							        	</button>';
							        echo '<form style="display: none" action="delete_user.php" method="post" class="delete_user_form_'. $counter .'">
										    <input id="submit_del" type="text" name = "user_id" value = \'' . $row["id"] . '\'>
										</form>';*/
							        echo'
							        	<div class="row">
											<div class="col-md-4 col-xs-4 ">
												<div class="span4">
										            <!-- START modify btn -->
							            			<div class="center"><button data-toggle="modal" data-target="'.$data_target.'" class="btn btn-primary center-block" style="outline: none; margin-right: -170px!important;">Modifica</button></div>
													<!-- line modal -->
													<div class="modal fade" id="'.$form_id.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
																	<h3 class="modal-title" id="lineModalLabel">Introduceti modificarile:</h3>
																</div>
																<div class="modal-body">
																	<form action="update_user.php" method="GET">
																		<div class="form-group" style="display: none;" >
																			<label for="id">ID</label>
																			<input type="text" name="id" value="'.$id.'" class="form-control" id="id" placeholder="Introduceti producatorul">
																		</div>
																		<div class="form-group">
																			<label for="nume_user">Nume</label>
																			<input type="text" name="nume_user" value="'.$nume.'" class="form-control" id="nume_user" placeholder="Introduceti producatorul">
																		</div>
																		<div class="form-group">
																			<label for="prenume">Prenume</label>
																			<input type="text" name="prenume" value="'.$prenume.'" class="form-control" id="prenume" placeholder="Introduceti modelul">
																		</div>
																		<div class="form-group">
																			<label for="pret">Email</label>
																			<input type="text" name="email" value="'.$email.'" class="form-control" id="email" placeholder="Introduceti pretul">
																		</div>
																		<div class="form-group">
																			<label for="adresa_user">Adresa</label>
																			<input type="text" name="adresa_user" value="'.$adresa.'" class="form-control" id="adresa_user" placeholder="Introduceti culoarea">
																		</div>
																		<div class="form-group">
																			<label for="telefon">Telefon</label>
																			<input type="text" name="telefon" value="'.$telefon.'" class="form-control" id="telefon" placeholder="Introduceti greutatea">
																		</div>
																		<div class="form-group">
																			<label for="username">Username</label>
																			<input type="text" name="username" value="'.$username.'" class="form-control" id="username" placeholder="Introduceti stocul">
																		</div>
																		<div class="form-group">
																			<label for="password">Password</label>
																			<input type="text" name="password" value="'.$password.'" class="form-control" id="password" placeholder="Introduceti producatorul CPU">
																		</div>
																		<div class="form-group">
																			<label for="gen">Gen</label>
																			<input type="text" name="gen" value="'.$gen.'" class="form-control" id="mgen" placeholder="Introduceti modelul CPU">
																		</div>
																		<button type="submit" class="btn btn-default">Submit</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
										        <!-- END modify btn -->
										        <div>
										        	<div class="center" >
										        		<button data-toggle="modal" data-target="#delete" class="delete_user_btn btn btn-primary center-block" style="    margin-top: -95px!important; margin-right: -440px!important;">
										        			Delete
										        		</button>
										        	</div>
										        	<form style="display: none" action="delete_user.php" method="post" class="delete_user_form">
						    							<input id="submit_del" type="text" name = "user_id"    value="'.$id.'">
													</form>
										        </div>
									        </div>
										</div>';
						        echo '</div>';
						        $counter ++;
						    }
						} else {
						    echo "0 results";
						}
					?>
				</ul>
			</div>
		</div>
		
	</body>
</html>

<script>
	$(".delete_user_btn").each(function(index) {
		
		$(this).click(function () {
			//var form_id = ".delete_user_form_" + index;
			$(".delete_user_form").eq(index).submit(); 
		});
		  
	})
		
</script>

<?php
	$conn->close();
?>