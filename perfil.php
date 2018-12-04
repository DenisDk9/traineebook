<?php

session_start();
include_once "conexao.php";
//var_dump($_SESSION['nome']);
$nome= explode(" ",$_SESSION['nome']);

$tipo = $_SESSION['tipo'];
if(isset($_GET["secao"]));
    $secao=$_GET["secao"];
$email=$_SESSION["user"];




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
    else{  
        $sql3="UPDATE $tipo SET senha= '$novasenha' , telefone='$novotelefone' , rua='$novarua' , numero='$novonumero' , bairro='$novobairro' , cidade ='$novacidade' , estado='$novoestado'  WHERE email ='$email'";
        
        //$sql3="UPDATE $tipo SET senha= '$novasenha' , telefone='$novotelefone' , curso='$novocurso' , universidade='$novauniversidade' , cpf='$novocpf'  WHERE email ='$email'  ";
    }
        $resultado= mysqli_query($conn,$sql3);
        
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




?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Traineebook</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #EEEEEE;
            border: 2px solid #404040;
            border-radius:15px;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: none;
        }
        li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            
        }
        
       
        li a:hover {
            background-color: blue;
            color: white;
        }
    </style>

</head>


<body>

    <div  class="barra_cima" style="border-bottom: 1px solid black;">
            <div class= "content">
                <form method="post" action="pesquisar.php" >
                     <input type="text" name="estagio" placeholder="Buscar estágio"  style="border: 1px solid black;
    border-radius:20px; width:30%; height:10%;  min-width:499px; min-height:40px;
     box-sizing: border-box; float:left; margin-left:20%;margin-top:1.5%; padding:0.75%; line-height:0.75%; " >
                </form>
                <div class="usuario" style=" position:absolute; right:20%; margin-top:1%; width: 10%; height:7.5%; background-color:#FFFFFF;border-radius:15px; border-left:2px solid #404040; border-right:2px solid #404040; border-bottom:2px solid #404040;">
                   <center style="font-size:15px;"> <?php
                     echo "<a href='perfil.php?secao=informacoes'>$nome[0]</a><br>$tipo";
                     ?></center>
                </div>
             </div>
        </div>

    <div class = "barra_perfil1" style = "position: absolute;
    left:0%;
     margin-top: 5%;
      width: 100%;
       min-height: 35%;
        background-color: #FFFFFF;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
         
     border: 2px solid #404040;
       " >
        <div class = "foto" style =" position: absolute; left:10%; margin-top:2.5%; width:15%; height:70%; background-color: #D3D3D3;
        border: 2px solid #404040; border-radius 15px;">

        </div>
        <h2 style= "position:absolute; left:26%; top:60%; "> <?php echo "$nome[0]<br><h5 style= 'position:absolute; left:26%; top:75%; '>$tipo</h5>"; ?> </h2>
    </div>

    <div class = "barra_perfil2" style="position: absolute;
    left:10%;
     margin-top: 25%;
      width: 60%;
       min-height: 35%;
       float:left;
       clear:both;
       overflow: hidden;
        background-color: #FFFFFF;
        border-radius: 15px;
        
         
     border: 2px solid #404040; ">

        <ul style="list-style-type: none;
            margin: 0;
            padding: 0;">
            <li><a href="perfil.php?secao=resumo">Resumo</a></li>
            <li><a href="perfil.php?secao=historico">Histórico</a></li>

            <?php if($tipo=="aluno") { ?>
            <li><a href="perfil.php?secao=formacao">Formação Acadêmica</a></li>
            <li><a href="perfil.php?secao=projetos">Projetos Realizados</a></li>
            <?php } ?>
            <li><a href="perfil.php?secao=informacoes">Informações pessoais</a></li>
            
        </ul>
    <?php if($secao=="informacoes" && $tipo=="empresa"){
           echo '<form action="perfil.php?secao=informacoes" " method="post" >
           <div class="form-group row">
             <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
             <div class="col-sm-10">
               <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$email.'">
             </div>
           </div>
           <div class="form-group row">
             <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
             <div class="col-sm-10">
               <input type="text" required class="form-control" name = "senha" id="inputPassword" placeholder="Password" value="'.$senha.'">
             </div>
             
           </div>
           <div class="form-group row">
             <label for="inputPassword" class="col-sm-2 col-form-label">Telefone</label>
             <div class="col-sm-10">
               <input type="text" required class="form-control" name = "telefone" id="inputTelefone" placeholder="Telefone" value="'.$telefone.'">
             </div>
             
           </div>

           <div class="form-group row">
              <label for="inputRua" class="col-sm-2 col-form-label">Rua</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "rua" id="inputRua" placeholder="Rua" value="'.$rua.'">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputNumero" class="col-sm-2 col-form-label">Número</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "numero" id="inputNumero" placeholder="Número" value="'.$numero.'">
              </div>
              
            </div>
            <div class="form-group row">
                <label for="inputCPF" class="col-sm-2 col-form-label">Bairro</label>
                <div class="col-sm-10">
                <input type="text" required class="form-control" name = "bairro" id="inputBairro" placeholder="Bairro" value="'.$bairro.'">
                </div>  
             </div> 
              
            
            <div class="form-group row">
              <label for="inputCidade" class="col-sm-2 col-form-label">Cidade</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "cidade" id="inputCidade" placeholder="Cidade" value="'.$cidade.'">
              </div>
              
            </div>

            <div class="form-group row">
              <label for="inputEstado" class="col-sm-2 col-form-label">Estado</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "estado" id="inputCidade" placeholder="estado" value="'.$estado.'">
              </div>
              
            </div>

           <button type="submit" name="botao" value="informacoes" class="btn btn-primary mb-2">Atualizar informações</button>
         </form>';

        }
        if($secao=="informacoes" && $tipo=="aluno"){
            echo '<form action="perfil.php?secao=informacoes" " method="post" >
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$email.'">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "senha" id="inputPassword" placeholder="Password" value="'.$senha.'">
              </div>
              
            </div>
            <div class="form-group row">
              <label for="inputTelefone" class="col-sm-2 col-form-label">Telefone</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "telefone" id="inputTelefone" placeholder="Telefone" value="'.$telefone.'">
              </div>
              
            </div>
            <div class="form-group row">
              <label for="inputUniversidade" class="col-sm-2 col-form-label">Universidade</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "universidade" id="inputUniversidade" placeholder="Universidade" value="'.$universidade.'">
              </div>
              
            </div>
            <div class="form-group row">
              <label for="inputCurso" class="col-sm-2 col-form-label">Curso</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "curso" id="inputCurso" placeholder="Curso" value="'.$curso.'">
              </div>
              
            </div>
            <div class="form-group row">
              <label for="inputCPF" class="col-sm-2 col-form-label">CPF</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "cpf" id="inputCPF" placeholder="CPF" value="'.$cpf.'">
              </div>
              
            </div>
            <div class="form-group row">
              <label for="inputRua" class="col-sm-2 col-form-label">Rua</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "rua" id="inputRua" placeholder="Rua" value="'.$rua.'">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputNumero" class="col-sm-2 col-form-label">Número</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "numero" id="inputNumero" placeholder="Número" value="'.$numero.'">
              </div>
              
            </div>
            <div class="form-group row">
                <label for="inputCPF" class="col-sm-2 col-form-label">Bairro</label>
                <div class="col-sm-10">
                <input type="text" required class="form-control" name = "bairro" id="inputBairro" placeholder="Bairro" value="'.$bairro.'">
                </div>  
             </div> 
              
            
            <div class="form-group row">
              <label for="inputCidade" class="col-sm-2 col-form-label">Cidade</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "cidade" id="inputCidade" placeholder="Cidade" value="'.$cidade.'">
              </div>
              
            </div>

            <div class="form-group row">
              <label for="inputEstado" class="col-sm-2 col-form-label">Estado</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control" name = "estado" id="inputCidade" placeholder="estado" value="'.$estado.'">
              </div>
              
            </div>
           
              
            
            
            <button type="submit" name="botao" value="informacoes" class="btn btn-primary mb-2">Atualizar informações</button>
            
            </form>';
 
         }
        else if($secao=="resumo"){

            echo '<form  >
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$nome[0].'">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Telefone: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$telefone.'">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$email.'">
                    </div>
                </div>
             </form>';
             if($tipo=="aluno"){

                echo '<form  >
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Universidade: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$universidade.'">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Curso: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$curso.'">
                    </div>
                </div>
             </form>';
             }
            $ruanumero = $rua . "  " .$numero;
            echo '<form>
            <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Rua: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$ruanumero.'">
              
                    </div>
                </div>
            
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Bairro: </label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$bairro.'">
                </div>
            </div>

            <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cidade: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$cidade.'">
                    </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Estado: </label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$estado.'">
                </div>
            </div>
            </form>';

        }

    ?>        


    </div>




</body>


