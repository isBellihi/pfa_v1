<?php
//Include the database configuration file
include '../database/connect_mysql.php';
include '../database/tables.php';

if(isset($_POST["universite_id"])){
    //Fetch all state data
  /*$query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");*/
    //selectionner tous les etablissement de cette universite
  $etablissements = itemsofTable("etablissement","universite" ,$_POST['universite_id']);
  echo '<option value="-1">Selectionner l\'etablissement</option>';
  foreach ($etablissements as $eta) {
    echo '<option value="'.$eta['id'].'">'.$eta['nom'].'</option>';
  }
}
?>