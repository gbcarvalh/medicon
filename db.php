<?php
/* Conectando com o banco de dados para cadastrar registros */
	$datasource = 'pgsql:host=localhost;dbname=medicondb';
	$user = 'postgres';
	$pass = 'root';
	$db = new PDO($datasource, $user, $pass);
?>