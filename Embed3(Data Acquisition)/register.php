<?php


session_start();
include 'dbHolder.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$cpassword = $_POST['cpassword'];




	if($_POST['password'] == $_POST['cpassword']){
		$query = "Insert into accounts (username, pass)
		Values ('$username','$password');";
		$result = mysqli_query($connect,$query);
		echo '<script>alert("Thank You For Registering!")</script>';
		echo '<script>window.location="Home.php"</script>';
	}else{
		echo '<script>alert("Password Didnt Match")</script>'; 
		echo '<script>window.location="Home.php"</script>';		
	}
?>