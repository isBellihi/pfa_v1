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
	header("Location: /events_app/formule.php");
	break;
	case "login":
	header("Location: /events_app/auth/files/login.php");
	break;
	case "register":
	header("Location: /events_app/auth/files/register.php");
	break;
	default:
			# code...
	break;
}
?>