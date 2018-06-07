<?php include '../../database/connect_mysql.php'; 
include '../../database/tables.php'; 
$comp = fromTable("competition", $_POST["id"]);
$etablissement = fromTable("etablissement",$comp[0]['id_etablissement']);
$universite = fromTable("universite",$etablissement[0]['id_universite']);
$type = fromTable("type",$comp[0]['id_type']);
?>
<!DOCTYPE HTML>
<html>
<head>
 <title>SPortINO</title>
 <link rel="stylesheet" type="text/css" href="/events_app/navigationstyle.css"/>
 <link rel="stylesheet" href="/events_app/bootstrap/css/bootstrap.min.css">
 <script src="/events_app/bootstrap/js/jquery.min.js"></script>
 <script src="/events_app/bootstrap/js/bootstrap.min.js"></script>
 <script src="/events_app/bootstrap/js/validate.jquery.js"></script>
</head>

<body dir="rlt" >    
 <?php include("../../navpage.php");?>        
 <div class="container">
  <div class="row">
   <div class="panel panel-success">
    <div class="panel-heading"><h3>Créer une compétition</h3></div>
    <div class="well panel-body">
     <form enctype="multipart/form-data" method="POST" action="/events_app/competition/scripts/update.php" id="form-register">

      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="nom"><h3>Titre:</h3></label>
        <input type="text" name="titre" id="nom" class="form-control" placeholder="Le Nom De  competition *" 
        value=<?php echo "\"" . $comp[0]["titre"] . "\""; ?> required="required">
       </div>
       <div class="col-md-5">
        <label for="slogan"><h3>Slogan</h3></label>
        <input type="text" name="slogon"  id="slogan" placeholder="le slogan de competition" class="form-control"
        value=<?php echo "\"" . $comp[0]["slogon"] . "\""; ?> required="required">
       </div>

      </div>
      <!-- charger les etablissement de l'universite selectionnée-->
      <script type="text/javascript">
       $(document).ready(function(){
        $('#universite').on('change',function(){
         var universiteID = $(this).val();
         if(universiteID > 0){
          $.ajax({
           type:'POST',
           url:'/events_app/Ajax/ajaxEtablissement.php',
           data:'universite_id='+universiteID,
           success:function(html){
            $('#etablissement').html(html);
           }
          }); 
         }else{
          $('#etablissement').html('<option value="-2">Selectionner d\'habord l\'universite</option>');
         }
        });
       });
      </script> 
      <script type="text/javascript">
       $(document).ready(function(){
        $.validator.addMethod("valueNotEquals", function(value, element, arg){
    // I use element.value instead value here, value parameter was always null
    return arg != element.value; 
   }, "Value must not equal arg.");
        $("#form-register").validate({
         rules: {
          universite: {
           required: true
          },

          etablissement: {
           required: true,
           valueNotEquals: '-1'
          }

         },
         messages: {
          password: {
           required: "Inserer le mot de passe",
           minlength: "Le password doit contenir au moins 8 caracteres"
          },
          confirmpassword: {
           equalTo: "Confirmer le mot de passe"
          },
          etablissement: {
           valueNotEquals: "Selectionner l'etablissement",
           required: "Selectionner l'etablissement"
          }
         }

        });
       });
      </script>
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="lieu"><h3>Université :</h3></label>
        <select   class="form-control" name="universite" id="universite">
         <?php $uns = fromTable("universite"); 
         foreach ($uns as $un) {?>
          <option value=<?= "\"" . $un['id'] . "\"" ?>
          <?php if($universite[0]['id'] == $un['id']) 
          echo "selected = \"selected\"";?>>
          <?= $un['nom'] ?>
         </option>
        <?php } ?>
        <script type="text/javascript">

        </script>
       </select>
      </div>
      <div class="col-md-5">
       <label><h3>Etablissement:</h3></label>
       <select class="form-control" name="etablissement" id="etablissement">
       </select>
      </div>
     </div>    
     <div class="row col-md-pull-1 col-md-offset-1">
      <div class="col-md-5">
       <label><h3>Description:</h3></label>
       <textarea rows="7" name="description"class="form-control" placeholder="Description de la competition" required="required">
        <?= $comp[0]["details"] ?>
       </textarea>                  
      </div>
      <div class="col-md-5">
       <label><h3>Regles:</h3></label>
       <textarea  rows="7" name="regles" class="form-control" placeholder="Regles de la competition">
        <?php echo $comp[0]["regles"] ; ?>
       </textarea> 
      </div>
     </div>    

     <div class="row col-md-pull-1 col-md-offset-1">
      <div class="col-md-5">
       <label for="sports"><h3>Types:</h3></label>
       <select   class="form-control" name="type" id="sports">
        <option value="">Selectionner le type</option>
        <?php $_types = fromTable("type"); 
        foreach ($_types as $_type) {?>
         <option value=<?= "\"" . $_type['id'] . "\"" ?>
         <?php if($type[0]['id'] == $_type['id']) 
         echo "selected = \"selected\"";?>>
         <?= $_type['nom'] ?>
        </option>
       <?php } ?>
       <br>
      </select>
     </div> 
     <div class="col-md-5">
      <label for="sports"><h3>Nombre des equipes max:</h3></label>
      <input type="number"  name="nbmax" id="slogan" placeholder="nombre des equipes maximum" class="form-control"
      value=<?= "\"" . $comp[0]["nbrMaxEqui"] . "\"" ?> required="required">
     </div> 
    </div> 
    <div class="row col-md-pull-1 col-md-offset-1">
     <div class="col-md-5">
      <label for="sports"><h3>Frais d'inscription:</h3></label>
      <input type="number" name="frais"  id="slogan" placeholder="frais de la competition" class="form-control"
      value=<?php echo "\"" . $comp[0]["frais"] . "\""; ?> required="required">

     </div>
     <div class="col-md-5">
      <label for="premierphase"><h3>Premiere Phase</h3></label>
      <select   class="form-control" name="phase" id="sports">
       <option value="">Selectionner ici</option>
       <option name="Groupe"value="Groupe"
       <?php if($comp[0]["phase1"] == "Groupe")
       echo "selected"; ?>
       >Groupe</option>
       <option name="Championnat"value="Championnat"
       <?php if($comp[0]["phase1"] == "Championnat")
       echo "selected"; ?>
       >Championnat</option>
       <option name="elimination"value="elimination"
       <?php if($comp[0]["phase1"] == "elimination")
       echo "selected"; ?>
       >Tableau a elimination directe</option>
       <option name="multichance"value="multichance"
       <?php if($comp[0]["phase1"] == "multichance")
       echo "selected"; ?>
       >Tableau multichance</option>
       <br>
      </select>

     </div>
    </div>
    <div class="row col-md-pull-1 col-md-offset-1">
     <div class="col-md-5">
      <label for="premierphase"><h3>Date de Debut</h3></label> 
      <input type="date" id="myDate" name="datedebut" value="2018-05-12" class="form-control"
      value=<?php echo "\"" . $comp[0]["dateDebut"] . "\""; ?> required="required">
     </div>
     <div class="col-md-5">
      <label for="premierphase"><h3>Date de Fin</h3></label> 
      <input type="date" id="myDate" name="datefin" value="2018-05-12" class="form-control"
      value=<?php echo "\"" . $comp[0]["dateFin"] . "\""; ?> required="required">
     </div>

    </div> 
    <div class="row col-md-pull-1 col-md-offset-1">
     <div class="col-md-5">
      <label for="premierphase"><h3>Date limite d'inscription</h3></label> 
      <input type="date" id="myDate" name="datelimite" value="2018-05-12" class="form-control"
      value=<?php echo "\"" . $comp[0]["dateLimite"] . "\""; ?> required="required">
     </div>
     <div class="col-md-2">
      <label for="image"><h3>Image :</h3></label>
      <input type="file" name="img" id ="img">
     </div>
     <input type="hidden" name="id" value=<?= "\"" . $_POST["id"] . "\"" ?>">
     <div class="col-md-1" required="required"></div>  
     <div class="col-md-2" >
      <br><br><br>
      <label for="premierphase"></label>                  
      <input class="btn btn-success pull-right form-control" type="Submit">
     </div>
    </div> 
    <div class="row" ><br></div>  

   </form>
  </div> 
 </div>
</div>
</div>
</body>
</html>
<?php $con->close(); ?>