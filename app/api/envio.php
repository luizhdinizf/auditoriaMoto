<?php

@include 'lib/setParameters.php';
@include 'lib/createTable.php';
@include 'lib/insertOnTable.php';


$currentDate = date('Y-m-d H:i:s', strtotime('now'));

if(checkTableExistence($_POST['titulo'])) { 
           
    }else{       
        createDataTable($_POST['titulo'],$_POST);   
    }

insertOnTable($conn, $_POST['titulo'], $_POST,$currentDate);
//insertOnResultsTable($conn,  $_POST['titulo'], $_POST,$currentDate);

#header('Location: ' . $_SERVER['HTTP_REFERER']);






?>