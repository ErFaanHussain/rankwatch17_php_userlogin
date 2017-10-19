<?php
session_start();
function loggedIn(){
	if(isset($_SESSION["name"]) && !empty($_SESSION["name"])){
		return true;
	}
	else{
		return false;
	}
}
?>
