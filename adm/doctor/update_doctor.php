<?php
	/* Recebendo os dados do formulário */
	$id = $_POST['id'];
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$localization = $_POST['localization'];
	$idtown = $_POST['idtown'];

	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../../common.php";
	include_once "../../db.php";

	$query = "UPDATE doctor
		SET name=?, contact=?, localization=?, idtown=?
		WHERE id=?";

	$stm = $db->prepare($query);
	$stm->bindParam(1, $name);
	$stm->bindParam(2, $contact);
	$stm->bindParam(3, $localization);
	$stm->bindParam(4, $idtown);
	$stm->bindParam(5, $id);

	if($stm->execute()) {
		header("location:search_doctor.php");
	}
	else {
		print "<p>Erro ao atualizar médico!</p>";
		print "<a href='search_doctor.php'>Voltar</a>";
	}
?>
