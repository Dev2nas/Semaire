<?php
$db=new PDO('mysql:host=localhost;dbname=seminaire_db;charset=utf8','root','');

// selection d'enregistrement qui correspond
if(isset($_POST['btn-login'])){
  $login=$_POST['login'];
  $mdp=$_POST['mdp'];

  $reponse = $db->prepare('SELECT login,mdp FROM admin WHERE login=:login and mdp=:mdp');
  $reponse->execute(array(
  'login' => $login,
  'mdp' => $mdp
  ));

$donnees = $reponse->fetch();
if($donnees['login']==$login && $donnees['mdp']==$mdp)
       	{
	        session_start();
	        $_SESSION['login']=$login;
				header('Location:home.php');
       	}
         else ($donnees['login']!=$login) && ($donnees['mdp']!=$mdp);
         //echo "<script>alert('Le login ou le mot de passe est incorrect !');</script>";
      }
?>


<style>
    body{
      background-image: url("style/assets/img/login_flou.jpg");
    }
  .formBlock{
            padding:75px;
            margin: 75px;
  }
  .dark{
        background: linear-gradient(to right, #0080ff 0%, #00ffff 100%);
        text-align: center;
        text-transform: uppercase;
  }
  label{
                font-family: 'Segoe UI';
                font-size: large;
                text-decoration:  linear-gradient(to right, #000000 59%, #ffffff 100%);

        }
        .bt{
            padding-block:10px;
            margin-block: 20px;
            width: 250px;
        }
</style>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>َSe connecter</title>
    <!-- <link rel="stylesheet" href="login_style.css"> -->
    
    <script type="text/javascript" src="style/css/jquery.min.js"></script>
  <script type="text/javascript" src="style/css/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/css/bootstrap.css">
  <link rel="stylesheet" href="style/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/css/style.css">
  <link rel="stylesheet" href="Header/style.css">
  </head>
  
  <body>
  <!-- alter de login -->
  <?php 
      if(isset($login)){
      if($donnees['login']!=$login){?>
          <div class="alert alert-danger alert-dismissable">
       <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>
       login ou mot de passe est incorrect;						
     </div>        
    <?php
      }?>
<?php }?> 
<!-- fin alter -->
          <div class=formBlock>
            <div class="container">
                <div class="row register-form">
			            <div class="col-md-8 col-md-offset-2" >
                    <div class="panel panel-primary"> 
                        <div class="panel-heading dark"> <h1>Identifiez-vous? &nbsp;&nbsp;<img src="style/assets/icons/workspace_52px.png" alt="" width="35px"></h1></div>
                            <div class="panel-body">
                              <form class="well form-horizontal blank" action="index.php" method="POST">
                                <fieldset> 

                                  <div class="form-group">
                                    <div class="col-md-8  offset-2" >
                                        <label class="col-md4 control-label" for="login">Nom d'utilisateur&nbsp;<img src="style/assets/icons/customer_52px.png" alt="" width="30px"></label>
                                        <input type="text" name="login" class="form-control form-control-lg" placeholder="Veuillez entrer votre nom d'utilisataire" required autofocus>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-md-8  offset-2" >
                                      <label class="col-md4 control-label" for="mdp">Mot de passe &nbsp;<img src="style/assets/icons/lock_52px.png" alt="" width="30px"></label>
                                      <input type="password" name="mdp" class="form-control form-control-lg" placeholder="Veuillez entrer votre mot de passe">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-md-8  offset-2" >
                                      <a href="admin/admin-panel/admin_inscription.php">Vous n'aviez pas de compte ?&nbsp;<img src="style/assets/icons/signin_48px.png" alt="" width="30px"></a>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-md-8  offset-3" >
                                      <button type="submit" class="btn btn-primary bt" name="btn-login">Se connecter&nbsp;<img src="style/assets/icons/login_52px.png" alt="" width="30px"></button>
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
</html>
