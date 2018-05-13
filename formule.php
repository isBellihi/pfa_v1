<!DOCTYPE HTML>
<html>
<head>
<title>SPortINO</title>


<link rel="stylesheet" type="text/css" href="navigationstyle.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body dir="rlt" >    
                    <?php include("navpage.php");?>                          
                    <div class="container">
                        <div class="row">
                            <div class="panel panel-success">
                             <div class="panel-heading"><h3>Créer une compétition</h3></div>
                             <div class="well panel-body">
                            <form method="POST" action="create.php">
                            
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

                                <div class="row col-md-pull-1 col-md-offset-1">
                                    <div class="col-md-5">
                                      <label for="lieu"><h3>Lieu:</h3></label>
                                      <input type="text" name="lieu" class="form-control" id="lieu" placeholder="lieu de la competition">
                                    </div>
                                    <div class="col-md-5">
                                      <label><h3>Etablissement:</h3></label>
                                      <input type="text" name="etablissement" class="form-control"  placeholder="l'etablissement de la competiton">
                                      
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
                                    <select   class="form-control" name="types" id="sports">
                                
                                    <optgroup "> 
                                        <option value="football">le football</option>
                                         <option value="tennis">le handball</option>
                                         <option value="handball">le basketball</option>
                                         <option value="vollybal">la boxe</option>
                                         <option value="basketball">le tennis</option>
                                    </optgroup><br>
                                   </select>
                                  </div> 
                                  <div class="col-md-5">
                                    <label for="sports"><h3>Nombre des equipes max:</h3></label>
                                      <input type="text"  name="nbmax" id="slogan" placeholder="nombre des equipes maximum" class="form-control">
                                    
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
                                
                                      <optgroup ">
                                        <option name="Groupe"value="Groupe">Groupe</option>
                                         <option name="Championnat"value="Championnat">Championnat</option>
                                         <option name="elimination"value="elimination">Tableau a elimination directe</option>
                                         <option name="multichance"value="multichance">Tableau multichance</option>
                                        
                                      </optgroup><br>
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
                                  <div class="col-md-1"></div>
                                  <div class="col-md-2" >
                                    <br><br><br>
                                     <label for="premierphase"></label>                  
                                     <input class="btn btn-success pull-right form-control" type="Submit">
                                  </div>
                                  <div class="col-md-2"></div>                    
                                </div> 
                                <div class="row" ><br></div>  
                        
                        </form>
                        </div> 
                            </div>
                    </div>
                  </div>

                    

                    
                     
</body>
</html>