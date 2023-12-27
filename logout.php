<?php
	session_start();

	unset($_SESSION['user']);
		echo "<script>window.location='signin.php'</script>";
?>