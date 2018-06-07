<?php
//var_dump($_POST);
include '../../database/connect_mysql.php';
include "auth.php";
include "../../database/tables.php";

$target_dir = "\\..\\..\\images\\profils\\";
$path = $target_dir . $_FILES["photo"]["name"] ;
if(file_exists($_FILES['photo']['tmp_name']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
  move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__ . $path);
}   
$path = "\\events_app\\images\\profils\\" . $_FILES["photo"]["name"];
$path = str_replace("\\", ",", $path, $path); 
$sql = 'INSERT INTO administrateur(nom,prenom,adress,email,password,tele,date_naissance';
$sql .= ',photo,id_etablissement,poste) VALUES(\'';
$sql .= $_POST['nom'] . '\',\'' . $_POST['prenom'] . '\',\'' .  $_POST['adresse'] . '\',\'' .  $_POST['email'] . '\',\'' ;
$sql .= encryptIt($_POST['password']) . '\',\'' . $_POST['tele'] . '\',\'' .  $_POST['dateNaissance'] . '\',\'' .  $path . '\',\'' .  $_POST['etablissement'] . '\',\'';
$sql .=  $_POST['post'] . '\');' ;

if ($conn->query($sql) === FALSE) {
	//echo "Error: " . $sql . "<br>" . $conn->error;
 $conn->close();
 if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$_SESSION['success'] = 'email deja exite';
header("Location: /events_app/Auth/files/register.php");
}else{
  session_start();
  $or = whereAttr("administrateur","email","=",$_POST['email']);
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['id'] = $or[0]['id'];
  $_SESSION['success'] = 'Felicitation votre compte a ete crée';
  $conn->close();
  header("Location: /events_app/?p=competitions");
}
function encryptIt( $q ) {
  $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
  $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
  return( $qEncoded );
}
?>