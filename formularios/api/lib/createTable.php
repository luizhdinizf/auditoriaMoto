<?php

function insertOnAuditorias($conn, $tableName){
	$sqlInsere = "INSERT INTO `auditorias` (`id`, `nome`, `tipo`) VALUES (NULL, '$tableName', 'moto');";
	if ($conn->query($sqlInsere) === TRUE) {
		echo "Sucesso Ao Criar Tabela $tableName <br>";
		} else {
		echo "Error: " . $sqlCreateTable . "<br>" . $conn->error;
	}


}
function createTableIfNew($conn, $tableName, $tableFields) {
	$sqlCheckTableExistence = "SHOW TABLES LIKE '$tableName'";
	$queryResultArray = array();
	$queryResult = mysqli_query($conn,$sqlCheckTableExistence);
	while($resultRow = mysqli_fetch_assoc($queryResult)) {
		$queryResultArray[] = $resultRow;
	}
	print_r($sqlCheckTableExistence);
	if (empty($queryResultArray)){
		insertOnAuditorias($conn, $tableName);
		$sqlCreateTable = "CREATE TABLE `yazaki`.`";
		$sqlCreateTable .= $tableName;
		$sqlCreateTable .="` ( `id` INT(250) NOT NULL AUTO_INCREMENT,`data` DATETIME(5) NOT NULL,";
	
		foreach($tableFields as $key => $value){	

			$sqlCreateTable .= '`';
			$sqlCreateTable .= $key;
			$sqlCreateTable .= '`';
			$sqlCreateTable .= " VARCHAR(200) NOT NULL DEFAULT 'Na',";
		}		
		$sqlCreateTable .= 'PRIMARY KEY (`id`) ) ENGINE = MyISAM';	 
		echo($sqlCreateTable);
		if ($conn->query($sqlCreateTable) === TRUE) {
			echo "Sucesso Ao Criar Tabela $tableName <br>";
			} else {
			echo "Error: " . $sqlCreateTable . "<br>" . $conn->error;
			}

		createResultTable($conn, $tableName, $tableFields); 	
		$sqlInsertAuditorias = "INSERT INTO `auditorias` (`id`, `nome`, `tipo`) VALUES (NULL, '$tableName', 'moto');";	
		if ($conn->query($sqlInsertAuditorias ) === TRUE) {
			echo "Sucesso Ao Criar Tabela $tableName <br>";
			} else {
			echo "Error: " . $sqlInsertAuditorias . "<br>" . $conn->error;
			}
	
	} 

 }


 function createResultTable($conn, $tableName, $tableFields) {
	$tableName .= "_resultado";
	$sqlCreateResultTable ='CREATE TABLE `yazaki`.`';
	$sqlCreateResultTable .=$tableName;	
	$sqlCreateResultTable .='` ( `id` INT(250) NOT NULL AUTO_INCREMENT,`data` DATETIME(5) NOT NULL,`maximo` INT(250),`pontos` INT(250), PRIMARY KEY (`id`) ) ENGINE = MyISAM';	
	if ($conn->query($sqlCreateResultTable) === TRUE) {
		echo "Sucesso Ao Criar Tabela $tableName <br>";
		} else {
		echo "Error: " . $sqlCreateResultTable . "<br>" . $conn->error;
		}	
}
 

?>