<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= explode(" ",$_SESSION['nome']);
$tipo = $_SESSION['tipo'];
$email= $_SESSION["user"];
$idestagio=$_POST["id_estagio"];
//var_dump($idestagio);

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


        <div class="barra_cadidato" style= "position: absolute;
    left: 30%;
     margin-top: 7.5%;
      width: 40%;
       min-height: 60%;
        background-color: #FFFFFF;
        border-radius: 15px;
         border-left: 2px solid #404040;
          border-right: 2px solid #404040;
     border-bottom: 2px solid #404040;
     border-top: 2px solid #404040;" >
     <center><h2> Candidatar ao estágio </h2></center><br>

        <center><h5>Para aumentar as suas chances de ser aceito no estágio, conte-nos por que deseja candidatar a este estágio</h5> </center>
        
        <form action="candidatar.php" method="post">
            <center><textarea name="motivacao" rows="7" cols="50"></textarea></center>
            <input type="hidden" name="id_estagio" value=<?php echo $idestagio; ?>></input>
            <center><input name="botao" value="candidatar" type="submit" ></input></center>

        </form>



     </div>


</body>

</html>