<?php
session_start();
if(empty($_SESSION['login'])){
header('Location:../../index.php');
}

if(!isset($_POST['rech'])) $rech=''; 
else $rech=$_POST['rech'];
$db=new PDO('mysql:host=localhost;dbname=seminaire_db;charset=utf8','root','');
if(!empty($rech)){
$ins=$db->prepare("SELECT * FROM societe  WHERE nom_societe LIKE '%$rech%' ");
}else{
$ins=$db->prepare("SELECT * FROM societe");
}
$ins->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="style/js/jquery.js"></script>
	<script type="text/javascript" src="style/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="Header/style.css">
    <link rel="stylesheet" href="style/font-awesome/css/font-awesome.min.css">
</head>
<style>
th{
    font-size: 20px;
}
td{
    font-size: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif    ;
}
</style>

<body>

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
            <li  ><a href="admin/participant/liste_participants.php"><i class="fa fa-group" aria-hidden="true"></i> Participants</a></li>
            <li class="active"><a href="../societe/liste_societe.php"><i class="fa fa-building" aria-hidden="true"></i> Sociétes</a></li>
            <li><a href="deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Déconnecter [<?php echo($_SESSION['login'])?>]</a></li>
        </ul>
        </nav>
    </div>

		<table class="table table-bordered table-striped">
            <div class="row" style="padding: 30px;">
                <div class="col-md-6">
                <form action="recherche_societe.php" method="POST" role="search"  class="form-inline ">
                    <input class="form-control" name="rech" type="text" placeholder="Recherche">
                  <button type="submit" class="btn btn-primary" name="rech-societe" >Rechercher&nbsp;<img src="style/assets/icons/rechercher.png" alt="" width="25"></button>
              </form>
                </div>
            </div>
					<thead>
						<tr class="info">
							<th width="7%">Societe &nbsp;<span><img src="style/assets/icons/briefcase_48px.png" alt="" width="30px"></span></th>
							<th width="8%"> E-mail &nbsp;<span><img src="style/assets/icons/mail_96px.png" alt="" width="30px"></span></th>
						</tr>
					</thead>
					<tbody>

                <?php while($tab=$ins->fetch()){?>
                    <tr>
                       <td><?php echo($tab['nom_societe'])?></td>
                       <td><?php echo($tab['email_societe'])?></td>
                    </tr>  
               <?php }?>
</tbody>
</table>
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