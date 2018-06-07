<?php include '../../database/connect_mysql.php'; 
include '../../database/tables.php'; ?>
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
  <?php 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if(isset($_SESSION['success'])){ ?>
    <div class="alert alert-danger" role="alert">
      <?= $_SESSION['success'] ?>
      <?php unset($_SESSION['success']) ?>
    </div>
  <?php }?>
  <div class="row">
   <div class="panel panel-success">
    <div class="panel-heading"><h3>Créer un compte SportYou</h3></div>
    <div class="well panel-body">
     <form enctype="multipart/form-data" method="POST" action="/events_app/auth/scripts/register.script.php" id="form-register">

      <div class="row col-md-pull-1 col-md-offset-1">
       <div class="col-md-5">
        <label for="nom"><h4>Nom :</h4></label>
        <input type="text" name="nom" id="nom" class="form-control" placeholder="votre nom *" required="required">
      </div>
      <div class="col-md-5">
        <label for="prenom"><h4>Prenom : </h4></label>
        <input type="text" name="prenom"  id="nom" placeholder="votre prenom *" class="form-control" required="required">
      </div>
    </div><br> 

    <div class="row col-md-pull-1 col-md-offset-1">
     <div class="col-md-5">
      <label for="tele"><h4>Numero de Telephone :</h4></label>
      <input type="text" name="tele" id="tele" class="form-control" placeholder="+21267777777 *" required="required">
    </div>
    <div class="col-md-5">
      <label for="adresse"><h4>Adresse : </h4></label>
      <textarea rows="2" name="adresse"  id="adresse" placeholder="votre adresse" class="form-control" required="required"></textarea>
    </div>
  </div><br>

  <div class="row col-md-pull-1 col-md-offset-1">
   <div class="col-md-5">
    <label for="lieu"><h3>Université :</h3></label>
    <select   class="form-control" name="universite" id="universite">
     <option value="-1">Selectionner l'universite</option>
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
  <select class="form-control" name="etablissement" id="etablissement">
  </select>
</div>
</div><br>
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
    $('#etablissement').html('<option value="-1">Selectionner d\'habord l\'universite</option>');
  }
});
});
</script> 
<div class="row col-md-pull-1 col-md-offset-1">
 <div class="col-md-5">
  <label for="email"><h4>Email :</h4></label>
  <input type="email" name="email" id="email" class="form-control" placeholder="email *" required="required">
</div>
<div class="col-md-5">
  <label for="dateNaissance"><h4>date de naissance : </h4></label>
  <input type="date" name="dateNaissance"  id="dateNaissance" placeholder="dateNaissance" class="form-control" required="required">
</div>
</div><br> 

<div class="row col-md-pull-1 col-md-offset-1">
 <div class="col-md-5">
  <label for="role"><h4>Role :</h4></label>
  <select   class="form-control" name="type" id="role">
   <option value="-1" selected="selected">Selectionner le type</option>
   <option value="1">Etudiant</option>
   <option value="2">Organisateur</option>
   <br>
 </select>
 <script type="text/javascript">
   $('#role').change(function() {
    if ($(this).val() === '2') {
     $('#divpost').css("display","block");
     $('#post').attr("required","required");
          //$('#divpost').show();
        }else{
          $('#divpost').hide();
          $('#post').removeAttr("required");
        }
      });
    </script>
  </div> 
  <div class="col-md-5" style="display: none;" id = "divpost">
   <label for="post"><h4>Post :</h4></label>
   <input type="text"  name="post" id="post" placeholder="post professionnel" class="form-control">
 </div> 
</div> <br>
<div class="row col-md-pull-1 col-md-offset-1">
  <div class="col-md-5">
   <label ><h4>Mot de pass :</h4></label>
   <input type="password" name="password"  id="password" placeholder="password" class="form-control" >
 </div>
 <div class="col-md-2"></div>
 <div class="col-md-3">
   <label for="image"><h4>Photo :</h4></label>
   <input type="file" name="photo" id ="photo" required="required">
 </div>
</div><br>
<div class="row col-md-pull-1 col-md-offset-1">
  <div class="col-md-5">
   <label ><h4>Confirmer le Mot de pass :</h4></label>
   <input type="password" name="confirmpassword"  id="password2" placeholder="password confirmation" class="form-control" >
 </div>
 <script type="text/javascript">
   $(document).ready(function(){
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
    // I use element.value instead value here, value parameter was always null
    return arg != element.value; 
  }, "Value must not equal arg.");
    $("#form-register").validate({
     rules: {
      password: {
       required: true,
       minlength: 8

     },

     confirmpassword: {
       equalTo: "#password"
     },

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
<style type="text/css">
.error {
 color: #C77676;
}
</style>
<div class="col-md-2"></div>
<div class="col-md-2" >
  <br><br>
  <input class="btn btn-success pull-right form-control" type="Submit" value="Envoyer" id="submit">
</div>
</div> 
</form>
</div> 
</div>
</div>
</div>
</body>
</html>