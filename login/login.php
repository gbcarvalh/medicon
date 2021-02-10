<?php
	//Inicia a sessão.
	session_start();

	include_once "../common.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Contact</title>
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
								<div class="home_title">Cadastro</div>
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

					<!-- Login form -->
					<div class="col-lg-6 col-sm-12 contact_col" style="margin: 0 auto;">
						<div class="info_form_container">
						<div class="info_form_title">Login</div>
						<?php
							if (isset($_GET['error']) && $_GET['error'] == 1){
						?>
								<div class="info_form_title" style="color: red; font-size: 1.3em;"><strong>Erro!</strong> Usuário ou Senha Inválidos!</div>
						<?php
							}
						?>
							<form method= "post" action="<?php print $url ?>/login/confirm.php" class="info_form" id="info_form">
								<input type="text" class="info_input" placeholder="CPF/CRM" required="required" name="code">
								<input type="password" class="info_input" placeholder="Senha" name="senha">
								<button type="submit" class="info_form_button">Entrar</button>
							</form>
							<br>
							<div class="ml-auto" style="color: black; text-align:center;">Ainda não possui conta? <a href="<?php print $url ?>/login/register.php">Cadastre-se</a></div>
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
						<div class="col">
							<div class="footer_bar_content d-flex flex-sm-row flex-column align-items-lg-center align-items-start justify-content-start">
								<nav class="footer_nav">
								</nav>
								<div class="footer_links">
								</div>
								<div class="footer_phone ml-lg-auto">
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
	<script src="<?php print $url ?>/js/pattern.js"></script>
</body>

</html>
