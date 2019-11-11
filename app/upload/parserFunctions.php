<?php

function generateCabecalho() {
    return file_get_contents($_SERVER['DOCUMENT_ROOT']."/template/php/cabecalhoMoto.php");
}
function generateCheckMpps($title, $question) {
    $radios=['A','B','C','D','E'];
    $page = "<div \"class=form-group\">\n";
    $page .= "<label for=\"$title\" class=\"col-md-4 control-label\">$question</label>\n";  
    $page .= "<div \"class=col-md-4\">\n";
     
    foreach ($radios as $key => $value) {
        $page .= "<label for=\"$title-$key\" class=\"radio-inline\">\n";
        $page .= "<input type=\"radio\" name=\"$title\" id=\"$title-$key\" value=\"$value\" checked =\"checked\">";
        $page .= $value;
        $page.="</input>\n";
        $page.="</label>\n";    
    }
        $page .= "<label for=\"$title-desc\" class=\"radio-inline\">\n";
        $page .= "<input type=\"text\" name=\"$title\" id=\"$title-desc\" placeholder=\"Comentario\" class=\"form-control input-md\">\n";
        $page.="</label>\n";   
  


     $page .= "</div>\n";
     $page .= "</div>\n";
     $page .= "</br>\n"; 
     $page .= "<hr>\n";  
       
    return($page);
}



function generate_subtitle($subtitle){  
    $page  ="</br>";
    $page .="</br>";
    $page .="</br>";
    $page .="</br>";
    $page .="<legend>$subtitle</legend>";
    return($page);
}
function geraEnviar(){  
    return file_get_contents($_SERVER['DOCUMENT_ROOT']."/template/php/enviar.php");
}

function geraBody($titulo,$tipo,$perguntasArray,$tiposArray){
    $page  ="<body style =\"margin:0px;padding:0px;align:center\" onload=carregar()>\n";
    $page .="<form class=\"form-horizontal\" action=\"../api/envio.php\" method=\"post\" name=\"f1\">";
    $page .= "<fieldset>";
    $page .= "<legend>";
    $page .= $titulo;
    $page .= "</legend>";
    $page.="<input type=\"hidden\" id=\"$titulo\" name=\"titulo\" value=\"$titulo\">"; // Incluir formatar titulos
    

    $page.=generateCabecalho();
    
    $num = count($perguntasArray);
    for ($c=0; $c < $num; $c++) {
        $stringVar = "var".$c; 
        $page.=generateCheckMpps($stringVar,$perguntasArray[$c]);
    }      
  
    
    $page.=geraEnviar();
    
    $page .= "</fieldset>";
    $page .="</form>";
    $page .="</body>";
    return($page);
}


function geraHtmlHeader(){    
    return file_get_contents($_SERVER['DOCUMENT_ROOT']."/template/php/header.php");
}


function geraWebpageString($titulo,$tipo,$perguntasArray,$tiposArray){
    $page = geraHtmlHeader();
    $page .= geraBody($titulo,$tipo,$perguntasArray,$tiposArray);
    return $page;
}





?>