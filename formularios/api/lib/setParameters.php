<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$conn = new mysqli('127.0.0.1:3306', 'yazaki', 'Yazaki1234', 'yazaki');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>