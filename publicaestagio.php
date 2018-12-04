<?php

    $id=$_POST["id"];
    $area=$_POST["area"];
    $descricao=$_POST["descricao"];
    $requisitos=$_POST["requisitos"];

    include_once "conexao.php";

    $sql="INSERT into estagio (area,descricao,ativo,requisitos,id_empresa) values ('$area','$descricao','1','$requisitos','$id')";
    $result2= mysqli_query($conn,$sql);




?>