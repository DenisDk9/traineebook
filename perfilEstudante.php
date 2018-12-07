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

// pegar os dados do perfil que você quer ver
//idPerfilVer é o id do perfil que você vai ver, podendo ser seu ou não
$sql3 =  "SELECT * FROM aluno  WHERE id_aluno = '$idPerfiLVer'";
$result3 = mysqli_query($conn,$sql3);
$registro3 = $result3->fetch_array();
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
                   <?php if($tipo=="aluno"){ ?> <a href="home2.php">
                        <?php } else{ ?><a href="homeEmpresa.php"> <?php } ?>
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
        <!--Termina o container da barra superior-->
        <!--Fazer aqui foto de perfil, capa ou qualquer coisa assim-->
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col col-lg-1">
                    <img src="images/perfilteste.png" alt="foto-perfil" class="img-thumbnail" height="150px" width="150px">
                </div>
                <div class="col col-lg-2 mt-3">
                    <h4><?php echo($registro3['nome'])?></h4>
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
                                    <a class="nav-link active" id="resumo-tab" data-toggle="tab" href="perfilEstudante.php?nav=resumo&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="home" aria-selected="true">Resumo</a>

                                    ');

                            }else{
                                echo('
                                    <a class="nav-link"  id="resumo-tab" data-toggle="tab" href="perfilEstudante.php?nav=resumo&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="home" aria-selected="true">Resumo</a>

                                ');
                            }
                            ?>
                            
                        </li>
                        <li class="nav-item">
                            <?php
                            //echo $tipoNav; 
                            if($tipoNav == "historico"){
                                echo('
                                    <a class="nav-link active" id="historico-tab" data-toggle="tab" href="perfilEstudante.php?nav=historico&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Histórico</a>

                                    ');

                            }else{
                                echo('
                                    <a class="nav-link" id="historico-tab" data-toggle="tab" href="perfilEstudante.php?nav=historico&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Histórico</a>

                                ');
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            //echo $tipoNav; 
                            if($tipoNav == "formacao"){
                                echo('
                                    <a class="nav-link active" id="formacao-tab" data-toggle="tab" href="perfilEstudante.php?nav=formacao&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Formação academica</a>

                                    ');

                            }else{
                                echo('
                                    <a class="nav-link" id="formacao-tab" data-toggle="tab" href="perfilEstudante.php?nav=formacao&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Formação academica</a>

                                ');
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            //echo $tipoNav; 
                            if($tipoNav == "projetos"){
                                echo('
                                    <a class="nav-link active" id="projetos-tab" data-toggle="tab" href="perfilEstudante.php?nav=projetos&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Projetos realizados</a>

                                    ');

                            }else{
                                echo('
                                    <a class="nav-link" id="projetos-tab" data-toggle="tab" href="perfilEstudante.php?nav=projetos&idPerfiLVer='.$idPerfiLVer.'"'.' role="tab" aria-controls="profile" aria-selected="false">Projetos realizados</a>

                                ');
                            }
                            ?>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="resumo" role="tabpanel" aria-labelledby="resumo-tab"></div>
                        <div class="tab-pane fade" id="historico" role="tabpanel" aria-labelledby="historico-tab"></div>
                        <div class="tab-pane fade" id="formacao" role="tabpanel" aria-labelledby="formacao-tab"></div>
                        <div class="tab-pane fade" id="projetos" role="tabpanel" aria-labelledby="projetos-tab"></div>
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
                    }else if ($tipoNav == "historico") { ?>
                       

                        <div class="container-fluid">
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-12 mt-3">
                                <?php
                                //Consulta obter estagios
                                //Mudar aqui para selecionar a região certa
                                $sql1 = $sql1="SELECT * from dados_estagio where id_aluno='$idPerfiLVer' ";
                                $result1 = mysqli_query($conn,$sql1);
            
                                $cont = 0;
                                while ($registro1 = $result1->fetch_array() and $cont < 10) {
            
                                    //consulta passando id da empresa
                                    $idd = $registro1['id_estagio'];
                                    $sql2="SELECT * from estagio where id_estagio='$idd'";
                                    $result_empr =  mysqli_query($conn,$sql2);
            
                                    //como só existe 1 empresa com 1 id
                                   while( $registro2 = $result_empr->fetch_array()){
                                    $idempresaa= $registro2['id_empresa'];
                                    $sql7="SELECT nome from empresa where id_empresa='$idempresaa'";
                                    $result7 =  mysqli_query($conn,$sql7)->fetch_array();
                                    $nome = $result7['nome'];
                                    $area = $registro2['area'];
                                    $descricao = $registro2['descricao'];
                                    $titulo = $registro2['titulo'];
            
                                   
                                    $aprovado=$registro1["aprovado"] == 0 ?  "Pendente" : "Aprovado";
            
                                    echo ("
                                        <div class='card text-center mt-1 mb-1'>
                                            <div class='card-header'>
                                                EMPRESA: $nome
                                            </div>
                                            <form method = 'POST' action = 'candidatar2.php'>
                                                <div class='card-body'>
                                                   <h5 class='card-title'>  Titulo: $titulo </h5>
                                                    <p class='card-text'> Descrição: $descricao </p>
                                                    <h5 class='card-title'> Status: $aprovado </h5>
                                                    
                                                </div>
                                            </form>
                                            <div class='card-footer text-muted'>
                                                2 days ago
                                            </div>
                                        </div>
            
            
                                        ");}
                                }
                                ?>
                            
                            </div>
                        </div>
                    </div>

                        
                    <?php }else if ($tipoNav == "formacao") { ?>
                        <?php if($id==$idPerfiLVer){ ?>
                        <div class="container-fluid ">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-12">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                       Inserir formação acadêmica
                                        </div>
                                    </div>
                                    <form action="inserirformacao.php" method="post">
                                        <div class="form-group mt-2">
                                            <label for="formGroupExampleInput">Instituição</label>
                                            <input type="text" class="form-control" name="instituicao" id="formGroupExampleInput" placeholder="Instituição">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Curso</label>
                                            <input type="text" class="form-control" name="curso" id="formGroupExampleInput2" placeholder="Curso">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Grau</label>
                                            <input type="text" class="form-control" name="grau" id="formGroupExampleInput2" placeholder="Grau">
                                        </div>
                                       
                                        <button type="submit" class="btn btn-primary">Inserir formação</button>
                                    </form>
                                    <?php } ?>


                            <div class="container-fluid">
                                <div class="row justify-content-md-center">
                                    <div class="col col-lg-12 mt-3">

                                    <?php

                                        $sql1="SELECT * from formacao where id_aluno='$idPerfiLVer' ";
                                        $result1 = mysqli_query($conn,$sql1);

                                        while ($registro1 = $result1->fetch_array()){
                                            
                                            $instituicao=$registro1["instituicao"];
                                            $curso=$registro1["curso"];
                                            $grau=$registro1["grau"];
                                            

                                            echo ("
                                        <div class='card text-center mt-1 mb-1'>
                                            <div class='card-header'>
                                               INSTITUIÇÃO: $instituicao
                                            </div>
                                            <form method = 'POST' action = 'candidatar2.php'>
                                                <div class='card-body'>
                                                   GRAU: <h5 class='card-title'> $grau </h5>
                                                  CURSO:  <h5 class='card-title'> $curso </h5>
                                                    
                                                </div>
                                            </form>
                                           
                                        </div>
            
            
                                        ");



                                        }



                                    ?>




                                </div>
                                </div>
                            </div>           

                </div>


                    <?php }else if($tipoNav == "projetos"){
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