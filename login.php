<?php

//Incluindo a conexao com o banco de dados
include_once "conexao.php";


//Um teste se estamos recebendo pelo metodo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$email =$_POST["email"];
	$senha = $_POST["senha"];


	echo $email;
	echo $senha;
	echo("<br><br><br><br>");

	$sql = "SELECT * FROM aluno  WHERE email = '$email' and senha = '$senha'";

	//lembrar que mysql_.. foi descontinuada, agora é mysqli
	$result = mysqli_query($conn,$sql);
	

	if (!$result) {
		echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
		echo 'Erro MySQL: ' . mysqli_error();
		exit;
	}else{
		echo("Sucessfull query database");
	}

	//para saber se é sucesso a consulta no banco dados
	//verificaremos o numero de linhas
	$row = mysqli_num_rows($result);

	if($row < 1){
		echo "<script>alert('Email ou senha invalida')</script>";
		echo "<script>loginfailed()</script>";
		exit;
	}


}

//Um teste se estamos recebendo pelo metodo get
//Mas aqui não vamos usar esse método
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	echo "METODO GET";
}

?>