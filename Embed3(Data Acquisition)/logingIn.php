<?php


	session_start();
	include 'dbHolder.php';


	$username = $_POST['user'];
	$password = $_POST['pass'];	
	$pass = md5($password);

	$query = "Select * FROM accounts WHERE username='$username' AND pass='$pass'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_assoc($result);
	
	if(!$row){
		echo '<script>alert("Incorrect Username and Password")</script>';
		echo '<script>window.location="Home.php"</script>';		
	}else{
		$_SESSION['username'] = $row['username'];
		header("Location: Latest.php");
	}
?>
