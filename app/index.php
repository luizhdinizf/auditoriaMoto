<html>
<?php  include("template/php/header.php");?>



  <body style="margin:0px;padding:0px;overflow:hidden">
 
     <?php  include("template/php/cabecalhoYazaki.php");?>
     <div class="list-group">
     <?php         
        
        $formularios = ['Moto'=>'moto','Segurança'=>'seguranca','manutenção'=>'manutencao','MPPS'=>'mpps'];
        foreach ($formularios as $key => $file){
        echo("<a href=\"./$file\" class=\"list-group-item list-group-item-action\">$key</a>");       
        }
    
     ?>    

      </div>
    <a class="btn btn-primary" href="http://brmtz-dev-001/admin" role="button">Voltar</a>
    <a class="btn btn-primary" href="../upload" role="button">Upload</a>
    <a class="btn btn-primary" href="api/choosePlace.php" role="button">Visualizar Resultados</a>
   
  </body>
</html>