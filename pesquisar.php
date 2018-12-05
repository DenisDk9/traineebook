<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= explode(" ",$_SESSION['nome']);
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
echo($area);



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

    <style>
        textarea
        {
            resize: none;
            overflow: hidden;
        }
    </style>
    <script>
        var textarea = null;
        window.addEventListener("load", function() {
            textarea = window.document.querySelector("textarea");
            textarea.addEventListener("keypress", function() {
                if(textarea.scrollTop != 0){
                    textarea.style.height = textarea.scrollHeight + "px";
                }
            }, false);
        }, false);
    </script>

    <title>Traineebook</title>

</head>


<body>

        <div  class="barra_cima" style="border-bottom: 1px solid black;">
            <div class= "content">
                <form >
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
<div>


<div class="publicacoes" style= "position: absolute;
    left: 20%;
     margin-top: 10%;
    
      width: 40%;
       min-height: 50%;
       height:auto;
        background-color: #FFFFFF;
        border-radius: 15px;
         border-left: 2px solid #404040;
          border-right: 2px solid #404040;
     border-bottom: 2px solid #404040;
     border-top: 2px solid #404040;" >
     <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Empresa</th>
              <th scope="col">Área</th>
              <th scope="col">Descrição</th>
              <th scope="col">Requisitos</th>
    <?php if($tipo=="aluno"){ ?><th scope="col">Candidatar </th><?php } ?>
            </tr>
          </thead>
          <tbody>
        <?php 
        $sql1= "Select id_empresa,nome from empresa where estado='$estado'";
        $result3= mysqli_query($conn,$sql1);
        //var_dump($estado);
        $i=0;
       while( $result4=$result3->fetch_array()){ 

        //while($result3->fetch_array()){ 
        $idd=$result4[0];
        
        $sql2="SELECT * from estagio where id_empresa='$idd' and area='$area'  ";
        $result5= mysqli_query($conn,$sql2);
        while($publicacoes = $result5->fetch_array()){ 
           // var_dump($publicacoes);
           if($tipo=="aluno"){ 
          echo ' 
            <tr>
            <th scope="row" ><a href="perfilv.php?secao=resumo&id='.$idd.'&tipo=empresa">'.$result4[1].'</a></th>
            <td style="max-width: 30px;">'.$publicacoes["area"].'</td>
            <td style="max-width: 30px;">'.$publicacoes["descricao"].'</td>
                <td style="max-width: 30px;">'.$publicacoes["requisitos"].'</td>
                <td style="max-width: 30px;"><form method="post" action="candidatar.php">
                <input type="hidden" name="id_estagio" value='.$publicacoes["id_estagio"].'>
                <input type="submit" name="candidatar" value="Candidatar"></input></form></td>

             </tr>
          
          ';}
            else{
                echo'
                <tr>
                <th scope="row" ><a href="perfilv.php?secao=resumo&id='.$idd.'&tipo=empresa">'.$result4[1].'</a></th>
            <td style="max-width: 30px;">'.$publicacoes["area"].'</td>
                <td style="max-width: 30px;">'.$publicacoes["descricao"].'</td>
                    <td style="max-width: 30px;">'.$publicacoes["requisitos"].'</td>
                    <td style="max-width: 30px;"><form method="post" action="candidatar.php">
                    <input type="hidden" name="id_estagio" value='.$publicacoes["id_estagio"].'>
                    
    
                 </tr>
              
              ';

            }

          $i++;
        }
    }
        //}
        ?>
    </tbody>
            </table>
            

        </div>