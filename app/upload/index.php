<?php
session_start(); 
?>
<!DOCTYPE html>

<html>
<head>

  <title>PHP File Upload</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="/repo/bootstrap.min.css" />
  <link rel="stylesheet" href="/repo/jquery.min.js" />
  <link rel="stylesheet" href="/repo/bootstrap.min.js" />

</head>
<body style="margin:0px;padding:0px;overflow:hidden">

  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
  <form method="POST" action="uploadParser.php" enctype="multipart/form-data">
    <div>
      <span>Upload a File:</span>
      <input type="file" name="uploadedFile" />
    </div>
	<hr>
    <input class="btn btn-primary" type="submit" name="uploadBtn" value="Upload" />
  </form>
  <hr>
  <a class="btn btn-primary" href="./template.csv" role="button">Baixar Template</a>
 
</body>
</html>