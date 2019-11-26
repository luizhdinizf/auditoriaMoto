<?php



function checkTableExistence($tableName) {
    global $conn;
    
    $sqlCheckTableExistence = "SHOW TABLES LIKE '$tableName'";
    $queryResultArray = array();
   
	$queryResult = $conn->query($sqlCheckTableExistence);
	while($resultRow = mysqli_fetch_assoc($queryResult)) {
		$queryResultArray[] = $resultRow;
    }
 
    if (empty($queryResultArray)){
        return FALSE;
    }else{
        return TRUE;
    }
   
    

}
function createDataTable($tableName, $tableFields) {  
        global $conn;	
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
 
 function insertOnAuditorias($conn, $tableName,$tipo){
	$sqlInsere = "INSERT INTO `auditorias` (`id`, `nome`, `tipo`) VALUES (NULL, '$tableName', '$tipo');";
	if ($conn->query($sqlInsere) === TRUE) {
		echo "Sucesso Ao Criar Tabela $tableName <br>";
		} else {
		echo "Error: " . $sqlCreateTable . "<br>" . $conn->error;
    }
}

 function createResultTable($conne, $tableName, $tableFields) {
    global $conn;   
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

function createFieldsTable($tableName) {
    global $conn;   
	
	$sqlCreateFieldsTable ='CREATE TABLE `yazaki`.`';
    $sqlCreateFieldsTable .= $tableName;	
    $sqlCreateFieldsTable .='` ( `varName` TEXT NOT NULL , `varDescription` TEXT NOT NULL ) ENGINE = InnoDB';	
    $conn->query($sqlCreateFieldsTable);
    /*
	if ($conn->query($sqlCreateFieldsTable) === TRUE) {
		echo "Sucesso Ao Criar Tabela $tableName <br>";
		} else {
		echo "Error: " . $sqlCreateFieldsTable . "<br>" . $conn->error;
        }	
        */
}

function truncateTable($tableName) {
    global $conn;   
	
	$sqlTruncateTable = "TRUNCATE `yazaki`.`$tableName`";
    
    $conn->query($sqlTruncateTable);
    /*
	if ($conn->query($sqlTruncateTable) === TRUE) {
		echo "Sucesso Ao Criar Tabela $tableName <br>";
		} else {
		echo "Error: " . $sqlTruncateTable . "<br>" . $conn->error;
        }	
        */
}
 
 

?>