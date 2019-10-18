<?php
function filledFormsList($conn,$tableName) {
  $headerFieldsString = "`id`,`data`,`auditor`,`dep_auditor`,`local`,`titulo`";
  $headerFieldsArray = str_replace("`", "", $headerFieldsString);
  $headerFieldsArray = explode(",", $headerFieldsArray);  
 
  $queryAuditorias = "SELECT $headerFieldsString FROM $tableName LIMIT 10";
  $queryResultArray = array();
  $queryResult = mysqli_query($conn,$queryAuditorias);
 
  while($resultRow = mysqli_fetch_assoc($queryResult)) {     
      $queryResultArray[] = $resultRow;   
      }
  $queryResultArray['headers']=$headerFieldsArray;          
 
  return($queryResultArray);
  
}

function buildQueryFields($conn, $tableName){
    // $sqlLoadTable = "SELECT * FROM `$tableName`";
    $excludedFields = "'id','data','auditor','dep_auditor','local','titulo'";
    $sqlExcludingQuery ="SHOW FIELDS FROM `$tableName` WHERE FIELD NOT IN ($excludedFields)";
   // echo($sqlExcludingQuery);
    $queryResultArray = array();
    $queryResult = mysqli_query($conn,$sqlExcludingQuery);
    $querySelectCheckboxes = "SELECT ";
    while($resultRow = mysqli_fetch_assoc($queryResult)) {
        $slicedFieldName = substr($resultRow['Field'],-4);
        if ($slicedFieldName != "desc"){         
        $queryResultArray[] = "`".$resultRow['Field']."`";   
        }    
    }
    $querySelectCheckboxes .= implode(',',$queryResultArray);
    $querySelectCheckboxes .= " FROM $tableName"; 
    return $querySelectCheckboxes;

}

function loadTableWithoutHeaders($conn, $tableName,$selectedId) {  
   $querySelectCheckboxes = buildQueryFields($conn, $tableName);
   $querySelectCheckboxes .= " WHERE `id` LIKE '$selectedId' ";
   $queryResultArray = array();
   $queryResult = mysqli_query($conn,$querySelectCheckboxes);    
   while($resultRow = mysqli_fetch_assoc($queryResult)) {
       $queryResultArray[] = $resultRow;    
   }  
   return $queryResultArray[0];
}

function evaluateScore($tableData) {
   $maxScore = 0;
   $NgScore = 0;
   foreach($tableData as $key => $value){	        
       $maxScore = $maxScore + 1;
       if($value == "Ng"){
           $NgScore = $NgScore + 1;
       }
   }
   $nGPercentil = ($NgScore/$maxScore)*100;
   $scoreArray = array(
       "NgScore" => "$NgScore",
       "maxScore" => "$maxScore",
       "nGPercentil" => "$nGPercentil",
   );

   return($scoreArray);
   
}
?>