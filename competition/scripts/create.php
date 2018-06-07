<?php
//var_dump($_POST);
//exit();
include '../../database/connect_mysql.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$target_dir = "\\..\\..\\images\\uploads\\photos\\";
$path = $target_dir . $_FILES["img"]["name"] ;
if(file_exists($_FILES['img']['tmp_name']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES["img"]["tmp_name"], __DIR__ . $path);
}        
$path = "\\events_app\\images\\uploads\\photos\\" . $_FILES["img"]["name"];
$path = str_replace("\\", ",", $path, $path);

$sql = 'INSERT INTO competition(titre,slogon,details,regles,frais,id_type,phase1';
$sql .= ',nbrMaxEqui,dateDebut,dateFin,dateLimite,img,id_administrateur,id_etablissement) VALUES(\'';
$sql .= $_POST['titre'] . '\',\'' . $_POST['slogon'] . '\',\'' .  $_POST['description'] . '\',\'' .  $_POST['regles'] . '\',\'' ;
$sql .= $_POST['frais'] . '\',\'' . $_POST['type'] . '\',\'' .  $_POST['phase'] . '\',\'' .  $_POST['nbmax'] . '\',\'' .  $_POST['datedebut'] . '\',\'';
$sql .=  $_POST['datefin'] . '\',\'' . $_POST['datelimite'] . '\',\'' . $path . '\',\'' . $_SESSION['id'] . '\',\'' . $_POST['etablissement'] . '\');' ;
if ($conn->query($sql) === FALSE) {
	echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: /events_app/?p=create/competition");
}
$conn->close();
header("Location: /events_app/?p=competitions");

?>