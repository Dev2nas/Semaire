<?php
    session_start();
    if(empty($_SESSION['login'])){
	header('Location:../../index.php');
	}
    include "../../connexion_db/conn_db.php";
    $requete="SELECT * FROM societe ";
    $resulta=mysqli_query($cn,$requete);

    $db=new PDO('mysql:host=localhost;dbname=seminaire_db;charset=utf8','root','');
    // AFFICHAGE
    $nomSociete=$db->query('SELECT count(id_societe) nbs FROM societe');
	$tabSociete=$nomSociete->fetch();

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- base:css -->
  <script type="text/javascript" src="../../style/css/jquery.min.js"></script>
  <script type="text/javascript" src="../../style/css/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../style/css/bootstrap.css">
  <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../style/css/font-awesome.min.css">
  <link rel="stylesheet" href="/style/css/css/style.css">
  <link rel="stylesheet" href="../../Header/style.css">
  <link rel="stylesheet" href="../../style/font-awesome/css/font-awesome.min.css">

    <title>Liste des sociétéss</title>
    <style>	body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
      }
		.img{
			background-image: url("../../style/assets/img/img1_flou.jpg");
      height: 100%; 
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
		}
        .block{
            padding: 20px;
            margin: 20px;
        }
        .h3{
            font-size: 30px;
        }
        
        </style>  
</head>
<?php include "../../Header/header_societe.php" ?>
<div class="block">
<body class="img">
<div class="panel panel-primary ">
    <div class="panel-heading blue"><center><h3 class="panel-title h3 ">Liste des sociétés</h3></center></div>
    <div class="panel-body">
    <!-- <section class="col-md-12 table-responsive"> -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="blue">
                        <tr>
                            <td>N°</td> 
                            <td>Société :</td>
                            <td>E-mail :</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=mysqli_fetch_array($resulta)):; ?> 
                            <tr>
                                <th scope="row"><?php echo($row['id_societe']) ?> </td>
                                <th scope="row"><?php echo($row['nom_societe'])?></td>
                                <th scope="row"><?php echo($row['email_societe'])?></td>
                                <td name="btn-modifier"><a href="modif_societe.php?modifier=<?php echo $row['id_societe']?> "class="btn blue">Modifier &nbsp;<i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                <td><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer '));"  href="sup_societe.php?Societe=<?php echo ($row['id_societe'])?>"  class="btn btn-danger">Supprimer &nbsp;<i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php endwhile; ?>    
        
                    </tbody>
                </table>
                <tfoot>   <label>Total sociétés =<?php echo $tabSociete['nbs']; ?></label></tfoot>
            </div>
    <!-- </section> -->
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
</div>
</html>