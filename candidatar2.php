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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="css/style2.css">

        <title>???</title>

    </head>

    <body> 
        <!--Barra cima-->
        <div class="container-fluid backgMenu">
            <div class="row justify-content-md-center">
                <div class="col col-lg-1">
                	<a href="home2.php">
                    	<img src="images/logo-traineebook.png"  alt="logo" class="logo-traineebook mt-1" width="40" height="40" >
                    </a>
                </div>
                <!--Barra de pesquisa-->
                <div class="col col-lg-4 mt-1">
                    <form method="POST" action="Pesquisar2.php">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="estagio" placeholder="Buscar estágio" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-Light" type="button submit" id="button-addon2" onclick="">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Colocar fotinha e mais algo-->
                <?php
                $nomeDiv= explode(" ",$_SESSION['nome']);
                //echo $nomeDiv[0];
                ?>
                <div class="col col-lg-2 mt-2" onclick='<?php echo ('window.location.href = "perfilEmpresa.php?nav=resumo&idPerfiLVer='.$id.'"') ?>'>
                    <div class=" nomeMenu" >
                        <img src="images/icons8.png" " >
                        <?php
                        echo $nomeDiv[0];
                        ?> 
                    </div>   
                </div>
                <div class="col col-lg-1 mt-2" style="right: 7%" onclick='<?php  echo ('window.location.href = "index2.php"') ?>'>
                    <div class=" nomeMenu"  >
                        <img src="images/leave.png" width="32px" height="32px"  >
                    </div>   
                </div>
            </div> 
        </div>
            </div>
        </div>
        <!--Informações do estagio-->
        <div class="container-fluid">
            <div class="row justify-content-md-center mt-xl-5">
            	<div class="col col-lg-6">

            		<div class="jumbotron jumbotron-fluid">
						<div class="container">
					  		<h1 class="display">Empresa</h1>
					    	<p class="lead"><?php echo("$nomeEmpr"); ?></p>
					  	</div>
					</div>
					<div class="jumbotron jumbotron-fluid">
						<div class="container">
					  		<h1 class="display">Área</h1>
					    	<p class="lead"><?php echo("$area"); ?></p>
					  	</div>
					</div>
					<div class="jumbotron jumbotron-fluid">
						<div class="container">
					  		<h1 class="display">Requisítos</h1>
					    	<p class="lead"><?php echo("$requisitos"); ?></p>
					  	</div>
					</div>
					<div class="jumbotron jumbotron-fluid">
						<div class="container">
					  		<h1 class="display">Descrição</h1>
					    	<p class="lead"><?php echo("$descricao"); ?></p>
					  	</div>
					</div>
            	</div>
            </div>
        </div>
        <?php if($tipo=="aluno"){ ?>
        <!--Formulario para se candidatar ao estaagio-->
        <div class="container-fluid">
            <div class="row justify-content-md-center mt-xl-2 ">
                <div class="col col-lg-6">
                	<form method="POST" action='cadastraEstagio.php?idd=<?php echo($idd) ?>'>
	                	<div class="input-group">
							<div class="input-group-prepend">
						    	<span class="input-group-text">Motivação</span>
							</div>
							<textarea class="form-control" name="textMotiv" placeholder="Escreva aqui sua motivacao" aria-label="With textarea"></textarea>
							<button type="button submit"  class="btn btn-primary btn-lg btn-block mb-xl-5">Candidatar-se </button>
						</div>
					</form>
                </div>
        	</div>
        </div>
        <?php } ?>       
    
    </body>

</html>