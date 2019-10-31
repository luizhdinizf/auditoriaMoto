<?php
@include 'lib/setParameters.php';
@include 'lib/view/viewer.php';

$tableName = $_GET['tableName'];
$filledForms = filledFormsList($conn,$tableName);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulários Yazaki</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    
  <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
  <script src="/js/scripts.js"></script>

  </head>

<table class="table table-borderless table-hover table-striped">
<thead class="thead-dark">
<tr>
<?php 
foreach($filledForms['headers'] as $headerHtml)
{
  echo("<th>$headerHtml</th>");
}
unset($filledForms['headers']);
?>
</tr>
</thead>


<tbody>
<?php 
foreach($filledForms as $formRow)
{
  $id=$formRow['id'];
  echo("<tr>");
  foreach($formRow as $formItem){
    echo("<td><a href='renderChart.php?tableName=$tableName&id=$id'>$formItem</a></td>");
  }
  echo("</tr>");
}
?>
</tbody>
</table>
<?php
echo("<td><a href='choosePlace.php' class='btn btn-primary'>Voltar</a></td>");
?>