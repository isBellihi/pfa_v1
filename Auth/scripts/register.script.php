<?php
//var_dump($_POST);
include '../../database/connect_mysql.php';

$target_dir = "\\..\\..\\images\\profils\\";
$path = $target_dir . $_FILES["photo"]["name"] ;
if(file_exists($_FILES['photo']['tmp_name']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
    move_uploaded_file($_FILES["photo"]["tmp_name"], __DIR__ . $path);
}        
$path = "\\events_app" . $path;
$path = str_replace("\\", ",", $path, $path);

$sql = 'INSERT INTO administrateur(nom,prenom,adress,email,password,tele,date_naissance';
$sql .= ',photo,id_etablissement,poste) VALUES(\'';
$sql .= $_POST['nom'] . '\',\'' . $_POST['prenom'] . '\',\'' .  $_POST['adresse'] . '\',\'' .  $_POST['email'] . '\',\'' ;
$sql .= md5($_POST['password']) . '\',\'' . $_POST['tele'] . '\',\'' .  $_POST['dateNaissance'] . '\',\'' .  $path . '\',\'' .  $_POST['etablissement'] . '\',\'';
$sql .=  $_POST['post'] . '\');' ;

if ($conn->query($sql) === FALSE) {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: /events_app/?p=competitions");

?>