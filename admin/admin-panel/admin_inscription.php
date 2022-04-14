<?php 
    include "../../connexion_db/conn_db.php";
    if(isset($_POST['btn-ajouter-admin'])){
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        $mdp1=$_POST['mdp1'];

        if(isset($_POST["mdp"]) == ($_POST["mdp1"])){
            $cn->query("INSERT INTO `admin` (`login`, `mdp`) VALUES ('$$login','$mdp')")or die($cn->error);
            header('Location:../../home.php');
        }else
        header('Location:admin_incription.php');


      }
      ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Bootstrap/css/bootstrap.min.css">
    <title>Inscription</title>

   
    <link rel="stylesheet" href="../../style/css//bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../style/css/bootstrap.min.css">

	<script type="text/javascript" src="../../style/js/jquery.js"></script>
	<script type="text/javascript" src="../../style/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../style/js/glyphicon.js"></script>


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
            padding: 50px;
            margin: 50px ;
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
        .blank{
            background-color: #ffffff;
        }
	</style>
</head>
<body>
    <?php if(empty($_POST['mdp'])|| ($_POST['mdp']) != ($_POST['mdp1'])){?>
        <div class="alert alert-danger alert-dismissable">
       <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>
        mot de passe est incorrect;						
     </div>        
    <?php
      }?>

    <div class=formBlock>
    <div class="container">
                    <div class="row register-form">
			            <div class="col-md-8 col-md-offset-2" >
                            <div class="panel panel-primary"> 
                            <div class="panel-heading dark"> <h4 >Nouveau administration &nbsp;&nbsp;<img src="../../style/assets/icons/submit_resume_60px.png" alt="" width="25px"></h4></div>
                                <div class="panel-body">
                                    <form class="well form-horizontal blank" method="POST"><br>
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="col-md-8  offset-2" >
                                                    <label class="col-md4 control-label" for="login">Nom d'utilisateur<img src="../../style/assets/icons/user_80px.png" width="50px"></label>           
                                                    <input type="text" name="login" class="form-control form-control-lg" placeholder="Entrer un nom d'utliateur" required>
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <div class="col-md-8  offset-2" >
                                                        <label class="col-md4 control-label" for="mdp">Mot de passe<img src="../../style/assets/icons/password_200px.png" width="50px"></label>
                                                        <input type="text" name="mdp" class="form-control form-control-lg" placeholder="Entrer le mot de passe" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                        <div class="col-md-8  offset-2" >
                                                            <label class="col-md4 control-label" for="mdp1">Confirmer notre mot de passe<img src="../../style/assets/icons/password_200px.png" width="50px"></label>
                                                            <input type="text" name="mdp1" class="form-control form-control-lg" placeholder="Confirmer le mot de passe" required>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <div class="col-md-8  offset-5" >
                                                            <button  class="btn btn-light bt"  name="btn-ajouter-admin"><img src="../../style/assets/icons/Submit Resume_96px.png" width="90px"></button>
                                                        </div>
                                                </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
<?php if(isset($error)){
        echo '<font color="red">'.$error."</font>";
    } ?>

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