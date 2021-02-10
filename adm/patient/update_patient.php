<?php
	/* Recebendo os dados do formulário */
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];

	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../../common.php";
	include_once "../../db.php";

	$query = "UPDATE patient
		SET name=?, contact=?, cpf=?
		WHERE id=?";

	$stm = $db->prepare($query);
	$stm->bindParam(1, $name);
	$stm->bindParam(2, $email);
	$stm->bindParam(3, $cpf);
	$stm->bindParam(5, $id);

	if($stm->execute()) {
		header("location:search_patient.php");
	}
	else {
		print "<p>Erro ao atualizar paciente!</p>";
		print "<a href='search_patient.php'>Voltar</a>";
	}
?>
