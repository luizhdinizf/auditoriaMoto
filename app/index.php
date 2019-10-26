<html>
<?php  include("template/php/header.php");?>



  <body style="margin:0px;padding:0px;overflow:hidden">
 
     <?php  include("template/php/cabecalhoYazaki.php");?>
     <div class="list-group">
     <?php         
        
        $formularios = ['Moto'=>'moto','Segurança'=>'seguranca','manutenção'=>'manutencao'];
        foreach ($formularios as $key => $file){
        echo("<a href=\"./$file\" class=\"list-group-item list-group-item-action\">$key</a>");       
        }
    
     ?>    

      </div>
    <?php echo("<td><a href='/' class='btn btn-primary'>Voltar</a></td>");?>
    <a class="btn btn-primary" href="../upload" role="button">Upload</a>
    <a class="btn btn-primary" href="/formularios/api/choosePlace.php" role="button">Visualizar Resultados</a>
   
  </body>
</html>