<?php

function exibe($obj) {
    echo("<pre>\n");
    print_r($obj);
    echo("</pre>\n");
}

$con = @new mysqli('localhost', 'root', '', 'traineebookdb');

if ($con->connect_error) {
    echo "Erro:" . $con->connect_error;
    exit();
}

?>