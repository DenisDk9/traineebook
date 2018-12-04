<?php

//Incluindo a conexao com o banco de dados
include_once "conexao.php";


//Um teste se estamos recebendo pelo metodo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	echo "METODO POST";
	//testando javascript dentro php
	

	$name = $_POST["name"];
	$email =$_POST["email"];
	$senha = $_POST["senha"];
	$verSenha = $_POST["senha-confirmar"];
	$tipo = $_POST["tipo-cadastro"];

	echo $name;
	echo $email;
	echo $senha;
	echo $verSenha;
	echo $tipo;
	echo("<br><br><br><br>");

	if($tipo == "estudante"){
		//$sql = " INSERT INTO aluno (nome,email, senha) 
		//VALUES ($name,$email,$senha)";

		$sql = " INSERT INTO aluno (nome,email,senha) 
		VALUES ('$name','$email','$senha')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	
	}
	else {
		$sql = " INSERT INTO empresa (nome,email,senha) 
		VALUES ('$name','$email','$senha')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	


	}
	

}

//Um teste se estamos recebendo pelo metodo get
//Mas aqui não vamos usar esse método
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	echo "METODO GET";
}
header("location: index.php");
?>