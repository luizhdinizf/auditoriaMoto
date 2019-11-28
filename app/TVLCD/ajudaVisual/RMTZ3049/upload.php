<?php
header("Location:index.php");
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
$fileName = $_FILES['uploadedFile']['name'];
$fileSize = $_FILES['uploadedFile']['size'];
$fileType = $_FILES['uploadedFile']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
//$newFileName = '0' . '.' . $fileExtension;

//$newFileName =  $fileName;
$newFileName = '0.gif';
$uploadFileDir = './uploaded_files/';
$dest_path = $uploadFileDir . $newFileName;
if(file_exists($dest_path)){ 
	unlink($dest_path);
	
	echo($dest_path);
}
echo($fileName);

 
if(move_uploaded_file($fileTmpPath, $dest_path))
{
  $message ='File is successfully uploaded.';
}
else
{
  $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
}
echo($message);
}



?>
