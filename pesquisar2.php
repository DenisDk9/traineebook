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

$estado=$result["estado"];
//var_dump($id);
//publicacao

$area=$_POST["estagio"];
//var_dump($area);

//
//echo($area);

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
                <div class="col col-lg-2 mt-2" onclick='<?php if($tipo == "aluno") echo ('window.location.href = "perfilEstudante.php?nav=resumo&idPerfiLVer='.$id.'"'); else  echo ('window.location.href = "perfilEmpresa.php?nav=resumo&idPerfiLVer='.$id.'"'); ?>'>
                    <div class=" nomeMenu" >
                        <img src="images/icons8.png"  >
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
    	<!--fim da barra fixa menu-->

        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                    <div class="card mt-3">
                        <div class="card-body">
                        Resultado da busca
                        </div>
                    </div>
                </div>
            </div>
        </div>

    	<!--Mustrar os estágios encontras ou caso não ache nenhum também mostrar-->
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
			    	<?php

			    		//Consulta no banco
			    		$sql1="SELECT * from estagio where area='$area'";
			    		$result_area = mysqli_query($conn,$sql1);

			    		if (!$result_area) {
			    			
						    echo 'Could not run query: ' . mysqli_error();
						    exit;
						}
						
						while( $registro=$result_area->fetch_array()){

							//consulta passando id da empresa
							$idd = $registro['id_empresa'];
							$sql2="SELECT * from empresa where id_empresa='$idd'";
							$result_empr =  mysqli_query($conn,$sql2);

							//como só existe 1 empresa com 1 id
							$registro2 = $result_empr->fetch_array();
                            $idestagio=$registro["id_estagio"];
							$nome = $registro2['nome'];
							$area = $registro['area'];
							$descricao = $registro['descricao'];
                            $titulo = $registro['titulo'];



							echo (" 
			    				<div class='card text-center mt-1 mb-1'>
                                    <div class='card-header'>
                                        EMPRESA: $nome
                                    </div>
                                    <form method = 'POST' action = 'candidatar2.php'>
                                        <div class='card-body'>
                                            <h5 class='card-title'> $titulo </h5>
                                            <p class='card-text'> $descricao </p>
                                            <a href='candidatar2.php?idd=$idestagio' class='btn btn-primary'>Ver mais</a>
                                        </div>
                                    </form>
                                    <div class='card-footer text-muted'>
                                        2 days ago
                                    </div>
                                </div>
			    			 ");
						}
			    	?>
			    </div>
			</div>
	    </div>



    </body>

</html>