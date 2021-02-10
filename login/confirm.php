<?php
// Inicia a sessão.
session_start();

// Pegando os dados de login enviados.
$code = $_POST['code'];
$senha = $_POST['senha'];

/* Conectando com o banco de dados para cadastrar registros */
include_once "../common.php";
include_once "../db.php";

$query = "SELECT * FROM patient WHERE cpf=? AND passwd=?";
$stm = $db->prepare($query);
$stm->bindParam(1, $code);
$stm->bindParam(2, $senha);
$stm->execute();

$logado = FALSE;

if ($row = $stm -> fetch()) {

	// Armazenando usuário na sessão.
	$_SESSION['user'] = $code;
	$_SESSION['nome'] = $row['name'];
	$_SESSION['tipo'] = "patient";
	$_SESSION['id'] = $row['id'];

	$logado = TRUE;
}


if ($logado == FALSE){
	$query = "SELECT * FROM doctor WHERE crm=? AND passwd=?";
	$stm = $db->prepare($query);
	$stm->bindParam(1, $code);
	$stm->bindParam(2, $senha);
	$stm->execute();

	if ($row = $stm -> fetch()) {

		// Armazenando usuário na sessão.
		$_SESSION['user'] = $code;
		$_SESSION['nome'] = $row['name'];
		$_SESSION['tipo'] = "doctor";
		$_SESSION['id'] = $row['id'];

		$logado = TRUE;
	}
}

if ($logado == FALSE){
	$query = "SELECT * FROM administrator WHERE login=? AND passwd=?";
	$stm = $db->prepare($query);
	$stm->bindParam(1, $code);
	$stm->bindParam(2, $senha);
	$stm->execute();

	if ($row = $stm -> fetch()) {

		// Armazenando usuário na sessão.
		$_SESSION['user'] = $code;
		$_SESSION['nome'] = $row['name'];
		$_SESSION['tipo'] = "adm";
		$_SESSION['id'] = $row['id'];

		$logado = TRUE;
	}
}


if ($logado){
	// Redirecionando para a página inicial.
	header("location:$url/index.php");
}
else {
	header("location:$url/login/login.php?error=1");
}

?>
