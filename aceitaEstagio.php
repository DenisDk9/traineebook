<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= $_SESSION['nome'];
$tipo = $_SESSION['tipo'];
$email= $_SESSION["user"];

//Dados formularios
$idX= $_REQUEST['idX'];


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
$sql3 = " UPDATE dados_estagio SET aprovado = '1' WHERE id_dados_estagio = '$idX' ";
if(mysqli_query($conn,$sql3)){
	echo('<script>alert("Estágio aceito e cadastrado"); window.location.href = "homeEmpresa.php";</script>') ;
}else{
	echo('<script>alert("Erro ao aceitar estágio"); window.location.href = "homeEmpresa.php";</script>') ;
}

?>