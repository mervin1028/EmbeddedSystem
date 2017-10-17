<!DOCTYPE html>
<?php
	session_start();
	include 'dbHolder.php';

?>

<html lang="en">

<head>
	
	<title>Homepage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Nova+Mono" rel="stylesheet" type="text/css">
	<link  rel="stylesheet" type="text/css" href="data2.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="jquery.min.js"></script>
	<script src="canvasjs.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		var chart;
		function update(){
			$.getJSON("getGraph.php", function (result) {
                chart = new CanvasJS.Chart("chartContainer", {
                    title:{
						text: "Humidity and Temperature",
						fontSize: 30
					},
					animationEnabled: true,
					axisX:{

						gridColor: "Silver",
						tickColor: "silver",
						valueFormatString: "DD/MMM"

					},                        
								toolTip:{
								  shared:true
								},
					theme: "theme2",
					axisY: {
						gridColor: "Silver",
						tickColor: "silver"
					},
					legend:{
						verticalAlign: "center",
						horizontalAlign: "right"
					},
					data: [
                        {
							type: "line",
							showInLegend: true,
							lineThickness: 2,
                            dataPoints: result[0],
							name:"Humidity",
							markerType: "square",
							color: "#F08080"
                        },{
							type: "line",
							showInLegend: true,
							lineThickness: 2,
                            dataPoints: result[1],
							name:"Temperature",
							color: "#20B2AA"
						}
                    ]
                });

                chart.render();
            });
		}
		
        $(document).ready(function () {

            $.getJSON("getGraph.php", function (result) {
                chart = new CanvasJS.Chart("chartContainer", {
                    title:{
						text: "Humidity and Temperature",
						fontSize: 30
					},
					animationEnabled: true,
					axisX:{

						gridColor: "Silver",
						tickColor: "silver",
						valueFormatString: "DD/MMM"

					},                        
								toolTip:{
								  shared:true
								},
					theme: "theme2",
					axisY: {
						gridColor: "Silver",
						tickColor: "silver"
					},
					legend:{
						verticalAlign: "center",
						horizontalAlign: "right"
					},
					data: [
                        {
							type: "line",
							showInLegend: true,
							lineThickness: 2,
                            dataPoints: result[0],
							name:"Humidity",
							markerType: "square",
							color: "#F08080"
                        },{
							type: "line",
							showInLegend: true,
							lineThickness: 2,
                            dataPoints: result[1],
							name:"Temperature",
							color: "#20B2AA"
						}
                    ]
                });

                chart.render();
            });
        });
			
		
		setInterval(function(){
			update();
		},5000);
    </script>
</head>

<body>
	<nav class ="navbar navbar-default navbar-fixed-top">
		<div class="collapse navbar-collapse" id="menuBar">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="Data.php"><span class="glyphicon glyphicon-edit"></span>Tabular Representation</a></li>
			<li><a href="Ranking.php"><span class="glyphicon glyphicon-edit"></span>Ranking</a></li>
			
			<li><a href="Graph.php"><span class="glyphicon glyphicon-check"></span>Line Graph</a></li>
			<li><a href="Latest.php"><span class="glyphicon glyphicon-check"></span>Latest Data</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
			<?php 
				if(isset($_SESSION['username'])){
					echo $_SESSION['username'];
				}
			?>
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span>My Profile</a></li>
				<form id="logout" action="logout.php"></form>
				<li onclick="logout.submit();"><a href="#"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
			</ul>
			</li>
		</ul>
	</div>
	</nav>
	<div >
		<div id="chartContainer" style="width: 1300px; height: 500px;margin-top:90px;margin: 0;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"></div>
	</div>
	
	
	
	
</body>
</html>