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

//$estado=$result["estado"];


if(isset($_POST["botao"]) && $_POST["botao"]=="informacoes"){
    
    $novasenha=$_POST["senha"];
    $novotelefone=$_POST["telefone"];
    $novarua=$_POST["rua"];
    $novobairro=$_POST["bairro"];
    $novacidade=$_POST["cidade"];
    $novoestado=$_POST["estado"];
    $novonumero=$_POST["numero"];

    if($tipo=="aluno"){ 
        
        $novocurso=$_POST["curso"];
        $novauniversidade=$_POST["universidade"];
        $novocpf=$_POST["cpf"];
        //echo "$novocurso $novocpf $novauniversidade";
        
        $sql3="UPDATE $tipo SET senha= '$novasenha' , telefone='$novotelefone' , curso= '$novocurso' , universidade='$novauniversidade' , cpf='$novocpf', cidade='$novacidade', estado='$novoestado', bairro='$novobairro', numero='$novonumero',rua='$novarua'  WHERE email ='$email'  ";

    }
    else 
        $sql3="UPDATE $tipo SET senha= '$novasenha' , telefone='$novotelefone' , rua='$novarua' , numero='$novonumero' , bairro='$novobairro' , cidade ='$novacidade' , estado='$novoestado'  WHERE email ='$email'";
        

    $resultado= mysqli_query($conn,$sql3);
    var_dump($resultado);

    if($tipo == "aluno")
        header('location: perfilEstudante.php?nav=resumo&idPerfiLVer='.$id.'');
    else
    header('location: perfilEmpresa.php?nav=resumo&idPerfiLVer='.$id.'');
}




$sql2 =  "SELECT * FROM $tipo  WHERE email = '$email'";
//var_dump($sql);
$result2= mysqli_query($conn,$sql2);
$result= $result2->fetch_array();


$senha=$result["senha"];
$telefone=$result["telefone"];

if($tipo=="aluno"){

    $curso=$result["curso"];
    $universidade=$result["universidade"];
    $cpf=$result["cpf"];
}
 
$estado=$result["estado"];

$cidade= $result["cidade"];
$numero=$result["numero"];
$bairro=$result["bairro"];
$rua=$result["rua"];
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
    
    </body>

</html>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <div class="card mt-3">
                        <div class="card-body">
                        <center>Editar Perfil <center>
                        </div>
                    </div>
                <form action="perfileditar.php" method="post">
            <?php 
            if($tipo== 'empresa'){
                echo ' 
                <div class="form-group mt-5">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="'.$email.'" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" value="'.$senha.'" placeholder="Senha" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Telefone</label>
                    <input type="number" class="form-control" id="telefone" value="'.$telefone.'" name="telefone" placeholder="Telefone" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="'.$estado.'" placeholder="Estado" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="'.$cidade.'" placeholder="Cidade" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="'.$bairro.'" placeholder="Bairro" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="'.$rua.'" placeholder="Rua" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Numero</label>
                    <input type="number" class="form-control" id="numero" name="numero" value="'.$numero.'" placeholder="Numero" required>
                </div>
                
                <button type="submit" name="botao" value="informacoes" class="btn btn-primary mb-2">Atualizar informações</button>
            ';}
            else{

                echo '
                <div class="form-group mt-5">
                <label for="formGroupExampleInput">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="'.$email.'" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" value="'.$senha.'" placeholder="Senha" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Telefone</label>
                <input type="number" class="form-control" id="telefone" value="'.$telefone.'" name="telefone" placeholder="Telefone" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">CPF</label>
                <input type="number" class="form-control" id="cpf" value="'.$cpf.'" name="cpf" placeholder="CPF" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Universidade</label>
                <input type="text" class="form-control" id="universidade" value="'.$universidade.'" name="universidade" placeholder="Universidade" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Curso</label>
                <input type="text" class="form-control" id="curso" value="'.$curso.'" name="curso" placeholder="Curso" required>
            </div>



            <div class="form-group">
                <label for="formGroupExampleInput2">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="'.$estado.'" placeholder="Estado" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="'.$cidade.'" placeholder="Cidade" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="'.$bairro.'" placeholder="Bairro" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" value="'.$rua.'" placeholder="Rua" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Numero</label>
                <input type="number" class="form-control" id="numero" name="numero" value="'.$numero.'" placeholder="Numero" required>
            </div>
            
            <button type="submit" name="botao" value="informacoes" class="btn btn-primary mb-2">Atualizar informações</button>
            
                
                
                
                ';


            }
            
            ?>
                </form>
            </div>
        </div>
    </div>


