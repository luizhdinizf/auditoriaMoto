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
        $page .= "<input type=\"text\" name=\"$title-desc\" id=\"$title-desc\" placeholder=\"Comentario\" class=\"form-control input-md\">\n";
        $page.="</label>\n";   
  


     $page .= "</div>\n";
     $page .= "</div>\n";
     $page .= "</br>\n"; 
     $page .= "<hr>\n";  
       
    return($page);
}

function generateCheckMoto($title, $question) {
    $radios=['Ok','Na','Ng'];
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
        $page .= "<input type=\"text\" name=\"$title-desc\" id=\"$title-desc\" placeholder=\"Comentario\" class=\"form-control input-md\">\n";
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
    global $conn;
    $page  ="<body style =\"margin:0px;padding:0px;align:center\" onload=carregar()>\n";
    $page .="<form class=\"form-horizontal\" action=\"../api/envio.php\" method=\"post\" name=\"f1\">";
    $page .= "<fieldset>";
    $page .= "<legend>";
    $page .= $titulo;
    $page .= "</legend>";
    $tituloFormatado = str_replace(' ', '_', $titulo); 
    $page.="<input type=\"hidden\" id=\"$titulo\" name=\"titulo\" value=\"$tituloFormatado\">"; // Incluir formatar titulos
    
    if(checkTableExistence($tituloFormatado.'_fields')) { 
        truncateTable($tituloFormatado.'_fields');   
    }else{       
        createFieldsTable($tituloFormatado.'_fields');   
    }
  
   

    $page.=generateCabecalho();
    
    $num = count($perguntasArray);
    for ($c=0; $c < $num; $c++) {
        $stringVar = "var".$c; 
        $tipoPergunta = $tiposArray[$c];
        if ($tipoPergunta == 'check_moto'){
            $page.=generateCheckMoto($stringVar,$perguntasArray[$c]);
            $perguntaAtual=$perguntasArray[$c];
            insertOnFieldsTable($tituloFormatado.'_fields',$stringVar,$perguntaAtual);
        }elseif ($tipoPergunta == 'check_mpps'){
            $page.=generateCheckMpps($stringVar,$perguntasArray[$c]);
            $perguntaAtual=$perguntasArray[$c];       
            insertOnFieldsTable($tituloFormatado.'_fields',$stringVar,$perguntaAtual);
        }elseif($tipoPergunta == 'subtitulo'){
            $page.=generate_subtitle($perguntasArray[$c]);
        }
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