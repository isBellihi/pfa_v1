<?php 
include "../../database/tables.php";
include "../../Auth/scripts/auth.php";
if(isset($_POST["etablissement"])){
	$creteres = $_POST;
	$resultat = search("competition", $creteres);
}else{
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	$or = whereAttr("administrateur","email","=",$_SESSION['email']);
	$resultat = whereAttr("competition","id_administrateur","=",$or[0]['id']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/events_app/navigationstyle.css"/>
	<link rel="stylesheet" href="/events_app/bootstrap/css/bootstrap.min.css">
	<script src="/events_app/bootstrap/js/jquery.min.js"></script>
	<script src="/events_app/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include("../../navpage.php");?>   
	<div class="container " style="margin-top: 100px;">
		<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}		if(isset($_SESSION['success'])){ ?>
			<div class="alert alert-success" role="alert">
				<?= $_SESSION['success'] ?>
				<?php unset($_SESSION['success']) ?>
			</div>
		<?php }?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-success well-lg">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6"><h4>Tous les compétitions</h4></div>
							<div class="col-md-3"></div>
							<div class="col-md-3">
								<a class="btn btn-success" href="create.php">
									Ajouter une Competition<span class="glyphicon glyphicon-plus" style="padding-left: 10px"></span>
								</a>
							</div>
						</div>
					</div>
					<div class="panel-body ">
						<table class="table" >
							<thead class="thead-inverse">
								<tr>
									<th>Competition</th>
									<th>Date de debut</th>
									<th>Date de fin</th>
									<th>Date limite d'inscription</th>
									<th>les frais d'inscription</th>
									<th>details</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($resultat as $comp) { ?>
									<tr> 
										<td><?php echo $comp["titre"]; ?></td>
										<td><?php echo $comp["dateDebut"]; ?></td>
										<td><?php echo $comp["dateFin"]; ?></td>
										<td><?php echo $comp["dateLimite"]; ?></td>
										<td><?php echo $comp["frais"] . " MAD" ; ?></td>
										<td><a href=<?php echo "\"/events_app/competition/files/show.php?id=". $comp["id"] . "\""; ?>>Clicker ici pour plus des details</a></td>

										<td>
											<form action="/events_app/competition/files/edit.php" method="post">
												<input type="hidden" name="id" value=<?= "\"" . $comp["id"] . "\"" ?>">
												<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit" ></span></button>
											</form>		
										</td>					
										<td>
											<form action="/events_app/competition/scripts/delete.php" method="post" 
											onSubmit="if(!confirm('Voulez vous supprimer cette competition ?')){return false;}">
											<input type="hidden" name="id" value=<?= "\"" . $comp["id"] . "\"" ?>">
											<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" ></span></button>
										</form>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>                    
	</body>
	</html>