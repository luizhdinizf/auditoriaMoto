<?php
ini_set('default_charset', 'utf-8');
@include 'parserFunctions.php';


//header("Location:/index.html");
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
$fileName = $_FILES['uploadedFile']['name'];
$fileSize = $_FILES['uploadedFile']['size'];
$fileType = $_FILES['uploadedFile']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$newFileName = 'form' . '.' . $fileExtension;
// directory in which the uploaded file will be moved
$uploadFileDir = './uploaded_files/';
$dest_path = $uploadFileDir . $newFileName;
if(file_exists($dest_path)){ 
	unlink($dest_path);	
}

$row = 1;
$perguntasArray= array();
$tiposArray= array();
if (($handle = fopen($fileTmpPath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
        if ($row == 1){
            $titulo = $data[0];
        }
        elseif ($row == 2){
            $tipo = $data[0];
        }else{            
            array_push($perguntasArray,$data[0]);
            array_push($tiposArray,$data[1]);
        }
        $row += 1;
        
        
    }
    fclose($handle);   
    $titulo = str_replace(' ', '_', $titulo);   
    $page = utf8_encode(geraWebpageString($titulo,$tipo,$perguntasArray,$tiposArray));
    $path='../'.$tipo.'/'.$titulo.'.html';
    echo($path);
    $fp = fopen($path, 'w');
    fwrite($fp, $page);
    fclose($fp);

}

 

if(move_uploaded_file($fileTmpPath, $dest_path))
{
 
 
}
else
{
  $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
}
}



?>
