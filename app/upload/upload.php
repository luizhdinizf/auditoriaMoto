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
  echo("
      <body style=\"margin:0px;padding:0px;align:center\">
      <form class=\"form-horizontal\" action=\"../api/envio.php\" method=\"post\" name=\"f1\">
      <fieldset>
      <legend>Body 551</legend>
      <input type=\"hidden\" id=\"Body 551\" name=\"titulo\" value=\"$titulo\" />
      ");


  $row = 0;
  if (($handle = fopen($dest_path, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {   
      
      if ($data[1] == 'titulo'){
        $titulo=$data[0];
      }elseif ($data[1] == 'tipo'){
        $tipo = $data[0];
    }else{
    }
    }
  fclose($handle);
  }
}
else
{
  $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
}

}



?>
