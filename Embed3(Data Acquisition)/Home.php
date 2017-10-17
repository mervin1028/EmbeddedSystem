<!DOCTYPE html>
<?php
	session_start();
?>

<html lang="en">

<head>
	
	<title>Homepage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Nova+Mono" rel="stylesheet" type="text/css">
	<link  rel="stylesheet" type="text/css" href="home1.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
<script type="text/javascript">
	$(document).ready(function(){
		$("#onclick").click(function() {
			$("#registerdiv").css("display","none");
			document.getElementById("register").reset();
			$("#logindiv").css("display", "block");
		});
		$("#cancel").click(function() {
			$("#logindiv").css("display","none");
			document.getElementById("login").reset();
		});
		$("#regcancel").click(function() {
			$("#registerdiv").css("display","none");
			document.getElementById("register").reset();
		});
		$("#reg").click(function() {
			$("#logindiv").css("display","none");
			document.getElementById("login").reset();
			$("#registerdiv").css("display", "block");
		});
		// Add smooth scrolling to all links in menu + footer link
		$(".menu a, footer a[href='#myPage']").on('click', function(event) {

			// Prevent default anchor click behavior
			event.preventDefault();

			// Store hash
			var hash = this.hash;

			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 900, function(){
				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			});
		});
  
  // Slide in elements on scroll
		$(window).scroll(function() {
			$(".slideanim").each(function(){
			  var pos = $(this).offset().top;

			  var winTop = $(window).scrollTop();
				if (pos < winTop + 600) {
				  $(this).addClass("slide");
				}
			});
		});

	});
	
</script>


</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="95px">
<nav class ="menu navbar-default navbar-fixed-top">
	<div class="navbar-header ">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menuBar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="menuBar">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#home"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
			<li id = "onclick"><a href="#"><span class="glyphicon glyphicon-log-in"></span>LOGIN</a></li>
			<li id = "reg"><a href="#"><span class="glyphicon glyphicon-edit"></span>REGISTER</a></li>
			<li><a href="#contact"><span class="glyphicon glyphicon-earphone"></span>CONTACT</a></li>
		</ul>
	</div>
</nav>


<div id="logindiv">
		<form class="form" action="logingIn.php" id="login" method="POST">
			<fieldset>
				<legend class="legend text-center" style="color:#fff">Login</legend>
				
				<div class="input">
					<label>Username : </label>
					<br/>
					<input type="text" id="user" name="user" placeholder="Username" required />
					<br/>
				</div>
				
				<div class = "input">
					<br/>
					<label>Password : </label>
					<br/>
					<input type="password" id="pass" name="pass" placeholder="Password" required/>
					<br/>
				</div>
				<br/>
				<input type="submit" id="loginbtn" value="Login"/>
				<input type="button" id="cancel" value="Cancel"/>
				<br/>
				
			</fieldset>
		</form>
</div>



<div id = "registerdiv">
	<form class="form" action="register.php" id="register" method="POST">
		<h2 class="text-center">REGISTER</h2>  
		<div class="row">
			<div class="col-sm-12 form-group">
				<input class="form-control" id="username" name="username" placeholder="Username" type="text" required>
			</div>
		
			<div class="col-sm-12 form-group">
				<input class="form-control" id="password" name="password" placeholder="Password" type="password" required>
			</div>
			
			<div class="col-sm-12 form-group">
				<input class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" type="password" required>
			</div>
		</div>
        <div class="col-sm-12 form-group">
			<input type="submit" id="send" value="Sign Up"/>
			<input type="button" id="regcancel" value="Cancel"/>
        </div>
	</form>
</div>


</body>
</html>