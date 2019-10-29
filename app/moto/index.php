<html>
<?php  include($_SERVER['DOCUMENT_ROOT']."/template/php/header.php");?>



  <body style="margin:0px;padding:0px;overflow:hidden">
 
     <?php  include($_SERVER['DOCUMENT_ROOT']."/template/php/cabecalhoYazaki.php");?>
     <div class="list-group">
     <?php         
     $files = glob(dirname(__FILE__) . "/*.html");
     
     foreach (scandir('.') as $file){
      $slicedFieldName = substr($file,-4);
      if ($slicedFieldName == "html"){
        echo("<a href=\"./$file\" class=\"list-group-item list-group-item-action\">$file</a>");
      }
     }
     
     ?>    

      </div>

    <a class="btn btn-primary" href="../" role="button">Voltar</a>
    <a class="btn btn-primary" href="../upload" role="button">Upload</a>
    <a class="btn btn-primary" href="../api/choosePlace.php" role="button">Visualizar Resultados</a>
   
  </body>
</html>