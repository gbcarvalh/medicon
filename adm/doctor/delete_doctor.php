<?php
	/* Recebendo os dados do formulário */
	$id = $_GET['id'];

	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../../common.php";
	include_once "../../db.php";

	$query = "DELETE FROM doctor WHERE id=?";

	$stm = $db->prepare($query);
	$stm->bindParam(1, $id);

	if($stm->execute()) {
		header("location:search_doctor.php");
	}
	else {
		print "<p>Erro ao deletar médico!</p>";
		print "<a href='search_doctor.php'>Voltar</a>";
	}
?>
