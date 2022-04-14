	<?php

session_start();
if (empty($_SESSION['login'])) {
    header('Location:../../index.php');
}

$db             = new PDO('mysql:host=localhost;dbname=seminaire_db;charset=utf8', 'root', '');
$nomParticipant = $db->query('SELECT count(idp) nbp FROM participant');
$nomSociete     = $db->query('SELECT count(id_societe) nbs FROM societe');
$tabParticipant = $nomParticipant->fetch();
$tabSociete     = $nomSociete->fetch();
?>


	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Accueil</title>
		<script type="text/javascript" src="style/css/jquery.min.js"></script>
		<script type="text/javascript" src="style/css/bootstrap.min.js"></script>
		<script type="text/javascript" src="style/css/jquery.js"></script>
		<link rel="stylesheet" href="style/css/bootstrap.css">
		<link rel="stylesheet" href="style/css/bootstrap.min.css">
		<link rel="stylesheet" href="Header/style.css">
		<link rel="stylesheet" href="style/font-awesome/css/font-awesome.min.css">
	</head>
	<style type="text/css">
		body,
		html {
			height: 100%;
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
		}

		.img {
			background-image: url("style/assets/img/img_flou.jpg");
			height: 100%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

		}

		.icon-size {
			font-size: 2em;
			color: #337ab7;

		}

		.aligner {
			text-align: center;
			margin-block: 5;
		}

		.blue {
			background: linear-gradient(to left, #071a52 80%, #071a52 5%);
		}

		.p {
			margin: 5 0px;
			padding: 50px;
		}
	</style>

	<body>
		<!-- <img class="img" src="style/assets/img/img.jpg" alt="" width="150px"> -->
		
		<div class="container-fluid img" >
		<?php include "Header/header_home.php";?>
			<div class="row" style="padding: 30px;">

				<div class="col-md-3">
				<div class="panel panel-primary">
					  <div class="panel-heading blue">
							<h3 class="panel-title">Inscription</h3>
					  </div>
					  <div class="panel-body">
					  <ul class="list-group"><a href="inscription.php">
									<li class="list-group-item">
									<div class="icon-size">
										<img src="style/icons/sign.png" alt="">
									</div>
									</li>
								</a>
								<li class="list-group-item">
									<div class="li">Formualire d'inscription</div>
								</li>
							</ul>
					  </div>
				</div></div>

				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading blue">Participants</div>
						<div class="panel-body aligner">
							<ul class="list-group">
								<a href="admin/participant/liste_participants.php">
									<li class="list-group-item">
										<div class="icon-size">
										<?php echo $tabParticipant['nbp']; ?>

										<img src="style/icons/sale_subscription.png" alt="">
										</div>
									</li>
								</a>
								<li class="list-group-item">
									<div class="li">NOMBRE DE PARTICIPANT</div>
								</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading blue">Sociétés</div>
						<div class="panel-body aligner">
							<ul class="list-group"><a href="admin/societe/liste_societe.php">
									<li class="list-group-item">
									<div class="icon-size">
										<?php echo $tabSociete['nbs']; ?>
									<img src="style/icons/web_mobile.png" alt="" width="80">
									</div>
									</li>
								</a>
								<li class="list-group-item">NOMBRE DE SOCIETE</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading blue">Recherche</div>
						<div class="panel-body aligner">
							<ul class="list-group"><a href="recherche_societe.php">
									<li class="list-group-item">
										<span class="icon-size p" aria-hidden="true"><img src="style/assets/icons/search_80px.png" alt="" width="80"></span>
									</li>
								</a>
								<li class="list-group-item">Recherche societe</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-heading blue">Recherche</div>
						<div class="panel-body aligner">
							<ul class="list-group"><a href="recherche_participant.php">
									<li class="list-group-item">
										<span class="icon-size p" aria-hidden="true"><img src="style/assets/icons/find_user_male_80px.png" alt="" width="80"></span>
									</li>
								</a>
								<li class="list-group-item">Recherche participant</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</body>
	<footer class="page-footer font-small blue pt4-">
            <div class="footer-copyright text-center py-3 ">
                © 2021 copyright DEVNAS <br>
				Developper web/Mobile <br>
				devnas.inc@gmail.com <br>
				My Github: Dev2Nas <br>
				OPENSOURCE projet
            </div>
        </footer>
	</html>