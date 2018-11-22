<?php

session_start();
//var_dump($_SESSION['nome']);
$nome= explode(" ",$_SESSION['nome']);
$tipo = $_SESSION['tipo'];


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

</head>


<body>

    <div  class="barra_cima" style="border-bottom: 1px solid black;">
            <div class= "content">
                <form >
                     <input type="text" placeholder="Buscar estágio"  style="border: 1px solid black;
    border-radius:20px; width:30%; height:10%;  min-width:499px; min-height:40px;
     box-sizing: border-box; float:left; margin-left:20%;margin-top:1.5%; padding:0.75%; line-height:0.75%; " >
                </form>
                <div class="usuario" style=" position:absolute; right:20%; margin-top:1%; width: 10%; height:7.5%; background-color:#FFFFFF;border-radius:15px; border-left:2px solid #404040; border-right:2px solid #404040; border-bottom:2px solid #404040;">
                   <center style="font-size:15px;"> <?php
                     echo "$nome[0]<br>$tipo"; ?></center>
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

    </div>

</body>