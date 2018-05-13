<?php
//var_dump($_POST);
//exit();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
CREATE or replace TABLE Competition(
        id_comp    int (11) Auto_increment  NOT NULL ,
        titre      Varchar (250) ,
        slogon     Varchar (250) ,
        details    Varchar (300) ,
        regles     Varchar (300) ,
        frais      Float ,
        type      varchar ,
        phase1     Varchar (50) ,
        dateDebut  Date ,
        dateFin    Date ,
        dateLimite Date ,
        nbrMaxEqui Int ,
        img        Varchar (300) ,
        id_admin   Int ,
        id_etab    Int ,
        PRIMARY KEY (id_comp )
)ENGINE=InnoDB;
 */			
        $target_dir = "\\images\\uploads\\photos\\";
        $path = $target_dir . $_FILES["img"]["name"] ;
				move_uploaded_file($_FILES["img"]["tmp_name"], __DIR__ . $path);
				$path = "\\pfa_test" . $path;
				$path = str_replace("\\", ",", $path, $path);

        $sql = 'INSERT INTO competition(titre,slogon,details,regles,frais,type,phase1';
        $sql .= ',nbrMaxEqui,dateDebut,dateFin,dateLimite,img) VALUES(\'';
        $sql .= $_POST['titre'] . '\',\'' . $_POST['slogon'] . '\',\'' .  $_POST['description'] . '\',\'' .  $_POST['regles'] . '\',\'' ;
        $sql .= $_POST['frais'] . '\',\'' . $_POST['type'] . '\',\'' .  $_POST['phase'] . '\',\'' .  $_POST['nbmax'] . '\',\'' .  $_POST['datedebut'] . '\',\'';
        $sql .=  $_POST['datefin'] . '\',\'' . $_POST['datelimite'] . '\',\'' . $path . '\');' ;

if ($conn->query($sql) === FALSE) {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: http://localhost/pfa_test/?p=competitions");


/*$path = str_replace(",", "\\", $path, $path);
echo "<img src = \"" . $path ."\" width = \"100px\" />";*/

?>
