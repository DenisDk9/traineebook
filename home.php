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




//



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
<div>
 <?php if($tipo == "empresa"){ ?>
    
        <div class="publicar" style= "position: absolute;
    left: 20%;
     margin-top: 7.5%;
      width: 40%;
       min-height: 20%;
        background-color: #FFFFFF;
        border-radius: 15px;
         border-left: 2px solid #404040;
          border-right: 2px solid #404040;
     border-bottom: 2px solid #404040;
     border-top: 2px solid #404040;" >
     <h2>Publicar Estágio</h2>
     <form action="publicaestagio.php" method="post">
  <div class="form-group">
    
    <input type="text" class="form-control" id="area" name="area" aria-describedby="emailHelp" placeholder="Área do estágio" required>
     </div>
  
  
  <div class="form-group">
    
    <textarea class="form-control" id="exampleTextarea" name="descricao" rows="2" placeholder="Descrição do estágio" required></textarea>
  </div>

    <div class="form-group">
    
    <textarea class="form-control" id="exampleTextarea" name="requisitos" rows="2" placeholder="Requisitos do estágio" required></textarea>
  </div>
  <input type="hidden" name="id" value=<?php echo "$id"; ?>>
  <button type="submit" class="btn btn-primary" style="float:right; margin-right:5%; margin-bottom:2%;" >Submit</button>
</form>


 </div> 

    

        <div class="publicacoes" style= "position: absolute;
    left: 20%;
     margin-top: 32%;
    
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
            </tr>
          </thead>
          <tbody>
        <?php 
        $sql1= "Select id_empresa,nome from empresa where estado='$estado'";
        $result3= mysqli_query($conn,$sql1);
        $i=0;
       while( $result4=$result3->fetch_array()){ 

        //while($result3->fetch_array()){ 
        $idd=$result4[0];
        
        $sql2="SELECT area, descricao, requisitos from estagio where id_empresa='$idd'  ";
        $result5= mysqli_query($conn,$sql2);
        while($publicacoes = $result5->fetch_array()){ 
          echo ' 
            <tr>
            <th scope="row" ><a href="perfilv.php?secao=resumo&id='.$idd.'&tipo=empresa">'.$result4[1].'</a></th>
            <td style="max-width: 30px;">'.$publicacoes["area"].'</td>
            <td style="max-width: 30px;">'.$publicacoes["descricao"].'</td>
                <td style="max-width: 30px;">'.$publicacoes["requisitos"].'</td>
             </tr>
          
          ';
          $i++;
        }
    }
        //}
        ?>
    </tbody>
            </table>
            

        </div>
    
        <?php } else {?>
        
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
              <th scope="col">Candidatar </th>
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
        
        $sql2="SELECT * from estagio where id_empresa='$idd'  ";
        $result5= mysqli_query($conn,$sql2);
        while($publicacoes = $result5->fetch_array()){ 
           // var_dump($publicacoes);
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
          
          ';
          $i++;
        }
    }
        //}
        ?>
    </tbody>
            </table>
            

        </div>




        <?php }?>

      <div class="pendentes" style= "position: absolute;
    right: 5%;
     margin-top: 7.5%;
      width: 30%;
       min-height: 70%;
        background-color: #FFFFFF;
        border-radius: 15px;
         border-left: 2px solid #404040;
          border-right: 2px solid #404040;
     border-bottom: 2px solid #404040;
     border-top: 2px solid #404040;" >
        <center><h3>Estágios pendentes</h3></center>

        <table class="table">
          <thead class="thead-light">
            <tr>
              
              <th scope="col">Área</th>
              <th scope="col">Requisitos</th>
                <?php if($tipo=="empresa"){ ?>
                    <th scope="col">Motivação</th>
                    <th scope="col">Candidato </th>
                    <th scope="col">Aceitar </th>
                    <?php } else{  ?>
              
                        <th scope="col">Empresa </th>
                    <?php }?>
              
            </tr>
          </thead>
          <tbody>
            <?php if($tipo=="empresa") {
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
                        echo '<tr>
                        <form action="aceitarestagio.php" method="post">
                        <td style="max-width: 30px;">'.$pendencias["area"].'</td>
                        <td style="max-width: 30px;">'.$pendencias["requisitos"].'</td>
                        <td style="max-width: 30px;">'.$pendencias2["motivacao"].'</td>                     
                        <td style="max-width: 30px;"><a href="perfilv.php?secao=resumo&id='.$idaluno.'&tipo=aluno">'.$nomealuno.'</a></td>
                        <input type="hidden" name="idaluno" value='.$idaluno.'></input>
                        <input type="hidden" name="idestagio" value='.$idd.'></input>
                        <td style="max-width: 30px;"><input type="submit" value="Aceitar"></input></td></form>
                        </tr>';
                        }
                }
                
                
            }
                else{
                    $sql2="SELECT * from dados_estagio where id_aluno='$id' and aprovado='0'";
                    $result4=mysqli_query($conn,$sql2);

                    while($pendencias=$result4->fetch_array()){ 
                        $idd=$pendencias["id_estagio"];
                        
                        $sql="SELECT * from estagio where id_estagio='$idd' ";
                        $result5=mysqli_query($conn,$sql);
                        while($pendencias2=$result5->fetch_array()){

                            $idempresa=$pendencias2["id_empresa"];
                            $sql3="SELECT nome from empresa where id_empresa='$idempresa'";
                            $result6=mysqli_query($conn,$sql3)->fetch_array();
                            $nomeempresa2=$result6["nome"];

                          echo'  <tr>
                        <form action="aceitarestagio.php" method="post">
                        <td style="max-width: 30px;">'.$pendencias2["area"].'</td>
                        <td style="max-width: 30px;">'.$pendencias2["requisitos"].'</td>
                        <td style="max-width: 30px;"><a href="perfilv.php?secao=resumo&id='.$idempresa.'&tipo=empresa">'.$nomeempresa2.'</a></td>
                        </tr>';


                        }

                }
            }
            
            ?>




            

            </tbody>
            </table>

        </div>
        
        
</div>
    



</body>