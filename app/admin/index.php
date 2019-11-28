<html>
<?php  include("../template/php/header.php");?>



  <body style="margin:0px;padding:0px">
 
     <?php  include("../template/php/cabecalhoYazaki.php");?>
     <div class="list-group">
     <?php         
        
        $formularios = ['Instruções Visuais'=>'http://brmtz-dev-001/TVLCD/ajudaVisual',
        'Reconhecimento Facial'=>'http://brmtz-dev-001:1880/ui',
        'Gerenciamento Raspberrys'=>'http://brmtz-dev-001:82',
        'Formulários Automatizados'=>'http://brmtz-dev-001',
        'TV LCD TI'=>'http://brmtz-dev-001/TVLCD/TI',
        'TV LCD RH'=>'http://brmtz-dev-001/TVLCD/RH',
        'Portainer'=>'http://brmtz-dev-001:9002',
        'Firmwares Editor'=>'http://brmtz-dev-001:3002',
        'Formularios Editor'=>'http://brmtz-dev-001:3000',
        'Henkaten Editor'=>'http://brmtz-dev-001:3001',
    ];
        foreach ($formularios as $key => $file){
        echo("<a href=\"$file\" class=\"list-group-item list-group-item-action\">$key</a>");       
        }
    
     ?>    

      </div>
   
   
  </body>
</html>