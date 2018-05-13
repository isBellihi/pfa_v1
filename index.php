<?php
	$page ="";
	if(!isset($_GET["p"])){
		header("Location: http://localhost/pfa_test/navigation.php");
	}else{
		$page = $_GET["p"];
	}
	switch ($page) {
		case "competitions":
			header("Location: http://localhost/pfa_test/competition");
			break;
		case "create/competition":
			header("Location: http://localhost/pfa_test/formule.php");
			break;
		default:
			# code...
			break;
	}
?>