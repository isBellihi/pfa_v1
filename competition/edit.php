<?php include '../database/connect_mysql.php'; 
      include '../database/tables.php'; 
      $comp = fromTable("competition", $_POST["id"]);
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>SPortINO</title>

<link rel="stylesheet" type="text/css" href="../navigationstyle.css"/>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body dir="rlt" >    
                    <?php include("../navpage.php");?>                          
                    <div class="container">
                        <div class="row">
                            <div class="panel panel-success">
                             <div class="panel-heading"><h3>Créer une compétition</h3></div>
                             <div class="well panel-body">
                            <form enctype="multipart/form-data" method="POST" action="update.php">
                            
                               <div class="row col-md-pull-1 col-md-offset-1">
                                  <div class="col-md-5">
                                      <label for="nom"><h3>Titre:</h3></label>
                                      <input type="text" name="titre" id="nom" class="form-control" placeholder="Le Nom De  competition *" 
                                      value=<?php echo "\"" . $comp[0]["titre"] . "\""; ?> >
                                  </div>
                                  <div class="col-md-5">
                                      <label for="slogan"><h3>Slogan</h3></label>
                                      <input type="text" name="slogon"  id="slogan" placeholder="le slogan de competition" class="form-control"
                                      value=<?php echo "\"" . $comp[0]["slogon"] . "\""; ?>>
                                  </div>
                                    
                                </div>

                                <div class="row col-md-pull-1 col-md-offset-1">
                                    <div class="col-md-5">
                                      <label for="lieu"><h3>Université :</h3></label>
                                      <input type="text" name="lieu" class="form-control" id="lieu" placeholder="lieu de la competition"
                                      value=<?php echo "\"" . $comp[0]["id"] . "\""; ?>>
                                    </div>
                                    <div class="col-md-5">
                                      <label><h3>Etablissement:</h3></label>
                                      <input type="text" name="etablissement" class="form-control"  placeholder="l'etablissement de la competiton">
                                      
                                    </div>
                                </div>    
                                <div class="row col-md-pull-1 col-md-offset-1">
                                    <div class="col-md-5">
                                        <label><h3>Description:</h3></label>
                                        <textarea rows="7" name="description"class="form-control" placeholder="Description de la competition">
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
                                        <option value="football"
                                        <?php if($comp[0]["type"] == "football")
                                        echo "selected"; ?>
                                        >
                                        le football
                                        </option>
                                         <option value="tennis"
                                        <?php if($comp[0]["type"] == "tennis")
                                        echo "selected"; ?>
                                         >le handball</option>
                                         <option value="handball"
                                        <?php if($comp[0]["type"] == "handball")
                                        echo "selected"; ?>
                                         >le basketball</option>
                                         <option value="vollybal"
                                        <?php if($comp[0]["type"] == "vollybal")
                                        echo "selected"; ?>
                                         >la boxe</option>
                                         <option value="basketball"
                                        <?php if($comp[0]["type"] == "basketball")
                                        echo "selected"; ?>
                                         >le tennis</option>
                                    <br>
                                   </select>
                                  </div> 
                                  <div class="col-md-5">
                                    <label for="sports"><h3>Nombre des equipes max:</h3></label>
                                      <input type="number"  name="nbmax" id="slogan" placeholder="nombre des equipes maximum" class="form-control"
                                      value=<?= "\"" . $comp[0]["nbrMaxEqui"] . "\"" ?>>
                                  </div> 
                                </div> 
                                <div class="row col-md-pull-1 col-md-offset-1">
                                  <div class="col-md-5">
                                    <label for="sports"><h3>Frais d'inscription:</h3></label>
                                      <input type="number" name="frais"  id="slogan" placeholder="frais de la competition" class="form-control"
                                      value=<?php echo "\"" . $comp[0]["frais"] . "\""; ?>>
                                    
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
                                    value=<?php echo "\"" . $comp[0]["dateDebut"] . "\""; ?>>
                                  </div>
                                  <div class="col-md-5">
                                     <label for="premierphase"><h3>Date de Fin</h3></label> 
                                    <input type="date" id="myDate" name="datefin" value="2018-05-12" class="form-control"
                                    value=<?php echo "\"" . $comp[0]["dateFin"] . "\""; ?>>
                                  </div>
                    
                                </div> 
                                <div class="row col-md-pull-1 col-md-offset-1">
                                  <div class="col-md-5">
                                     <label for="premierphase"><h3>Date limite d'inscription</h3></label> 
                                    <input type="date" id="myDate" name="datelimite" value="2018-05-12" class="form-control"
                                    value=<?php echo "\"" . $comp[0]["dateLimite"] . "\""; ?>>
                                  </div>
                                  <div class="col-md-2">
                                    <label for="image"><h3>Image :</h3></label>
                                    <input type="file" name="img" id ="img">
                                  </div>
                                  <input type="hidden" name="id" value=<?= "\"" . $_POST["id"] . "\"" ?>">
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
<?php $con->close(); ?>