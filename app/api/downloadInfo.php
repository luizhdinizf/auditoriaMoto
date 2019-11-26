<?php
ini_set('default_charset', 'utf-8');
header('Content-Encoding: UTF-8');

header("Content-type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=processed_devices.csv");
header("Pragma: no-cache");
header("Expires: 0");
@include 'lib/setParameters.php';



$tableName = $_GET['tableName'];


$array = loadTableWithHeaders($tableName);
$replacement = loadReplacement($tableName);
$headers = replaceArrayDescription($array,$replacement);
$array[0] = $headers;
sendCSVtoDownload($array);





function replaceArrayDescription($destination,$source){
    $headers = array();
    foreach ($destination[0] as $rowOriginal) {       
            foreach ($source as $row) {
                $varName = $row['varName'];
                $varDescription = utf8_encode($row['varDescription']);
                if ($rowOriginal == $varName){
                    $rowOriginal = $varDescription ;               
                }     
            }
            $headers[]=$rowOriginal;
            
        }
return($headers);
    }



function sendCSVtoDownload($input){
    echo "\xEF\xBB\xBF";
    $fp = fopen('php://output', 'w');

    foreach ($input as $row) {
        fputcsv($fp,$row,";");
    }

    fclose($fp);
}


function loadTableWithHeaders($tableName) {
   global $conn;
   $querySelectCheckboxes .= "SELECT * FROM `$tableName`";
 
   $queryResultArray = array();
   $queryResult = mysqli_query($conn,$querySelectCheckboxes);    
   while($resultRow = mysqli_fetch_assoc($queryResult)) {
       $queryResultArray[] = $resultRow;      
      
    }  
    array_unshift($queryResultArray, array_keys($queryResultArray[0]));
    return($queryResultArray); 
}

function loadReplacement($tableName) {
   global $conn;
   $tableName .= "_fields";
   $querySelectCheckboxes .= "SELECT * FROM `$tableName`";
 
   $queryResultArray = array();
   $queryResult = mysqli_query($conn,$querySelectCheckboxes);    
   while($resultRow = mysqli_fetch_assoc($queryResult)) {
       $queryResultArray[] = $resultRow;      
      
    }  
    array_unshift($queryResultArray, array_keys($queryResultArray[0]));
    return($queryResultArray); 
}

?>