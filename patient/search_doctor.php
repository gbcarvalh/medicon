<?php
	//Inicia a sessão.
	session_start();

	include_once "../common.php";
	include_once "../db.php";

	$name = '';
	if (isset($_GET['name'])) {
		$name = $_GET['name'];
	}

	$speciality = 'all';
	if (isset($_GET['speciality'])) {
		$speciality = $_GET['speciality'];
	}

	$plan = 'all';
	if (isset($_GET['plan'])) {
		$plan = $_GET['plan'];
	}

	$msg = '';
	if (isset($_GET['msg'])) {
		$msg = "Faça login para agendar.";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Pesquisar Médicos</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Health medical template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php print $url ?>/styles/bootstrap4/bootstrap.min.css">
	<link href="<?php print $url ?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php print $url ?>/styles/pattern.css">
	<link rel="stylesheet" type="text/css" href="<?php print $url ?>/styles/pattern_responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Menu -->

		<div class="menu trans_500">
			<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
				<div class="menu_close_container">
					<div class="menu_close"></div>
				</div>
				<form action="#" class="menu_search_form">
					<input type="text" class="menu_search_input" placeholder="Search" required="required">
					<button class="menu_search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
				<ul>
					<?php
						if (isset($_SESSION['user'])) {
							$usuario = $_SESSION['user'];
							$nome = $_SESSION['nome'];
					?>
							<li class="menu_item"><a href="#"><h1><b>Olá <?php print $nome ?>!</b></h1></a></li>
							<li class="menu_item"><a href="<?php print $url ?>/index.php">Início</a></li>
							<li class="menu_item"><a href="<?php print $url ?>/patient/search_doctor.php">Encontre seu médico</a></li>
							<li class="menu_item"><a href="<?php print $url ?>/profile.php">Meu perfil</a></li>
							<li class="menu_item"><a href="<?php print $url ?>/login/logout.php">Sair</a></li>
					<?php
						} else {
					?>
						<div class="header_top_nav">
								<li class="menu_item"><a href="<?php print $url ?>/index.php">Início</a></li>
								<li class="menu_item"><a href="<?php print $url ?>/patient/search_doctor.php">Encontre seu médico</a></li>
								<li class="menu_item"><a href="<?php print $url ?>/login/login.php">Acesse sua Conta!</a></li>
								<li class="menu_item"><a href="<?php print $url ?>/login/register.php">Cadastre-se!</a></li>
						</div>
					<?php
						}
					?>
				</ul>
			</div>
			<div class="menu_social">
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>

		<!-- Home -->

		<div class="home">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php print $url ?>/images/services.jpg" data-speed="0.8"></div>

			<!-- Header -->

			<header class="header" id="header">
				<div>
					<div class="header_top">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="header_top_content d-flex flex-row align-items-center justify-content-start">
										<div class="logo">
										<a href="<?php print $url ?>/index.php">Medicon</a>
										</div>
										<div class="header_top_extra d-flex flex-row align-items-center justify-content-start ml-auto">
											<div class="header_top_nav">
											<?php
												if (isset($_SESSION['user'])) {
													$usuario = $_SESSION['user'];
													$nome = $_SESSION['nome'];
											?>
												<ul class="d-flex flex-row align-items-center justify-content-start">
													<li><a href="#">Olá <?php print $nome ?>!</a></li>
													<li><a href="<?php print $url ?>/profile.php">Meu perfil</a></li>
													<li><a href="<?php print $url ?>/login/logout.php">Sair</a></li>
												</ul>
											<?php
												} else {
											?>
												<div class="header_top_nav">
													<ul class="d-flex flex-row align-items-center justify-content-start">
														<li><a href="<?php print $url ?>/login/login.php">Acesse sua Conta!</a></li>
														<li><a href="<?php print $url ?>/login/register.php">Cadastre-se!</a></li>
													</ul>
												</div>
											<?php
												}
											?>
											</div>
										</div>
										<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header_nav" id="header_nav_pin">
						<div class="header_nav_inner">
							<div class="header_nav_container">
								<div class="container">
									<div class="row">
										<div class="col">
											<div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
												<nav class="main_nav">
													<ul class="d-flex flex-row align-items-center justify-content-start">
													<?php
														if (isset($_SESSION['user']) && $_SESSION['tipo'] == 'adm') {
															$usuario = $_SESSION['user'];
													?>
															<li class="menu_item"><a href="<?php print $url ?>/index.php">Início</a></li>
															<li class="menu_item"><a href="<?php print $url ?>/adm/administrator.php">Administrador</a></li>
															<li class="menu_item"><a href="<?php print $url ?>/profile.php">Perfil</a></li>
													<?php
														} else if(isset($_SESSION['user']) && $_SESSION['tipo'] == 'patient')  {
													?>
															<li class="menu_item"><a href="<?php print $url ?>/index.php">Início</a></li>
															<li class="menu_item"><a href="<?php print $url ?>/patient/search_doctor.php">Encontre seu médico</a></li>
															<li class="menu_item"><a href="<?php print $url ?>/profile.php">Perfil</a></li>
													<?php
														} else if(isset($_SESSION['user']) && $_SESSION['tipo'] == 'doctor')  {
													?>
															<li class="menu_item"><a href="<?php print $url ?>/index.php">Início</a></li>
															<li class="menu_item"><a href="<?php print $url ?>/profile.php">Perfil</a></li>

													<?php
														} else {
													?>
															<li class="menu_item"><a href="<?php print $url ?>/index.php">Início</a></li>
															<li class="menu_item"><a href="<?php print $url ?>/patient/search_doctor.php">Encontre seu médico</a></li>
													<?php
														}
													?>
													</ul>
												</nav>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div class="home_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Pesquisar</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Contact -->

		<div class="contact">
			<div class="container">
				<div class="row">

					<!-- Contact form -->
					<div class="col-lg-12 contact_col">
						<div class="contact_form">
							<div class="contact_title"> Pesquisa de Médicos</div>
								<div style='color: red'><h4><strong>
								<?php
									print $msg;
								?>
							</strong></h4></div>
							<div class="contact_form_container">
								<form method="get" action="search_doctor.php" id="contact_form" class="contact_form">
									<input type="text" id="contact_input" class="contact_input" placeholder="Nome" name="name" value="<?php print $name ?>">
									<select name="speciality" style="width:250px; height:3em; text overflow:hidden; font-size: 1.2em;">
										<?php

										/* Conectando com o banco de dados para listar registros */

										$query = "SELECT * FROM speciality";
										$stm = $db->prepare($query);
												print "<option value='all'>Todas</option>";
										if ($stm->execute()) {

											while ($row = $stm->fetch()) {
												$ids = $row['id'];
												$nameS = $row['name'];

												if($ids == $speciality){
													print "<option value='$ids' selected>$nameS</option>";
												}
												else {
													print "<option value='$ids'>$nameS</option>";
												}
											}

										} else {
											print '<p>Erro ao listar especialidades!</p>';
										}
										?>
									</select>
									<select name="plan" style="width:250px; height:3em; text overflow:hidden; font-size: 1.2em;">
										<?php

										$query = "SELECT * FROM plan";
										$stm = $db->prepare($query);
												print "<option value='all'>Todos</option>";
										if ($stm->execute()) {

											while ($row = $stm->fetch()) {
												$idp = $row['id'];
												$nameP = $row['name'];

												if($idp == $plan){
													print "<option value='$idp' selected>$nameP</option>";
												}
												else {
													print "<option value='$idp'>$nameP</option>";
												}
											}

										} else {
											print '<p>Erro ao listar especialidades!</p>';
										}
										?>
									</select>
									<button type="submit" class="contact_button" id="contact_button">Pesquisar</button>
								</form>
								<br>
								<?php


								if (isset($speciality) && isset($plan) && $speciality == "all" && $plan = "all") {
									$query = "SELECT *, doctor.name as doc, town.name as town, doctor.id as docid, speciality.name as specname FROM doctor JOIN town ON doctor.idtown = town.id JOIN doctor_speciality ON doctor_speciality.iddoc = doctor.id JOIN speciality ON speciality.id = doctor_speciality.idspec WHERE doctor.name LIKE '%$name%' GROUP BY (doctor.id)";
								}
								else if (isset($speciality) && isset($plan) && $plan == "all") {
									$query = "SELECT *, doctor.name as doc, town.name as town, doctor.id as docid, speciality.name as specname FROM doctor JOIN town ON doctor.idtown = town.id JOIN doctor_speciality ON doctor_speciality.iddoc = doctor.id JOIN speciality ON speciality.id = doctor_speciality.idspec WHERE doctor.name LIKE '%$name%' AND speciality.id ='$speciality' GROUP BY (doctor.id)";
								}
								else if (isset($speciality) && isset($plan) && $speciality == "all") {
									$query = "SELECT *, doctor.name as doc, town.name as town, doctor.id as docid, plan.name as planname FROM doctor JOIN town ON doctor.idtown = town.id JOIN doctor_plan ON doctor_plan.iddoc = doctor.id JOIN plan ON plan.id = doctor_plan.idplan WHERE doctor.name LIKE '%$name%' AND plan.id ='$plan' GROUP BY (doctor.id)";
								}
								else{
									$query = "SELECT *, doctor.name as doc, town.name as town, doctor.id as docid, plan.name as planname, doctor.name as doc, town.name as town, doctor.id as docid, speciality.name as specname FROM doctor JOIN town ON doctor.idtown = town.id JOIN doctor_plan ON doctor_plan.iddoc = doctor.id JOIN plan ON plan.id = doctor_plan.idplan JOIN doctor_speciality ON doctor_speciality.iddoc = doctor.id JOIN speciality ON speciality.id = doctor_speciality.idspec WHERE doctor.name LIKE '%$name%' AND plan.id ='$plan' AND speciality.id ='$speciality' GROUP BY (doctor.id)";									
								}
								
								$stm = $db->prepare($query);

								if ($stm->execute()) {
									print "<table class='table'><thead class='color_pescador thead-dark'>
											<tr><th scope='col'>Nome</th>
											<th scope='col'>Endereço</th>
											<th scope='col'>Cidade</th>
											<th scope='col'>Contato</th>
											<th scope='col'>Especialidade</th>
											<th scope='col'>Convênio</th>
											<th scope='col'>Agende</th>
											</tr></thead>";
									while ($row = $stm->fetch()) {
										$id = $row['docid'];
										$nameD = $row['doc'];
										$contact = $row['contact'];
										$speciality = $row['specname'];
										$localization = $row['localization'];
										$town = $row['town'];

										print "<thead class='thead-light'>
															<tr>
																<td>$nameD</td>
																<td>$localization</td>
																<td>$town</td>
																<td>$contact</td>
																<td>";
																		$query2 = "SELECT speciality.name as specname FROM doctor JOIN doctor_speciality ON doctor_speciality.iddoc = doctor.id JOIN speciality ON speciality.id = doctor_speciality.idspec WHERE doctor.id = ?";

																		$stm2 = $db->prepare($query2);
																		$stm2->bindParam(1, $id);

																		if ($stm2->execute()) {
																			$first = true;
																			while ($row2 = $stm2->fetch()) {
																				$specname2 = $row2['specname'];
																				if ($first){
																					$first = false;
																				}
																				else {
																					print ", ";
																				}
																				print $specname2;
																			}
																		}
																print "</td>
																<td>";
																		$query3 = "SELECT plan.name as planname FROM doctor JOIN doctor_plan ON doctor_plan.iddoc = doctor.id JOIN plan ON plan.id = doctor_plan.idplan WHERE doctor.id = ?";

																		$stm3 = $db->prepare($query3);
																		$stm3->bindParam(1, $id);

																		if ($stm3->execute()) {
																			$first = true;
																			while ($row3 = $stm3->fetch()) {
																				$planname = $row3['planname'];
																				if ($first){
																					$first = false;
																				}
																				else {
																					print ", ";
																				}
																				print $planname;
																			}
																		}
																print "</td>
																<td><a href='appointment.php?doctorid=$id'>Agendar</a></td>
															</tr>
													</thead>";
									}
									print "</table>";
								} else {
									print '<p>Erro ao listar médicos!</p>';
									print_r($stm->errorInfo());
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Footer -->

		<footer class="footer">
			<div class="footer_bar">
				<div class="container">
					<div class="row">
						<div class='col'>
							<div class="footer_bar_content d-flex flex-sm-row flex-column align-items-lg-center align-items-start justify-content-start">
								<nav class="footer_nav">
									<ul class="d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
									</ul>
								</nav>
								<div class="footer_links">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script src="<?php print $url ?>/js/jquery-3.3.1.min.js"></script>
	<script src="<?php print $url ?>/styles/bootstrap4/popper.js"></script>
	<script src="<?php print $url ?>/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?php print $url ?>/plugins/easing/easing.js"></script>
	<script src="<?php print $url ?>/plugins/parallax-js-master/parallax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="<?php print $url ?>/js/pattern.js"></script>
</body>

</html>
