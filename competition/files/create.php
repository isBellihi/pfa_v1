<?php include '../../database/connect_mysql.php'; ?>
<?php include '../../database/tables.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
 <title>SPortINO</title>


 <link rel="stylesheet" type="text/css" href="/events_app/navigationstyle.css"/>
 <link rel="stylesheet" href="/events_app/bootstrap/css/bootstrap.min.css">
 <script src="/events_app/bootstrap/js/jquery.min.js"></script>
 <script src="/events_app/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>    
 <?php include("../../navpage.php");?>                          
 <div class="container">
  <div class="row">
   <div class="panel panel-success">
    <div class="panel-heading"><h3>Créer une compétition</h3></div>
    <div class="well panel-body">
     <form enctype="multipart/form-data" method="POST" action="/events_app/competition/scripts/create.php">
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="nom"><h3>Titre:</h3></label>
        <input type="text" name="titre" id="nom" class="form-control" placeholder="Le Nom De  competition *">
       </div>
       <div class="col-md-5">
        <label for="slogan"><h3>Slogan</h3></label>
        <input type="text" name="slogon"  id="slogan" placeholder="le slogan de competition" class="form-control">
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
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="lieu"><h3>Université :</h3></label>
        <select   class="form-control" name="universite" id="universite">
         <option value="-1" selected="selected">Selectionner l'universite</option>
         <?php $uns = fromTable("universite"); 
         foreach ($uns as $un) {?>
          <option value=<?= "\"" . $un['id'] . "\"" ?>>
           <?= $un['nom'] ?>
          </option>
         <?php } ?>
        </select>
       </div>
       <div class="col-md-5">
        <label><h3>Etablissement:</h3></label>
        <select   class="form-control" name="etablissement" id="etablissement">
        </select>
       </div>
      </div>    
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label><h3>Description:</h3></label>
        <textarea rows="7" name="description"class="form-control" placeholder="Description de la competition"></textarea>                  
       </div>
       <div class="col-md-5">
        <label><h3>Regles:</h3></label>
        <textarea  rows="7" name="regles" class="form-control" placeholder="Regles de la competition"></textarea> 
       </div>
      </div>    
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="sports"><h3>Types:</h3></label>
        <select   class="form-control" name="universite" id="universite">
         <option value="-1" selected="selected">Selectionner le type</option>
         <?php $types = fromTable("type"); 
         foreach ($types as $type) {?>
          <option value=<?= "\"" . $type['id'] . "\"" ?>>
           <?= $type['nom'] ?>
          </option>
         <?php } ?>
        </select>
       </div> 
       <div class="col-md-5">
        <label for="sports"><h3>Nombre des equipes</h3></label>
        <input type="number"  name="nbmax" id="slogan" placeholder="nombre des equipes maximum" class="form-control">
       </div> 

      </div> 
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="sports"><h3>Frais d'inscription:</h3></label>
        <input type="text" name="frais"  id="slogan" placeholder="frais de la competition" class="form-control">

       </div>
       <div class="col-md-5">
        <label for="premierphase"><h3>Premiere Phase</h3></label>
        <select   class="form-control" name="phase" id="sports">
         <option value="vide">Selectionner ici</option>
         <option name="Groupe"value="Groupe">Groupe</option>
         <option name="Championnat"value="Championnat">Championnat</option>
         <option name="elimination"value="elimination">Tableau a elimination directe</option>
         <option name="multichance"value="multichance">Tableau multichance</option>
         <br>
        </select>

       </div>
      </div>
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="premierphase"><h3>Date de Debut</h3></label> 
        <input type="date" id="myDate" name="datedebut" value="2018-05-12" class="form-control">
       </div>
       <div class="col-md-5">
        <label for="premierphase"><h3>Date de Fin</h3></label> 
        <input type="date" id="myDate" name="datefin" value="2018-05-12" class="form-control">
       </div>

      </div> 
      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="premierphase"><h3>Date limite d'inscription</h3></label> 
        <input type="date" id="myDate" name="datelimite" value="2018-05-12" class="form-control">
       </div>
       <div class="col-md-2">
        <label for="image"><h3>Image :</h3></label>
        <input type="file" name="img" id ="img">
       </div>
       <div class="col-md-1"></div>  
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