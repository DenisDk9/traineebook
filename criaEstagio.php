<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= $_SESSION['nome'];
$tipo = $_SESSION['tipo'];
$email= $_SESSION["user"];

//Dados formularios
$titulo = $_REQUEST['titulo'];
$area = $_REQUEST['area'];
$requisitos = $_REQUEST['requisitos'];
$descricao = $_REQUEST['descricao'];

include_once "conexao.php";



$sql2 =  "SELECT * FROM $tipo  WHERE email = '$email'";

$result2= mysqli_query($conn,$sql2);
$result= $result2->fetch_array();

if($tipo=="empresa")
    $id=$result["id_empresa"];

else
    $id=$result["id_aluno"];

$estado=$result["estado"];

//inserir no banco
$sql3 = " INSERT INTO estagio (area,descricao,ativo,requisitos,id_empresa,titulo) 
		VALUES ('$area','$descricao','1','$requisitos','$id','$titulo')";

if(mysqli_query($conn,$sql3)){
	echo('<script>alert("Estágio cadastrado"); window.location.href = "homeEmpresa.php";</script>') ;
}else{
	echo('<script>alert("Erro ao cadastrar Estágio"); window.location.href = "homeEmpresa.php";</script>') ;
}

?>