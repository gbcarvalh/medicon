<?php
	//Inicia a sessão
	session_start();

	include_once "../common.php";

	//Verifica se há dados ativos na sessão
	if(empty($_SESSION["user"]) || $_SESSION["tipo"] != 'adm')
	{
		//Caso não exista dados registrados, exige login
		header("$url/index.php");
	}
?>
