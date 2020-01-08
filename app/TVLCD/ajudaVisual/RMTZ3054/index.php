

<?php 




$basenameDir = basename(dirname(__FILE__));
$pageNumber = substr($basenameDir,-4);
$pageNumberInt = intval($pageNumber);
//if($pageNumberInt%2){
$hostname = basename(dirname(__FILE__));
//}else{
//$hostname = "RMTZ".strval($pageNumberInt-1);
//}
 



//$hostname = basename(dirname(__FILE__)); 
include("../template.php");
?>

