<?php
@include 'lib/setParameters.php';
@include 'lib/view/viewer.php';
include($_SERVER['DOCUMENT_ROOT']."/template/php/header.php");
include($_SERVER['DOCUMENT_ROOT']."/template/php/cabecalhoYazaki.php");
error_reporting(E_ERROR | E_PARSE);



$tableName = $_GET['tableName'];
$Id = $_GET['id'];



$dados = loadTableWithoutHeaders($conn, $tableName,$Id);
$scoreArray = evaluateScore($dados);

$NgScore = $scoreArray['NgScore'];
$maxScore = $scoreArray['maxScore'];
?>

<!doctype html>
<html>

<head>
	<title><?php echo($tableName);?></title>
	<script src="/js/Chart.min.js"></script>
	<script src="/js/utils.js"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
</head>

<body align='center'>
	<div id="container" style="width: 75%;">
		<canvas id="canvas"></canvas>
	</div>
	<script>
	    var color = Chart.helpers.color;
		var barChartData = {
			labels: ['<?php echo($tableName);?>'],
			datasets: [
                <?php
                 foreach($scoreArray as $key => $value){	        
                    if($key != 'maxScore'){
                echo("
                {
				label: '$key',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
                data: [ ");
                
                echo($value);           
                
                echo(",
				]
                },"); 
                 }
                }
                ?>            
         ]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: '<?php echo($tableName);?>'
					}
				}
			});

		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			var zero = Math.random() < 0.2 ? true : false;
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return zero ? 0.0 : randomScalingFactor();
				});

			});
			window.myBar.update();
		});

		var colorNames = Object.keys(window.chartColors);	
		barChartData.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myBar.update();
		
    </script>
    <?php
    echo("<td><a href='chooseId.php?tableName=$tableName&id=$Id' class='btn btn-primary'>Voltar</a></td>");
    ?>
</body>

</html>
