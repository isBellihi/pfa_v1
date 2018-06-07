<?php include "database/tables.php"; ?>
<?php $comps = fromTable("competition"); ?>
<!doctype html>
<html>
<head>
	<title>SPortINO</title>
	<link rel="stylesheet" type="text/css" href="/events_app/navigationstyle.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function() {
			$('#myCarousel').carousel({
				interval:   1500
			});

			var clickEvent = false;
			$('#myCarousel').on('click', '.nav a', function() {
				clickEvent = true;
				$('.nav li').removeClass('active');
				$(this).parent().addClass('active');		
			}).on('slid.bs.carousel', function(e) {
				if(!clickEvent) {
					var count = $('.nav').children().length -1;
					var current = $('.nav li.active');
					current.removeClass('active').next().addClass('active');
					var id = parseInt(current.data('slide-to'));
					if(count == id) {
						$('.nav li').first().addClass('active');	
					}
				}
				clickEvent = false;
			});
		});
	</script>
	<style type="text/css">
	#myCarousel .nav a small {
		display:block;
	}
	#myCarousel .nav {
		background:#eee;
	}
	#myCarousel .nav a {
		border-radius:0px;
	}
	.centerimage {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 90%;
	}
	.image {
		border-radius: 20px;
		border: 1px solid #ddd;
		padding: 5px;
		width: 150px;
		opacity: 0.8;
		filter: alpha(opacity=50);
	}

	.image:hover {
		box-shadow: 0 0 2px 1px rgba(100, 140, 186, 0.5);
	}
</style>
</head>
<body dir="rlt" >    
	<?php include("navpage.php");?>					
	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<?php  for ($i=0; $i < sizeof($comps); $i++) {?>
					<a href=<?= "\"/events_app/competition/files/show.php?id=" .$comps[$i]['id'] . "\""?>>
						<?php if($i==0) echo "<div class=\"item active\">";
						else echo "<div class=\"item\" class = \"centerimage\">";?>
						<?php $path = str_replace(",", "\\", $comps[$i]["img"], $comps[$i]["img"]);?>
						<img class="image" style="height: 500px; width: 100%;" src=<?=  "\"".$path."\"" ?>>
						<div class="carousel-caption">
							<h3><?=$comps[$i]['titre']?></h3>
							<p style="color: #B41E1E; font-weight: bold; font-size: 20px">
								<?=$comps[$i]['details']?></p>
								<a href=<?= "\"/events_app/competition/files/show.php?id=" .$comps[$i]['id'] . "\""?> style="font-weight: bold; font-size: 20px">Voire les details  <i class="glyphicon glyphicon-eye-open" style="color: blue;"></i></a>
							</div>
						</a>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="photo"><img src="images/table.png"></div>
	<div class="lestitres"> 	
		<div class="titre">
			Une nouvelle façon de gérer votre compétition
		</div>
		<div class="soustitre">
			<h2>Moins de temps perdu. Plus de sport. Tout simplement.</h2>
		</div>
	</div>
	<!--<div class="con3"><button class="bt3">START A COMPETITON</button></div>-->
</body>
</html>