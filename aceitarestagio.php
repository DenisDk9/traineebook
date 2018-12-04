<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= explode(" ",$_SESSION['nome']);
$tipo = $_SESSION['tipo'];
$email= $_SESSION["user"];

include_once "conexao.php";

$idaluno=$_POST["idaluno"];
$idestagio=$_POST["idestagio"];

$sql="UPDATE dados_estagio set aprovado='1' where id_aluno='$idaluno' and id_estagio='$idestagio' ";
$result= mysqli_query($conn,$sql);

header("location: home.php");


?>