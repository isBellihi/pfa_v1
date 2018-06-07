<?php 
include '../../database/connect_mysql.php';
include '../../database/tables.php';
$users = fromTable("administrateur");
//var_dump($users);
//exit();
//admin@gmail.com
//echo md5($_POST['password']) . "<br>";
function encryptIt( $q ) {
	$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
	$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	return( $qEncoded );
}
foreach ($users as $user) {
	if(encryptIt($_POST['password'])==$user['password'] && $user['EMAIL']==$_POST['email']){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['id'] = $user['id'];
		header("Location: /events_app/?p=competitions");
		exit();
	}
}
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$_SESSION['success'] = 'Email ou mot de passe incorecte';
header("Location: /events_app/?p=login");
?>