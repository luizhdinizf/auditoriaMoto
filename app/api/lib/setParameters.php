<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$conn = new mysqli('mysql:3306', 'root', '123.456', 'yazaki');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>