<?php
	/* Recebendo os dados do formulário */
	$name = $_POST['name'];


	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../../common.php";
	include_once "../../db.php";

	$query = "INSERT INTO plan (
				  name,
				) VALUES (?)";


	$stm = $db->prepare($query);
	$stm->bindParam(1, $name);

	if($stm->execute()) {
		header("location:register_plan.php");
	}
	else {
		print "<p>Erro ao cadastrar convênio!</p>";
		print "<a href='register_plan.php'>Voltar</a>";
	}
