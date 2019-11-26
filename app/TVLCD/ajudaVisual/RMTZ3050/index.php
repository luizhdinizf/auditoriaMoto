<?php
//$x = file_get_contents("172.19.0.7:5000/api/getColaboradoresDoPosto?posto=0");
$x = "5";

if ($x != "0"){
    header("Location: ./ajuda.html"); 
    exit();
}
else{
    header("Location: ./erro.html");
     exit();
    }
?>