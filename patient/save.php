<?php
session_start();
	include_once "../common.php";

	/* Recebendo os dados do formulário */
	$patientid = $_SESSION['id'];
	$doctorid = $_POST['doctorid'];
	$date = $_POST['date'];
	$scheduleid = $_POST['scheduleid'];

	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../db.php";

	$query = "INSERT INTO appointment (
				  idpat,
				  iddoc,
				  appointdate,
				  idschedule
				) VALUES (?,?,?,?)";

	$stm = $db->prepare($query);
	$stm->bindParam(1, $patientid);
	$stm->bindParam(2, $doctorid);
	$stm->bindParam(3, $date);
	$stm->bindParam(4, $scheduleid);

	if($stm->execute()) {
		header("location: $url/patient/appointment.php?doctorid=$doctorid");
	}
	else {
		print_r($stm->errorInfo());
		print "<p>Erro ao cadastrar evento!</p>";
		print "$url/patient/search_doctor.php'";
	}
