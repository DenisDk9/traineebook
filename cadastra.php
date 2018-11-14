<?php

//Incluindo a conexao com o banco de dados
include_once "conexao.php";


//Um teste se estamos recebendo pelo metodo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	echo "METODO POST";
	//testando javascript dentro php
	echo ("<script>alert('teste');</script>");

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

	if($tipo == "estudante"){
		
	}

}

//Um teste se estamos recebendo pelo metodo get
//Mas aqui não vamos usar esse método
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	echo "METODO GET";
}

?>