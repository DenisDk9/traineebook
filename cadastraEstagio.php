<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= $_SESSION['nome'];
$tipo = $_SESSION['tipo'];
$email= $_SESSION["user"];
//$idestagio=$_POST["id_estagio"];
//var_dump($idestagio);

//Tem fazer uma verificação aqui pra ver se o cara não ta trolando passando absurdo via get
$idd = $_REQUEST['idd'];
$textMotiv = $_POST['textMotiv'];





//echo($idd.": hdyevfgwycuewincin");


include_once "conexao.php";



$sql2 =  "SELECT * FROM $tipo  WHERE email = '$email'";

$result2= mysqli_query($conn,$sql2);
$result= $result2->fetch_array();

if($tipo=="empresa")
    $id=$result["id_empresa"];

else
    $id=$result["id_aluno"];
    

$estado=$result["estado"];
//var_dump($id);

if(isset($_POST["botao"]) && $_POST["botao"]=="candidatar"){
    $motivacao=$_POST["motivacao"];
    $sql="INSERT into dados_estagio (aprovado,motivacao,id_aluno,id_estagio) VALUES ('0','$motivacao','$id','$idestagio')";
    $result2= mysqli_query($conn,$sql);
    header("location: home.php");

}

//echo ($idd);
//echo ($nome);

///**Fazer verificação nessa etapa aqui
//consulta para obter oos dados do estagio
$sql1 ="SELECT * from estagio where id_estagio='$idd'";
$result1 = mysqli_query($conn,$sql1);

if (!$result1) {
		
    echo 'Could not run query: ' . mysqli_error();
    exit;
}
if($registro=$result1->fetch_array()){

	$area = $registro['area'];
	$descricao = $registro['descricao'];
	$ativo = $registro['ativo'];
	$requisitos = $registro['requisitos'];
	$id_empresa = $registro['id_empresa'];
}

//consulta obter os dados associado a empresa que criou o estagio
$sql2 = "SELECT * from empresa where id_empresa='$id_empresa'";
$result2 = mysqli_query($conn,$sql2);
if (!$result2) {
		
    echo 'Could not run query: ' . mysqli_error();
    exit;
}
if($registro2 = $result2->fetch_array()){
	$nomeEmpr = $registro2['nome'];
}

$sql1 = " INSERT INTO dados_estagio (aprovado,motivacao,id_aluno,id_estagio) 
        VALUES ('0','$textMotiv','$id','$idd')";

$result1 = mysqli_query($conn,$sql1);

if (!$result1) {
        
    echo 'Could not run query: ' . mysqli_error();
    exit;
}else
    echo('<script>alert("Solicitação enviada a empresa"); window.location.href = "home2.php";</script>') ;
    


?>
