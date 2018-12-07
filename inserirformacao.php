<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= $_SESSION['nome'];
$tipo = $_SESSION['tipo'];
$email= $_SESSION["user"];


include_once "conexao.php";


$sql2 =  "SELECT * FROM $tipo  WHERE email = '$email'";

$result2= mysqli_query($conn,$sql2);
$result= $result2->fetch_array();

if($tipo=="empresa")
    $id=$result["id_empresa"];

else
    $id=$result["id_aluno"];

    $grau=$_POST["grau"];
    $instituicao=$_POST["instituicao"];
    $curso=$_POST["curso"];


$sql="INSERT into formacao(id_aluno,grau,instituicao,curso) VALUES ('$id','$grau','$instituicao','$curso') ";
$result2= mysqli_query($conn,$sql);



header('location: perfilEstudante.php?nav=formacao&idPerfiLVer='.$id.'');

?>