<?php
	session_start();
	session_destroy();
	
	echo '<script>alert("Thank You For Visiting Our Website")</script>';
	echo '<script>window.location="Home.php"</script>';
?>