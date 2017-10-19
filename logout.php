<?php
include("includes/core.inc.php");
if(loggedIn()){
		include("includes/DBConnection.inc.php");
		$con->close();
		session_destroy();
		header("Location:index.php");
		// destroy session, and redirect to login page
	}
	else{
		header("Location:index.php");
	}
?>
