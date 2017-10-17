<?php 
	$connect = mysqli_connect("localhost","root","","es3");

	if(!$connect){
		die("Connection Failed: ".mysqli_connect_error());
	}

?>