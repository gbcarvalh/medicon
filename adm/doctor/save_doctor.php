<?php
	/* Recebendo os dados do formulário */
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$localization = $_POST['localization'];
	$idtown = $_POST['idtown'];


	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../../common.php";
	include_once "../../db.php";

	$query = "INSERT INTO doctor (
				  name,
				  contact,
				  localization,
				  idtown
				) VALUES (?,?,?,?)";


	$stm = $db->prepare($query);
	$stm->bindParam(1, $name);
	$stm->bindParam(2, $contact);
	$stm->bindParam(3, $localization);
	$stm->bindParam(4, $idtown);

	if($stm->execute()) {
		header("location:register_doctor.php");
	}
	else {
		print "<p>Erro ao cadastrar médico!</p>";
		print "<a href='register_doctor.php'>Voltar</a>";
	}
