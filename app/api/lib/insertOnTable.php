<?php

function cleanTemporaryEntrys($conn, $tableName) {
	$sqlCleanTemporary = "DELETE FROM `$tableName` WHERE `$tableName`.`temporario` = 1";	
	if ($conn->query($sqlCleanTemporary) === TRUE) {
	echo "Table  $tableName Cleaned <br>";
	} else {
	echo "Error: " . $sqlCleanTemporary . "<br>" . $conn->error;
	}
 }

function insertOnTable($conn, $tableName,$tableFields,$currentDate) {
	$sqlInsertOnTable = "INSERT INTO `$tableName` (`id`, `data` ";
	foreach($tableFields as $key => $value){
		#"`local`, `turno`, `lider`, `situacao`, `descricao`, `nome`) "
		#"VALUES (NULL, '$data', '$local','$turno','$lider','$situacao','$descricao','$nome')";
		$sqlInsertOnTable .= ',`';
		$sqlInsertOnTable .= $key;
		$sqlInsertOnTable .= '`';	
		}	

	
	$sqlInsertOnTable .= ") VALUES (NULL,'$currentDate'";
	foreach($tableFields as $key => $value){
		$sqlInsertOnTable .= ",'";
		$sqlInsertOnTable .= $value;
		$sqlInsertOnTable .= "'";	
		}
	$sqlInsertOnTable .= ")";

	if ($conn->query($sqlInsertOnTable) === TRUE) {
	echo "New record inserted successfully on $tableName <br>";
	} else {
	echo "Error: " . $sqlInsertOnTable . "<br>" . $conn->error;
	}
 }


 function insertOnResultsTable($conn, $tableName,$tableFields,$currentDate) {
	$maxScore = 100;
	$currentScore = 50;
	$tableName .= '_resultado';
	echo($tableName);
	$maxScore = 100;
	$sqlInsertOnResultsTable = "INSERT INTO `$tableName` (`id`, `data`, `maximo`, `pontos`) VALUES (NULL, '$currentDate', $maxScore,$currentScore)";
	if ($conn->query($sqlInsertOnResultsTable) === TRUE) {
    echo "New record inserted successfully on $tableName <br>";
	} else {
    echo "Error: " . $sqlInsertOnResultsTable . "<br>" . $conn->error;
	}
 }


 function generateRandom($conn, $tableName,$tableFields,$currentDate) {
	$numberOfSamples = range(0,10); 
  
	// printing elements of array 
	foreach ($numberOfSamples as $sample) { 		
		insertOnTableRandom($conn, $tableName,$tableFields,$currentDate);
	} 

 }

 function insertOnTableRandom($conn, $tableName,$tableFields,$currentDate) {
	$sqlInsertOnTable = "INSERT INTO `$tableName` (`id`, `data` ";
	foreach($tableFields as $key => $value){
		#"`local`, `turno`, `lider`, `situacao`, `descricao`, `nome`) "
		#"VALUES (NULL, '$data', '$local','$turno','$lider','$situacao','$descricao','$nome')";
		$sqlInsertOnTable .= ',`';
		$sqlInsertOnTable .= $key;
		$sqlInsertOnTable .= '`';	
		}	

	
	$sqlInsertOnTable .= ") VALUES (NULL,'$currentDate'";
	foreach($tableFields as $key => $value){
		$sqlInsertOnTable .= ",'";
		if (rand(1,10)>5){
			$value = 'Ng';
		}else
		{
			$value = 'Ok';
		}

		$sqlInsertOnTable .= $value;
		$sqlInsertOnTable .= "'";	
		}
	$sqlInsertOnTable .= ")";

	if ($conn->query($sqlInsertOnTable) === TRUE) {
	echo "New record inserted successfully on $tableName <br>";
	} else {
	echo "Error: " . $sqlInsertOnTable . "<br>" . $conn->error;
	}
 }

?>