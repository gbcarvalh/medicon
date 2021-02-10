<?php
	/* Recebendo os dados do formulário */
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	include_once "../common.php";

	/* Conectando com o banco de dados para cadastrar registros */
	$datasource = 'mysql:host=localhost;dbname=t17login';
	$user = 'root';
	$pass = 'vertrigo';
	$db = new PDO($datasource, $user, $pass);

	$query = "INSERT INTO usuario (login,pass) VALUES(?,?)";
	$stm = $db->prepare($query);
	$stm->bindParam(1, $usuario);
	$stm->bindParam(2, $senha);

	if($stm->execute()) {
		print "<p>Cadastro efetuado com sucesso</p>";
		print "<a href='$url/index.php'>Voltar</a>";
	}
	else {
		print "<p>Erro ao cadastrar usuário!</p>";
		print "<a href='$url/index.php'>Voltar</a>";
	}
?>
