<?php
    session_start();
    if(empty($_SESSION['login'])){
	header('Location:../../index.php');
	}
 ?>
    

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nouveau societe</title>
        <script type="text/javascript" src="../../css/jquery.min.js"></script>
  <script type="text/javascript" src="../../css/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../style/css/bootstrap.css">
  <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../style/css/font-awesome.min.css">
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
                            <div class="panel-heading dark"> <h4 >Nouveau societe &nbsp;&nbsp;<img src="../../style/assets/icons/submit_resume_60px.png" alt="" width="25px"></h4></div>
                                <div class="panel-body">
        <form action=".././parametre_CRUD.php" method="POST">
        <fieldset>
                <div class="form-group">
                    <div class="col-md-8  offset-2" >
                        <label class="col-md4 control-label" for="nom">Societe&nbsp;<img src="../../style/assets/icons/briefcase_48px.png" alt=""width="30px"></label>
                        <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrer le nom de la societé" required>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-md-8  offset-2" >
                    <label class="col-md4 control-label" for="email">E-mail&nbsp;<img src="../../style/assets/icons/mail_96px.png" alt=""width="30px"></label>
                    <input class="form-control form-control-lg" type="text" name="email" placeholder="Entrer le courriel" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8  offset-4" >
                    <button  class="btn btn-primary bt"  name="btn-ajout-societe">Ajouter&nbsp;<img src="../../style/assets/icons/plus_48px.png" alt="" width="30px"></button>
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
