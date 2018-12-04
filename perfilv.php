<?php

session_start();
include_once "conexao.php";
$usuario=explode(" ",$_SESSION['nome']);
$tipousuario=$_SESSION['tipo'];

$perfil=$_GET['id'];
$tipo=$_GET['tipo'];
$secao=$_GET['secao'];
if($tipo=="aluno")
    $sql="SELECT * from $tipo where id_aluno='$perfil' ";

else
    $sql="SELECT * from $tipo where id_empresa='$perfil' ";

$resultado= mysqli_query($conn,$sql)->fetch_array();

$nome=$resultado["nome"];
$telefone=$resultado["telefone"];
$email=$resultado["email"];
//echo "$nome $telefone $email";
if($tipo=="aluno"){

    $curso=$resultado["curso"];
    $universidade=$resultado["universidade"];
}

$estado=$resultado["estado"];
$cidade= $resultado["cidade"];
$numero=$resultado["numero"];
$bairro=$resultado["bairro"];
$rua=$resultado["rua"];

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
                <form method="post" action="pesquisar.php">
                     <input type="text" name="estagio" placeholder="Buscar estágio"  style="border: 1px solid black;
    border-radius:20px; width:30%; height:10%;  min-width:499px; min-height:40px;
     box-sizing: border-box; float:left; margin-left:20%;margin-top:1.5%; padding:0.75%; line-height:0.75%; " >
                </form>
                <div class="usuario" style=" position:absolute; right:20%; margin-top:1%; width: 10%; height:7.5%; background-color:#FFFFFF;border-radius:15px; border-left:2px solid #404040; border-right:2px solid #404040; border-bottom:2px solid #404040;">
                   <center style="font-size:15px;"> <?php
                     echo "<a href='perfil.php?secao=informacoes'>$nome[0]</a><br>$tipo"; ?></center>
               
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
        <h2 style= "position:absolute; left:26%; top:60%; "> <?php echo "$nome<br><h5 style= 'position:absolute; left:26%; top:75%; '>$tipo</h5>"; ?> </h2>
    </div>

    <div class = "barra_perfil2" style="position: absolute;
    left:10%;
     margin-top: 25%;
      width: 60%;
       min-height: 35%;
        background-color: #FFFFFF;
        border-radius: 15px;
        
         
     border: 2px solid #404040; ">

        <ul style="list-style-type: none;
            margin: 0;
            padding: 0;">
            <li><a href="perfilv.php?secao=resumo&id=<?=$perfil?>&tipo=<?=$tipo?>">Resumo</a></li>
            <li><a href="perfilv.php?secao=historico&id=<?=$perfil?>&tipo=<?=$tipo?>">Histórico</a></li>

            <?php if($tipo=="aluno") { ?>
            <li><a href="perfilv.php?secao=formacao&id=<?=$perfil?>&tipo=<?=$tipo?>">Formação Acadêmica</a></li>
            <li><a href="perfilv.php?secao=projetos&id=<?=$perfil?>&tipo=<?=$tipo?>">Projetos Realizados</a></li>
            <?php } ?>
            
        </ul>
    <?php if($secao=="resumo"){

            echo '<form  >
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome: </label>
                    <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="'.$nome.'">
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


