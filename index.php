<?php
$page ="";
if(!isset($_GET["p"])){
	header("Location: /events_app/navigation.php");
}else{
	$page = $_GET["p"];
}
switch ($page) {
	case "competitions":
	header("Location: /events_app/competition/files");
	break;
	case "create/competition":
	header("Location: /events_app/competition/files/create.php");
	break;
	case "login":
	header("Location: /events_app/auth/files/login.php");
	break;
	case "register":
	header("Location: /events_app/auth/files/register.php");
	break;
	case "logout":
	session_start();
	session_destroy();
	header("Location: /events_app/");
	break;
	default:
			# code...
	break;
}
?>