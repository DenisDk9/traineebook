<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= $_SESSION['nome'];
$tipo = $_SESSION['tipo'];
$email= $_SESSION["user"];

include_once "conexao.php";


//Para saber o que vai ser exibido no nav
$tipoNav = $_REQUEST['nav'];
$idPerfiLVer = $_REQUEST['idPerfiLVer'];


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

/*
Cor 

#452784 (rocho)
#00c1dc (azul claro)
#000000 (preto)
#ffffff (branco)

impact (fonte)
*/

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

        <title>Traineebook</title>

    </head>

    <body> 
        <!--Barra cima-->
        <div class="container-fluid backgMenu">
            <div class="row justify-content-md-center">
                <div class="col col-lg-1">
                    <a href="homeEmpresa.php">
                        <img src="images/logo-traineebook.png"  alt="logo" class="logo-traineebook mt-1" width="40" height="40" >
                    </a>
                </div>
                <!--Barra de pesquisa-->
                <div class="col col-lg-4 mt-1">
                    <form method="POST" action="Pesquisar2.php" >
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="estagio" placeholder="Buscar estágio" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-Light" type="button submit" id="button-addon2" onclick="">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Colocar fotinha e mais algo...-->
                <!--Pegar o primeiro nome-->
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
            </div> 
        </div>

        <!--Termina o container da barra superior-->
        <!--Fazer aqui foto de perfil, capa ou qualquer coisa assim-->
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col col-lg-1">
                    <img src="images/perfilteste.png" alt="foto-perfil" class="img-thumbnail" height="150px" width="150px">
                </div>
                <div class="col col-lg-2 mt-3">
                    <h4><?php echo("$nome")?></h4>
                    <div class="mt-3">
                    <?php if ($idPerfiLVer == $id) { ?>
                            <button class="btn btn-primary" type="submit" onclick='<?php echo('window.location.href="perfileditar.php"')?>'>  Editar perfil</button>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <?php
                            //echo $tipoNav; 
                            if($tipoNav == "resumo"){
                                echo('
                                    <a class="nav-link active" id="resumo-tab" data-toggle="tab" href="perfilEmpresa.php?nav=resumo&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="home" aria-selected="true">Resumo</a>

                                    ');

                            }else{
                                echo('
                                    <a class="nav-link"  id="resumo-tab" data-toggle="tab" href="perfilEmpresa.php?nav=resumo&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="home" aria-selected="true">Resumo</a>

                                ');
                            }
                            ?>
                            
                        </li>
                        <li class="nav-item">
                            <?php
                            //echo $tipoNav; 
                            if($tipoNav == "estagios"){
                                echo('
                                    <a class="nav-link active" id="estagios-tab" data-toggle="tab" href="perfilEmpresa.php?nav=historico&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Estágios</a>

                                    ');

                            }else{
                                echo('
                                    <a class="nav-link" id="estagios-tab" data-toggle="tab" href="perfilEmpresa.php?nav=historico&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Estágios</a>

                                ');
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            //echo $tipoNav; 
                            if($tipoNav == "informacoes"){
                                echo('
                                    <a class="nav-link active" id="informacoes-tab" data-toggle="tab" href="perfilEmpresa.php?nav=formacao&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Infomações da empresa</a>

                                    ');

                            }else{
                                echo('
                                    <a class="nav-link" id="informacoes-tab" data-toggle="tab" href="perfilEmpresa.php?nav=formacao&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Infomações da empresa</a>

                                ');
                            }
                            ?>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="resumo" role="tabpanel" aria-labelledby="resumo-tab"></div>
                        <div class="tab-pane fade" id="historico" role="tabpanel" aria-labelledby="estagios-tab"></div>
                        <div class="tab-pane fade" id="formacao" role="tabpanel" aria-labelledby="informacoes-tab"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                    <?php 
                    if($tipoNav == "resumo"){
                        echo ("
                            <div class='card w-75'>
                                <div class='card-body'>
                                    <h5 class='card-title'>Nome</h5>
                                    <p class='card-text'>$nome </p>       
                                </div>
                            </div>
                            <div class='card w-75'>
                                <div class='card-body'>
                                    <h5 class='card-title'>Curso</h5>
                                    <p class='card-text'> $nome</p>       
                                </div>
                            </div>
                            <div class='card w-75'>
                                <div class='card-body'>
                                    <h5 class='card-title'>Biografia</h5>
                                    <p class='card-text'>$nome </p>       
                                </div>
                            </div>

                        ");
                    }else if ($tipoNav == "historico") {
                        $sql2="SELECT * from estagio where id_empresa='$id' ";
                        $result4=mysqli_query($conn,$sql2);
                        while($pendencias=$result4->fetch_array()){
                            $idd=$pendencias["id_estagio"];
                                $sql="SELECT * from dados_estagio where id_estagio='$idd' and aprovado='1'";
                                $result5=mysqli_query($conn,$sql);
                                while($pendencias2=$result5->fetch_array()){ 
                                    $titulo=$pendencias["titulo"];
                                    $descricao=$pendencias["descricao"];
                                    $idaluno=$pendencias2["id_aluno"];
                                    $sql3="SELECT nome from aluno where id_aluno='$idaluno'";
                                    $result6=mysqli_query($conn,$sql3)->fetch_array();
                                    $nomealuno=$result6["nome"];
                                
                                    echo ("
                                    <div class='card text-center mt-1 mb-1'>
                                        <div class='card-header'>
                                            Aluno: $nomealuno
                                        </div>
                                        <form method = 'POST' action = 'candidatar2.php'>
                                            <div class='card-body'>
                                                <h5 class='card-title'> $titulo </h5>
                                                <p class='card-text'> $descricao </p>
                                                
                                            </div>
                                        </form>
                                        <div class='card-footer text-muted'>
                                            2 days ago
                                        </div>
                                    </div>
        
        
                                    ");

                                }

                            }

                        

                    }else if($tipoNav == "informacoes"){
                        echo (" //exibe projetos

                        ");
                    }else{
                        //Alguem querendo trolar
                    }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>