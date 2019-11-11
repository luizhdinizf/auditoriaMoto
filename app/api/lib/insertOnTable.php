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


 function insertOnFieldsTable($tableName,$varName,$varDescription) {
    global $conn;	
    $sqlInsertOnFieldsTable = "INSERT INTO `$tableName` (`varName`, `varDescription`) VALUES ('$varName', '$varDescription');";
    $conn->query($sqlInsertOnFieldsTable);
	/*if (=== TRUE) {
    echo "New record inserted successfully on $tableName <br>";
	} else {
    echo "Error: " . $sqlInsertOnFieldsTable . "<br>" . $conn->error;
	}*/
 }

?>