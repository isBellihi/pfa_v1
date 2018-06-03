<?php
include '../../database/connect_mysql.php';
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
        $target_dir = "\\..\\..\\images\\uploads\\photos\\";
        $path = $target_dir . $_FILES["img"]["name"] ;
    if(file_exists($_FILES['img']['tmp_name']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
                move_uploaded_file($_FILES["img"]["tmp_name"], __DIR__ . $path);
            }
        $path = "\\events_app\\images\\uploads\\photos\\" . $_FILES["img"]["name"] ;;                            
		$path = str_replace("\\", ",", $path, $path);
        $sql = 'update competition set titre = \'' . $_POST['titre'] ;
        $sql .= '\' , slogon = \'' . $_POST['slogon']  ;
        $sql .= '\' , details = \'' . $_POST['description']  ;
        $sql .= '\' , regles = \'' . $_POST['regles']  ;
        $sql .= '\' , frais = ' . $_POST['frais']  ;
        $sql .= ' , id_type = \'' . $_POST['type']  ;
        $sql .= '\' , phase1 = \'' . $_POST['phase']  ;
        $sql .= '\' , nbrMaxEqui = ' . $_POST['nbmax']  ;
        $sql .= ' , dateDebut = \'' . $_POST['datedebut']  ;
        $sql .= '\' , dateFin = \'' . $_POST['datefin']  ;
        $sql .= '\' , dateLimite = \'' . $_POST['datelimite']  ;
        $sql .= '\' , img = \'' . $path  ;
        $sql .= '\' where id = ' . $_POST['id']  . ';';
/*      $sql = 'update competition set (titre,slogon,details,regles,frais,type,phase1';
        $sql .= ',nbrMaxEqui,dateDebut,dateFin,dateLimite,img) =(\'';
        $sql .= $_POST['titre'] . '\',\'' . $_POST['slogon'] . '\',\'' .  $_POST['description'] . '\',\'' .  $_POST['regles'] . '\',\'' ;
        $sql .= $_POST['frais'] . '\',\'' . $_POST['type'] . '\',\'' .  $_POST['phase'] . '\',\'' .  $_POST['nbmax'] . '\',\'' .  $_POST['datedebut'] . '\',\'';
        $sql .=  $_POST['datefin'] . '\',\'' . $_POST['datelimite'] . '\',\'' . $path . '\')' ;
        $sql .= 'where id = '*/

if ($conn->query($sql) === FALSE) {
    echo $conn->error;
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: /events_app/?p=competitions");


/*$path = str_replace(",", "\\", $path, $path);
echo "<img src = \"" . $path ."\" width = \"100px\" />";*/

?>
