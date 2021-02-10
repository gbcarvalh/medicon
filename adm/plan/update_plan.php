<?php
	/* Recebendo os dados do formulário */
	$id = $_POST['id'];
	$name = $_POST['name'];

	/* Conectando com o banco de dados para cadastrar registros */
	include_once "../../common.php";
	include_once "../../db.php";

	$query = "UPDATE plan
		SET name=?
		WHERE id=?";

	$stm = $db->prepare($query);
	$stm->bindParam(1, $name);
	$stm->bindParam(2, $id);

	if($stm->execute()) {
		header("location:search_plan.php");
	}
	else {
		print "<p>Erro ao atualizar convênios!</p>";
		print "<a href='search_plan.php'>Voltar</a>";
	}
?>
