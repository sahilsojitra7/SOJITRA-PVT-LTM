<?php
include("connection.php");
	session_start();
	unset($_SESSION['user']);
			echo "<script>window.location='adminlogin.php'</script>";

?>