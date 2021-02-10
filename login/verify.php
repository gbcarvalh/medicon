<?php
	//Inicia a sessão
	session_start();


	include_once "../common.php";
	
	//Verifica se há dados ativos na sessão
	if(empty($_SESSION["user"]))
	{
		//Caso não exista dados registrados, exige login
		header("location:$url/index.php");
	}
?>
