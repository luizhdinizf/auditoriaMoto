<?php

function checkTableExistence($conn, $tableName) {
    $sqlCheckTableExistence = "SHOW TABLES LIKE '$tableName'";
	$queryResultArray = array();
	$queryResult = mysqli_query($conn,$sqlCheckTableExistence);
	while($resultRow = mysqli_fetch_assoc($queryResult)) {
		$queryResultArray[] = $resultRow;
    }
    $tableExists =  ~empty($queryResultArray);
    return tableExists;

}
function createDataTable($conn, $tableName, $tableFields) {
		insertOnAuditorias($conn, $tableName);
		$sqlCreateTable = "CREATE TABLE `yazaki`.`";
		$sqlCreateTable .= $tableName;
		$sqlCreateTable .="` ( `id` INT(250) NOT NULL AUTO_INCREMENT,`data` DATETIME(5) NOT NULL,";
	
		foreach($tableFields as $key => $value){	

			$sqlCreateTable .= '`';
			$sqlCreateTable .= $key;
			$sqlCreateTable .= '`';
			$sqlCreateTable .= " TEXT(200) ,";
		}		
		$sqlCreateTable .= 'PRIMARY KEY (`id`) ) ENGINE = MyISAM';	 		
		if ($conn->query($sqlCreateTable) === TRUE) {
			echo "Sucesso Ao Criar Tabela $tableName <br>";
			} else {
			echo "Error: " . "ERRO" . "<br>" . $conn->error;
			}

			
		
	
	}  
 

 function inserIntotAuditorias($conn, $tableName) {
    $sqlInsertAuditorias = "INSERT INTO `auditorias` (`id`, `nome`, `tipo`) VALUES (NULL, '$tableName', 'moto');";	
		if ($conn->query($sqlInsertAuditorias ) === TRUE) {
			echo "Sucesso Ao Criar Tabela $tableName <br>";
			} else {
			echo "Error: " . "ERRO" . "<br>" . $conn->error;
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