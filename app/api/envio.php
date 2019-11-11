<?php

@include 'lib/setParameters.php';
@include 'lib/createTable.php';
@include 'lib/insertOnTable.php';


$currentDate = date('Y-m-d H:i:s', strtotime('now'));


insertOnTable($conn, $_POST['titulo'], $_POST,$currentDate);
//generateRandom($conn, $_POST['titulo'], $_POST,$currentDate);

insertOnResultsTable($conn,  $_POST['titulo'], $_POST,$currentDate);
#header('Location: ' . $_SERVER['HTTP_REFERER']);






?>