<?php
    //OUVERTURE DE LA SESSION
    session_start();
    if(empty($_SESSION['login'])){
	header('Location:../../index.php');
	}
    //FIN

    
    //CONNECTION
    $server="localhost";
    $user="root";
    $password="";
    $db="seminaire_db";
    $conn=mysqli_connect($server,$user,$password,$db);
    $requete="SELECT * FROM participant p ,societe s WHERE p.id_societe=s.id_societe";
    $resulta=mysqli_query($conn,$requete);
    //FIN

	$mc="";
	$size=3;
	if (isset($_GET['page'])) {
			$page=$_GET['page'];
	}else {
		$page=0;
	}
		$offset=$size*$page;
	if (isset($_GET['motcle'])){
		$mc=$_GET['motcle'];
		$req="SELECT * FROM participant WHERE nom like '%$mc%' LIMIT $size offset $offset";
	}else {
						$req="SELECT * FROM participant LIMIT $size offset $offset";
	}

    $db=new PDO('mysql:host=localhost;dbname=seminaire_db;charset=utf8','root','');
    // AFFICHAGE
    $nomParticipant=$db->query('SELECT count(idp) nbp FROM participant');
	$nomSociete=$db->query('SELECT count(id_societe) nbs FROM societe');
    $M=$db->query("SELECT * FROM `nombremasculin` ");
    $F=$db->query("SELECT * FROM `nombrefeminin` ");

	$tabParticipant=$nomParticipant->fetch();
    $masculin=$M->fetch();
    $feminin=$F->fetch();
	$tabSociete=$nomSociete->fetch();
    //FIN

    $ps=$db->prepare($req);
	$ps->execute();
	if(isset($_GET['motcle']))
	// comptage des nombres des particpant
	$ps2=$db->prepare("SELECT COUNT(*) AS nombreParticipant FROM participant WHERE nom like '%$mc%'");
	else
		$ps2=$db->prepare("SELECT COUNT(*) AS nombreParticipant FROM participant");
        $ps2->execute();
        //fetch(PDO::FETCH_ASSOC) PERMET DE RECUPERER LA LIGNE D'un tableau en format associatif
	$ligne=$ps2->fetch(PDO::FETCH_ASSOC);
	$nbrPart=$ligne['nombreParticipant'];
	if (($nbrPart % $size)==0) $nbPage=floor($nbrPart / $size);
	else {
	$nbPage=floor($nbrPart / $size)+1;
    }
?>

            
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- base:css -->
  <script type="text/javascript" src="../../style/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../style/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../style/js/jquery.js"></script>
  <script type="text/javascript" src="../../style/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../style/css/bootstrap.css">
  <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Header/style.css">
  <link rel="stylesheet" href="../../style/font-awesome/css/font-awesome.min.css">


    <title>Liste des partipants</title>
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
            padding: 10px;
            margin: 10px;
        }
        .green{
            font-size: 15px;
            color:#4caf50;
        }
        .b{
            font-size: 15px;
            color: #03a9f4;
        }
        .red1{
            font-size: 15px;
            color: #D32F2F;
        }
        .h3{
            font-size: 30px;
        }
        </style>
    </head>
    <!-- entete -->
    <?php include "../../Header/header_participant.php" ?>
    <!-- fin -->
    
    
    <body class="img">  
    <div class="block">
            
    <div class="panel panel-primary">
    <div class="panel-heading blue"><CENTER><h3 class="panel-title h3">Liste des participants</h3></CENTER></div>
    <div class="panel-body">
        <!-- <section class="col-md-12 table-responsive"> -->
        <div class="table-responsive">

        <table class="table table-bordered table-striped">
            <!-- ENTETE TABLEAUX -->    
            <thead class="blue">
                <tr>
                    <th scope="col">#</td> 
                    <th scope="col">Nom :</td>
                    <th scope="col">Prénom :</td>
                    <th scope="col">Sexe :</td>
                    <th scope="col">E-mail :</td>
                    <th scope="col">Société</td>
                </tr>
            </thead>
            <!-- FIN -->
            <tbody>
                <?php while($row=mysqli_fetch_array($resulta)):; ?> 
                    <tr>
                        <th scope="row"><?php echo($row['idp']) ?> </td>
                        <th scope="row"><?php echo($row['nom'])?></td>
                        <th scope="row"><?php echo($row['prenom']) ?></td>
                        <th scope="row"><?php echo($row['sexe'])?></td>
                        <th scope="row"><?php echo($row['email'])?></td>
                        <th scope="row"><?php echo($row['nom_societe'])?></td>
                        <td name="btn-modifier"><a href="modif_participant.php?modifier=<?php echo $row['idp']?> "class="btn blue">Modifier <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                 <td><a onclick="return(confirm('Etes-vous sûr de vouloir supprimer '));"  href="supprim_participant.php?btn-sup=<?php echo ($row['idp'])?>"class="btn btn-danger">Supprimer <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                 </tr>  
                    <?php endwhile; ?>
            </tbody>
        </table>
        <tfoot>      <div class="col-md-offset-9">
        <label class="green">Nombres participants sexe (M) =<?php echo $masculin['M']; ?></label><br>
        <label class="b">Nombres participants sexe (F) =<?php echo $feminin['f']; ?></label><br>
        <label class="red1">Total participants =<?php echo $tabParticipant['nbp']; ?></label></div></tfoot>
        </div> 
        <!-- </section> -->
        </div></div></div>
        
        
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