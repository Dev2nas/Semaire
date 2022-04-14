<?php 
session_start();
if(empty($_SESSION['login'])){
header('Location:../../index.php');
}

if(!isset($_POST['rech'])) $rech=''; 
	else $rech=$_POST['rech'];

$db=new PDO('mysql:host=localhost;dbname=seminaire_db;charset=utf8','root','');
		if(!empty($rech)){
			$ins=$db->prepare("SELECT * FROM participant p,societe s  WHERE p.id_societe=s.id_societe  AND ( nom LIKE '$rech' || nom_societe LIKE '$rech' || prenom LIKE '$rech')");
		}
        else{
				$ins=$db->prepare("SELECT * FROM participant p,societe s  WHERE p.id_societe=s.id_societe");
			}
		$ins->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="Header/style.css">
    <link rel="stylesheet" href="style/font-awesome/css/font-awesome.min.css">
</head>
<style>
    .block{
            padding: 10px;
            margin: 10px;
        }
</style>
<body>
<div class="block">
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">

	<div class="main-bar">
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="logo-header">
                <a href="home.php">Seminaire</a>
            </div>
        <ul>
        <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i>  Accueil  </a></li>
            <li><a href="inscription.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a></li>
            <li  class="active"><a href="admin/participant/liste_participants.php"><i class="fa fa-group" aria-hidden="true"></i> Participants</a></li>
            <li><a href="admin/societe/liste_societe.php"><i class="fa fa-building" aria-hidden="true"></i> Sociétes</a></li>
            <li><a href="deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Déconnecter [<?php echo($_SESSION['login'])?>]</a></li>
        </ul>
        </nav>
    </div>

		<table class="table table-bordered table-striped">
            <div>  <form action="recherche_participant.php" method="POST" role="search"  class="form-inline ">
                    <input class="form-control" name="rech" type="text" placeholder="Recherche">
                  <button type="submit" class="btn btn-primary" >Rechercher&nbsp;<img src="style/assets/icons/rechercher.png" alt="" width="25"></button>
              </form></div>
					<thead>
						<tr class="info">
							<th width="7%">Nom &nbsp;<img src="style/assets/icons/customer_52px.png" alt="" width="25px"></th>
							<th width="8%">Prenom &nbsp;<img src="style/assets/icons/customer_52px.png" alt="" width="25px"></th>
							<th width="8%">SEXE &nbsp;<img src="style/assets/icons/female_64px.png" alt="" width="25px"><img src="style/assets/icons/male_52px.png" alt="" width="25px"></th>
							<th width="9%">E-mail &nbsp;<img src="style/assets/icons/mail_96px.png" alt="" width="25px"></th>
							<th width="8%">Societe &nbsp;<img src="style/assets/icons/briefcase_48px.png" alt="" width="25px"></th>
						</tr>
					</thead>
					<tbody>

                <?php while($tab=$ins->fetch()){?>
                    <tr>
                       <td><?php echo($tab['nom'])?></td>
                       <td><?php echo($tab['prenom'])?></td>
                       <td><?php echo($tab['sexe'])?></td>
                       <td><?php echo($tab['email'])?></td>
                       <td><?php echo($tab['nom_societe'])?></td>
                    </tr>  
               <?php }?>
</tbody>
</table>
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