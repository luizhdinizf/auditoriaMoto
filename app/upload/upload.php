<?php
ini_set('default_charset', 'iso-8895-15');
header('Content-type', 'text/html; charset=iso-8859-1');
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



 
if(move_uploaded_file($fileTmpPath, $dest_path))
{
  echo("Sucesso!!");
 
}
else
{
  $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
}
}




?>
