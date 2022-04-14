<?php 
session_start();
if(empty($_SESSION['login'])){
header('Location:../../index.php');
}

require_once "../../connexion_db/conn_db.php";
 $idsociete = $_GET["modifier"];
$db ="SELECT * FROM societe WHERE id_societe={$idsociete}";
$societe=mysqli_query($cn,$db)or die("echec de la requette");

if (mysqli_num_rows($societe)>0){

  while($row=mysqli_fetch_assoc($societe)){
      ?>
<!DOCTYPE html>
<html>
<head>
    
     <!-- Required meta tags -->
     <meta charset="UTF-8">
    <title>Formulaire de modification</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script type="text/javascript" src="../../style/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../style/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../style/css/bootstrap.css">
  <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <link rel="stylesheet" href="style/css/css/style.css">
  <link rel="stylesheet" href="../../Header/style.css">
  <link rel="stylesheet" href="../../style/font-awesome/css/font-awesome.min.css">


  <style type="text/css">
     body{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body{
        background-image: url('../../style/assets/img/img1_flou.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
        .F,
        .M{
            font-size: 100px;
        }
        .formBlock{
            padding: 100px;
            margin: 100px ;
        }
        h1{
            font-family: "Segoe Script";
            text-align: center;
            color: white;
            text-transform: capitalize;
            font-weight: 500px;
            font-size: 70px;
            padding: 15px;
            margin: 15px;
            color: yellow;
        }
        label{
                font-family: 'Segoe UI';
                font-size: 20px;

        }
        input{
            width: 50px;
        }
        .rado{
            height: 25px;
        }
        .dark{
            background: linear-gradient(to right, #0080ff 0%, #00ffff 100%);
            padding-block:10px;
        }
        .bt{
            font-size: 20px;
            width: 200px;
            padding: 10px;
            margin: 10px ;
        }
        .blank{
            background-color: #ffffff;
        }
	</style>
    </head>
    <?php include "../../Header/header_societe.php" ?>
<body>
<div class=formBlock>
                <div class="container">
                    <div class="row register-form">
			            <div class="col-md-8 col-md-offset-2" >
                            <div class="panel panel-primary"> 
                            <div class="panel-heading dark"> <h4 >Formulaire de modification &nbsp;&nbsp;<img src="../../style/assets/icons/submit_resume_60px.png" alt="" width="25px"></h4></div>
                                <div class="panel-body">
    <form  action="../parametre_CRUD.php" method="POST">
    <div class="form-group">
                    <div class="col-md-8  offset-2" >
                      <input type="text" hidden name="id_societe" value="<?php echo($row["id_societe"]);?>" class="form-control form-control-lg" >
                    </div>
                </div>

                  <div class="form-group">
                    <div class="col-md-8  offset-2" >
                      <label class="col-md4 control-label">Societe :&nbsp;<img src="../../style/assets/icons/briefcase_48px.png" alt="" width="25px"></label>
                      <input type="text" name="nom_societe" value="<?php echo($row["nom_societe"]);?>" class="form-control form-control-lg" >
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8  offset-2" >
                    <label class="col-md4 control-label">E-mail:&nbsp;<img src="../../style/assets/icons/mail_96px.png" alt="" width="25px"></label>
                    <input type="mail" name="email_societe" value="<?php echo ($row["email_societe"]); ?>" class="form-control form-control-lg" placeholder="Entre un adresse e-mail à jour">
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8  offset-4" >
                      <button class="btn btn-primary bt" name="btn-modifier-societe">Modifier&nbsp;<img src="../../style/assets/icons/edit.png" alt="" width="25px"></button>
                    </div>
              </div>
    </form>
    </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <?php 
 }
}
     ?>
    
</body>
<footer class="page-footer font-small blue pt4-">
            <div class="footer-copyright text-center py-3 ">© 2021 copyright MATASACODE </div>
            <div class="footer-copyright text-center py-9"><a href="mailto:matasacode@gmail.com">matasacode@gmail.com</a></div>
            <div class="footer-copyright text-center py-9"> (+227) 99 32 63 08 </div>
            <div class="footer-copyright text-center py-9">(+227) 92 54 89 74</div>
        </footer>
</html>