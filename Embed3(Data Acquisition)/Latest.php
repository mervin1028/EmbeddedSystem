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
	<link href="weather-icons-master/css/weather-icons.min.css" rel="stylesheet">
	<link  rel="stylesheet" type="text/css" href="data2.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="jquery.min.js"></script>
	<script src="canvasjs.min.js"></script>
	
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>    
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>  
	<style>
		
	div.preLoader{
		
		background-color:white
	}
	div.container-fluid{
		
		background-color: white
		
	}
		div.card1{
		
			background-color: #1594d8;
		}
		div.card2{
		
		background-color: #ff5c3f;
		}
		div.card3{
		
		background-color: #9da08e
		}
		.card1 h3{
		
		color: black
		}
			.card2 h3{
		
		color: black
		}
			.card3 h3{
		
		color: black
		}
			.card4 h3{
		
		color: black
		}
			.card5 h3{
		
		color: black
		}
			.card6 h3{
		
		color: black
		}
	</style>
	
</head>

<body onload="startTime()">
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
	
	<div class="container-fluid" style="margin-top:300px;	">
    
    <div class="row">
        <div class="col-sm-8 col-xs-8 col-md-4">
            <div class="card1" style="box-shadow: 5px 5px 5px 5px rgba(3, 120, 183, 1), 5px 5px 5px 5px rgba(3, 120, 183, 1);">
                <div style="text-align: center">
                    <h2 id="lastTemperature"></h2>
                    <h3 class="text-muted">Humidity</h3>
					<script>
					<?php
				$query = "Select Humidity from es3 where Date_Time=(select MAX(Date_Time) from es3)";
				$result = mysqli_query($connect, $query);
				$Humidity = '';
				while($row = mysqli_fetch_array($result))
				{
				$Humidity .= "".$row["Humidity"]." ";
				}
				?>
				
					
					
					</script>
	
					<h3> <?php echo $Humidity?> &nbsp<i class="wi wi-humidity fa-1x"></i></h3>
					
                </div>
				
				
            </div>
            <br>
        </div>
        <div class="col-sm-8 col-xs-8 col-md-4">
            <div class="card2" style="box-shadow: 5px 5px 5px 5px rgba(229, 49, 4, 1), 5px 5px 5px 5px rgba(229, 49, 4, 1);">
                <div style="text-align: center">
                    <h2 id="lastPressure"></h2>
                    <h3 class="text-muted">Temperature</h3>
					<script>
					<?php
				$query = "Select Temperature from es3 where Date_Time=(select MAX(Date_Time) from es3)";
				$result = mysqli_query($connect, $query);
				$Temperature = '';
				while($row = mysqli_fetch_array($result))
				{
				$Temperature .= "".$row["Temperature"]." ";
				}
				?>
	
					
					
					</script>
					<h3><?php echo $Temperature?>°C &nbsp<i class="fa fa-thermometer-quarter fa-1x"></i>&nbsp<i class="wi wi-humidity fa-1x"></i><h3>
                </div>
            </div>
            <br>
        </div>
		<div class="col-sm-8 col-xs-8 col-md-4">
            <div class="card3" style="box-shadow: 5px 5px 5px 5px rgba(2, 12, 12, 1), 5px 5px 5px 5px rgba(2, 12, 12, 1);">
                <div style="text-align: center">
                    <h2 id="dateandtime"></h2>
                    <h3 class="text-muted">Current Date and Time <i class="fa fa-clock-o" aria-hidden="true"></i> </h3>
					<h3 id="date_time"> </h3>
					<script>
			function startTime() {
			var today = new Date();
			year = today.getFullYear();
			month = today.getMonth();
			months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
			d = today.getDate();
			day = today.getDay();
			days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('date_time').innerHTML = days[day]+ " "+ months[month] +" "+ d + " " + year + " "+
			h + ":" + m + ":" + s;
			var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
                </div>
            </div>
            <br>
			</div>
		</div>
	</div>

	
	
	
</body>
</html>