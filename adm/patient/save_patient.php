<?php
	/* Recebendo os dados do formulário */
	$name = $_POST['name'];
	$email = $_POST['email'];
	$passwd = $_POST['passwd'];
	$cpf = $_POST['cpf'];


	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../../common.php";
	include_once "../../db.php";

	$query = "INSERT INTO patient (
				  name,
				  email,
				  passwd,
				  cpf
				) VALUES (?,?,?,?)";


	$stm = $db->prepare($query);
	$stm->bindParam(1, $name);
	$stm->bindParam(2, $email);
	$stm->bindParam(3, $passwd);
	$stm->bindParam(4, $cpf);

	if($stm->execute()) {
		header("location:register_patient.php");
	}
	else {
		print "<p>Erro ao cadastrar paciente!</p>";
		print "<a href='register_patient.php'>Voltar</a>";
	}
