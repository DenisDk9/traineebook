<?php
session_start();
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
	$sql2 =  "SELECT * FROM empresa  WHERE email = '$email' and senha = '$senha'";

	//lembrar que mysql_.. foi descontinuada, agora é mysqli
	$result1 = mysqli_query($conn,$sql);
	$result2 = mysqli_query($conn,$sql2);

	$nome1 = $result1->fetch_array();
	$nome2 = $result2->fetch_array();
	

	if (isset($nome1["nome"])) {

		echo("Sucessfull query database2");
		$_SESSION["user"]=$email;

		$_SESSION["nome"]=$nome1["nome"];
		$_SESSION["tipo"]="aluno";
		header("location: home2.php");

		
	}
	if(isset($nome2["nome"])){
		echo("Sucessfull query database");
		$_SESSION["user"]=$email;
		
		$_SESSION["nome"]=$nome2["nome"];
		$_SESSION["tipo"]= "empresa";
		header("location: homeEmpresa.php");
	}

	//para saber se é sucesso a consulta no banco dados
	//verificaremos o numero de linhas
	$row = mysqli_num_rows($result);

	if($row < 1){
		//echo "<script>alert('')</script>";
		//echo "<script>loginfailed()</script>";
		echo('<script>alert("Email ou senha invalida"); window.location.href = "index2.php";</script>') ;
		exit;
	}


}

/*
//Um teste se estamos recebendo pelo metodo get
//Mas aqui não vamos usar esse método
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	echo "METODO GET";
}
*/

?>