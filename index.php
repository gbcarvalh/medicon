<?php
	//Inicia a sessão.
	session_start();

	include_once "common.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Medicon</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Health medical template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
								<div class="home_title">Pesquise seu médico!</div>
								<div class="home_text">Encontre seu médico atraves de convênio, especialidade ou localização!</div>
								<div class="search_content d-flex flex-row align-items-center ml-auto">
									<form method="get" action="<?php print $url ?>/patient/search_doctor.php" id="search_container_form" class="search_container_form">
										<input type="text" class="search_container_input" placeholder="Search" required="required" name="name" value="">
										<button class="search_container_button"><i class="fa fa-search" aria-hidden="true"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Departments -->

		<div class="departments">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title">Escolha o Departamento</div>
					</div>
				</div>
				<div class="row dept_row">
					<div class="col">
						<div class="dept_slider_container_outer">
							<div class="dept_slider_container">

								<!-- Slider -->
								<div class="owl-carousel owl-theme dept_slider">

									<!-- Slide -->
									<div class="owl-item dept_item">
										<div class="dept_image"><img src="<?php print $url ?>/images/dept_1.jpg" alt=""></div>
										<div class="dept_content">
											<div class="dept_title">Pediatria</div>
											<div class="dept_link"><a href="<?php print $url ?>/patient/search_doctor.php?name=&speciality=6">Veja mais</a></div>
										</div>
									</div>

									<!-- Slide -->
									<div class="owl-item dept_item">
										<div class="dept_image"><img src="<?php print $url ?>/images/dept_2.jpg" alt=""></div>
										<div class="dept_content">
											<div class="dept_title">Odontologia</div>
											<div class="dept_link"><a href="<?php print $url ?>/patient/search_doctor.php?name=&speciality=2">Veja mais</a></div>
										</div>
									</div>

									<!-- Slide -->
									<div class="owl-item dept_item">
										<div class="dept_image"><img src="<?php print $url ?>/images/dept_3.jpg" alt=""></div>
										<div class="dept_content">
											<div class="dept_title">Ortopedia</div>
											<div class="dept_link"><a href="<?php print $url ?>/patient/search_doctor.php?name=&speciality=1">Veja mais</a></div>
										</div>
									</div>

									<!-- Slide -->
									<div class="owl-item dept_item">
										<div class="dept_image"><img src="<?php print $url ?>/images/dept_4.jpg" alt=""></div>
										<div class="dept_content">
											<div class="dept_title">Homeopatia</div>
											<div class="dept_link"><a href="<?php print $url ?>/patient/search_doctor.php?name=&speciality=3">Veja mais</a></div>
										</div>
									</div>

								</div>

							</div>

							<!-- Dept Slider Nav -->
							<div class="dept_slider_nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?php print $url ?>/images/footer.jpg" data-speed="0.8"></div>
			<div class="footer_content">
				<div class="container">
					<div class="row">
						<!-- Footer Contact -->
						<div class="col-lg-12 footer_col">
							<div class="footer_contact">
								<div class="footer_contact_title">Mande uma mensagem</div>
								<div class="footer_contact_form_container">
									<form action="#" class="footer_contact_form" id="footer_contact_form">
										<div class="d-flex flex-xl-row flex-column align-items-center justify-content-between">
											<input type="text" class="footer_contact_input" placeholder="Nome" required="required">
											<input type="email" class="footer_contact_input" placeholder="E-mail" required="required">
										</div>
										<textarea class="footer_contact_input footer_contact_textarea" placeholder="Mensagem" required="required"></textarea>
										<button class="footer_contact_button">Enviar Mensagem</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_bar_content d-flex flex-sm-row flex-column align-items-lg-center align-items-start justify-content-start">
								<nav class="footer_nav">
								</nav>
								<div class="footer_links">
									<ul class="d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
									</ul>
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
	<script src="<?php print $url ?>/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?php print $url ?>/plugins/easing/easing.js"></script>
	<script src="<?php print $url ?>/plugins/parallax-js-master/parallax.min.js"></script>
	<script src="<?php print $url ?>/js/custom.js"></script>
</body>

</html>
