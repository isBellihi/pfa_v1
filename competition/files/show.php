<?php include "../../database/tables.php";
$resultat = fromTable("competition",$_GET["id"]);
$_type = fromTable("type",$resultat[0]['id_type']);
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$org = whereAttr("administrateur","id","=",$resultat[0]['id_administrateur']);
$eta = whereAttr("etablissement","id","=",$org[0]['id_etablissement']);
?>
<!doctype html>
<html><head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="show.css"/>

</head>
<body>
  <?php

  include("../../navpage.php");?>
  <div class="container " >
    <div class="row " id="id1" >
     <!-- le panneau de l'admin avec ses information-->
     <div class="panel panel-group "  id="id2" data-spy="affix" style="width: 500px !important">
      <h2>Informations sur l'organisateur</h2>
      <div  class="panel-body " id="id3">
        <?php $path = str_replace(",", "\\", $org[0]["photo"], $org[0]["photo"]);?>
        <div ><img  class="text-center" src=<?php echo "\"".$path."\"" ?> id="id4">
        </div>
        <br> <br><br><br><br><br><br><br><br>
        <div class="row">
          <div class="col-md-7"><span id="id5">Nom : </span></div>
          <div class="col-md-5"><b> <?= $org[0]["NOM"]?></b></div>
        </div>
        <div class="row">
          <div class="col-md-7"><span id="id5">Prenom : </span></div>
          <div class="col-md-5"><b> <?= $org[0]["PRENOM"]?></b></div>
        </div>
        <div class="row">
          <div class="col-md-7"><span id="id5"><i class="glyphicon glyphicon-phone"> </i> Telephone : </span></div>
          <div class="col-md-5"><b> <?= $org[0]["TELE"]?></b></div>
        </div>
        <div class="row">
          <div class="col-md-7"><span id="id5"><i class="glyphicon glyphicon-envelope"> </i> Email : </span></div>
          <div class="col-md-5"><b> <?= $org[0]["EMAIL"]?></b></div>
        </div>
        <div class="row">
          <div class="col-md-7"><span id="id5"><i class="glyphicon glyphicon"> </i> Etablissement : </span></div>
          <div class="col-md-5"><b> <?= $eta[0]["nom"]?></b></div>
        </div>
        <div>
          <button id="btnid1" class="btn btn-info">
            <i class="glyphicon glyphicon-send"></i>  <span id="id6" >Contacter</span> 
          </button></div>
        </div>
      </div>
      <!-- le panneau de la date des competition-->
      <div class="panel panel-group "  data-spy="affix" id="id7" style="width: 500px !important">
        <div class="panel-heading " id="reserver" data-toggle="collapse" style="font-weight:bold;background-color:white"> <h2> Dates de competition</div>
          <div  class="panel-body " id="id8">
            <form method="POST" action="">
              <div class="form-group demo">           
               <table class="table">
                <thead>
                  <tr>
                    <td><h4>Date de debut</td>
                      <td><h4>Date de fin </td>
                      </tr>
                    </thead>
                    <tbody>
                      <td><h5><?= $resultat[0]["dateDebut"]?></h5></td>
                      <td><h5><?= $resultat[0]["dateFin"]?></h5></td>
                    </tbody>
                    <thead>
                      <tr>
                        <td><h4>date limite</td>

                        </tr>

                      </thead>
                      <tbody>
                        <td><h5><?= $resultat[0]["dateLimite"]?></h5></td>

                      </tbody>
                    </table>

                    <div>
                      <button id="idbtn2" class="btn btn-info"><i style="font-size: 20px" class="fa fa-cart-plus"></i> 
                        <span id="id9">S'inscrire maintenant
                        </span>
                      </button>
                    </div>
                  </div>
                </form> 
              </div>

            </div>    

            <!-- le panneau des informations -->


            <div >
              <div class="panel panel-group" style="width: 800px !important">
                <div class="panel-heading text-center " id="id10" style="width: 800px !important"><h4 ><?= $resultat[0]["titre"]?></h4></div>
                <div class="panel-body ">

                  <div style="margin-left: 30px ">
                    <div class="row carousel-holder" style="margin-left:-60px ;">
                      <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <?php $path = str_replace(",", "\\", $resultat[0]["img"], $resultat[0]["img"]);?>
                            <img src=<?= "\"" . $path . "\""?> style="padding-left : 13px; width:780px;height:400px;" class="pull-center img-center">
                          </div>
                        </div>
                      </div>

                    </div>
                    <!--      tableau        -->

                    <div class="table table-striped"style="margin-left: -20px;">
                     <h3 style="font-weight: bold ; text-align: center;"> Les informations : </h3><br>
                     <table class="table" style="text-align: center; "> 
                      <thead>
                        <tr class="success">
                          <th >Type</th>
                          <th>Nombre d'equipes max</th>
                        </tr>

                      </thead>

                      <tbody>
                        <tr class="">
                          <td><div class="col-sm-7 col-xs-6 "><strong><?= $_type[0]["nom"]?></strong></div>
                          </td>
                          <td><div class="col-sm-7 col-xs-6 "><strong><?= $resultat[0]["nbrMaxEqui"]?></strong></div></td>

                        </tr>
                      </tbody>  
                      <thead>
                        <tr class="success">
                          <th>Frais d'inscription</th>
                          <th>Etablissement</th>


                        </tr>

                      </thead>

                      <tbody>
                        <tr class="">
                          <td><div class="col-sm-7 col-xs-6 "><strong> <?= $resultat[0]["frais"]?></strong></div>
                          </td>
                          <td><div class="col-sm-7 col-xs-6 "><strong><?= $resultat[0]["id_etablissement"]?></strong></div>
                          </td>     

                        </tr>
                      </tbody> 
                      <thead >
                        <tr class="success">

                          <th  >Format de premier Phase</th>
                          <th  >Lieu de competition</th>
                        </tr>
                      </thead>
                      <tbody>

                        <td><div class="col-sm-7 col-xs-6 "><strong><?= $resultat[0]["phase1"]?></strong></div>
                        </td> 
                        <td><div class="col-sm-7 col-xs-6 "><strong><?= $resultat[0]["id_etablissement"]?></strong></div>
                        </td> 
                      </tbody> 
                      <thead>
                        <tr class="success">
                          <th>Description </th>
                          <th>Regles</th>
                        </tr>
                      </thead>         
                      <tbody>

                        <td height="200"><div class="col-sm-7 col-xs-6 "><strong><?= $resultat[0]["details"]?></strong></div>
                        </td>  
                        <td height="200" ><div class="col-sm-7 col-xs-6 "><strong><?= $resultat[0]["regles"]?> </strong></div>
                        </td>  
                      </tbody>
                    </table>
                  </div>
                </body>
                </html>