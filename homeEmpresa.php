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
        <div class="container-fluid ">
            <div class="row justify-content-md-center">
                <div class="col col-lg-6">
                    <div class="card mt-3">
                        <div class="card-body">
                        Complete abaixo para inserir um novo estágio !
                        </div>
                    </div>
                    <form method="POST" action="criaEstagio.php">
                        <div class="form-group mt-2">
                            <label for="formGroupExampleInput">Titulo do estágio</label>
                            <input type="text" class="form-control" name = "titulo" id="formGroupExampleInput" placeholder="Título">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Área</label>
                            <input type="text" class="form-control" name="area" id="formGroupExampleInput2" placeholder="Área">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Requisitos</label>
                            <textarea class="form-control" name="requisitos" placeholder="Requisitos" aria-label="With textarea"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Descrição</label>
                            <textarea class="form-control" name="descricao" placeholder="Descrição" aria-label="With textarea"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar estágio</button>
                    </form>

                </div>
                <div class="col col-lg-6">
                    <div class="card mt-3">
                        <div class="card-body">
                        Estágios solicitados pendentes !
                        </div>
                    </div>
                    
                    <?php
                    $sql2="SELECT * from estagio where id_empresa='$id' and ativo='1'";
                    $result4=mysqli_query($conn,$sql2);
                    while($pendencias=$result4->fetch_array()){
                        $idd=$pendencias["id_estagio"];
                            $sql="SELECT * from dados_estagio where id_estagio='$idd' and aprovado='0'";
                            $result5=mysqli_query($conn,$sql);
                            while($pendencias2=$result5->fetch_array()){ 
                                $idaluno=$pendencias2["id_aluno"];
                                $sql3="SELECT nome from aluno where id_aluno='$idaluno'";
                                $result6=mysqli_query($conn,$sql3)->fetch_array();
                                $nomealuno=$result6["nome"];

                                echo ('                    
                                    <div class="card mt-2">
                                        <h5 class="card-header">Título: '.$pendencias["titulo"].'</h5>
                                        <div class="card-body">

                                           Aluno: <a href="perfilEstudante.php?nav=historico&idPerfiLVer='.$idaluno.'"'.' class="card-text">'.$nomealuno.'</a><br>
                                           <p class="card-text">Motivação: '.$pendencias2['motivacao'].'</p>
                                           <p class="card-text">Descrição: '.$pendencias['descricao'].'</p>
                                            <a href="aceitaEstagio.php?idX='.$pendencias2['id_dados_estagio'].'" class="btn btn-primary">Aceitar estágio</a>
                                        </div>
                                    </div>
                                ');
                            }
                        }
                    ?>



                </div>

            </div>
        </div>

   	</body>
</html>