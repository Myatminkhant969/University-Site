<?php 
	session_start();
	session_destroy();
	echo "<script>window.alert('Log Out Successful!')</script>";
	echo "<script>window.location='index.php'</script>";

?>