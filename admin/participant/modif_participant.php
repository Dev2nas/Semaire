<?php 
//SESSION 
session_start();
if(empty($_SESSION['login'])){
header('Location:../../index.php');
}
//FIN

require_once "../../connexion_db/conn_db.php";
 $idparticipant = $_GET["modifier"];
$db ="SELECT * FROM societe s ,participant p where p.id_societe=s.id_societe and idp={$idparticipant} ";
$participant=mysqli_query($cn,$db)or die("echec de la requette");

if (mysqli_num_rows($participant)>0){

  while($row=mysqli_fetch_assoc($participant)){
      ?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <title>Formulaire de modification</title>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- base:css -->
     <script type="text/javascript" src="../../style/css/jquery.min.js"></script>
    <script type="text/javascript" src="../../style/css/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../style/js/jquery.js"></script>
    <link rel="stylesheet" href="../..//style/css/bootstrap.css">
    <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Header/style.css">
    <link rel="stylesheet" href="../../style/font-awesome/css/font-awesome.min.css">
</head>
<?php include "../../Header/header_participant.php" ?>

<style type="text/css">
    body{
        background-color: #1976D2;

    }
        .F,
        .M{
            font-size: 20px;
        }
        .formBlock{
            padding-block: 110px;
        }
        h4{
            text-align: center;
            color: white;
            text-transform: uppercase;
            font-weight: 500;
        }
        label{
                font-family: 'Segoe UI';
                font-size: medium;
                text-decoration:  linear-gradient(to right, #000000 59%, #ffffff 100%);

        }
        .rado{
            font-size: 20px;
        }
        .dark{
            background: linear-gradient(to right, #0080ff 0%, #00ffff 100%);
            padding-block:10px;
        }
        .bt{
            padding-block:10px;
            margin-block: 20px;
            width: 150px;
        }
	</style>
<body>

     <div class=formBlock>
			    <div class="col-md-offset-3 col-md-6"> 
			        <div class="shadow p-6 mb-5 bg-white rounded" >
                <div class="panel panel-primary">
                <div class="dark"> <h4 >Formulaire de modification</h4></div>
                   <div class="panel-body">
                    <form class="pt-4"  action="../parametre_CRUD.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="col-md-8  offset-2" >
                      <input type="text" hidden name="idp" value="<?php echo($row["idp"]);?>" class="form-control form-control-lg" >
                    </div>
                </div>
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Prénom :&nbsp;<img src="../../style/assets/icons/male_user_96px.png" alt="" width="25px"></label>
                      <div class="col-sm-10"><input type="text" name="prenom" value="<?php echo($row['prenom']);?>" class="form-control form-control-lg" autofocus><br></div>
                  </div>

                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nom :&nbsp;<img src="../../style/assets/icons/male_user_96px.png" alt="" width="25px"></label>
                      <div class="col-sm-10"><input type="text" name="nom" value="<?php echo($row["nom"]);?>" class="form-control form-control-lg" ><br></div>
                  </div>

                  <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Sexe</label>
                          <div class="form-check  form-check-inline">
                              <label class="col-sm-2 col-form-label">F&nbsp;<img src="../../style/assets/icons/female_64px.png" alt="" width="25px"></label>
                              <div class="col-sm-10"><input type="radio" name="sexe" value="F" 
                                <?php if($row["sexe"]=="F"){ 
                                  echo "checked";} ?>>
                              </div>
                          </div>
                          <div class="form-check  form-check-inline">
                              <label class="col-sm-2 col-form-label">M&nbsp;<img src="../../style/assets/icons/male_52px.png" alt="" width="25px"></label>
                              <div class="col-sm-10"><input type="radio" name="sexe" value="M" 
                                <?php if($row["sexe"]=="M"){ 
                                  echo "checked";
                                }?>></div>
                          </div>
                  </div>

                  <div class="form-group row" >
                      <label class="col-sm-2 col-form-label">E-mail:&nbsp;<img src="../../style/assets/icons/mail_96px.png" alt="" width="25px"></label>
                      <div class="col-sm-10"><input type="mail" name="email" value="<?php echo ($row["email"]); ?>" class="form-control form-control-lg" placeholder="Entre un adresse e-mail à jour"></div>
                  </div>

                  <div class="form-group row" >
                    <label class="col-sm-2 col-form-label">Societe &nbsp;<img src="../../style/assets/icons/briefcase_48px.png" alt="" width="25px"></label>
                      <div class="col-sm-10">
                      
                      <?php 
                          $db1 ="SELECT * FROM societe ";
                          $participant1=mysqli_query($cn,$db1)or die("echec de la requette");
                          if (mysqli_num_rows($participant1)>0){
                            echo '<select name="societe" class="form-control form-control-lg" required>';
                          while($row1=mysqli_fetch_assoc($participant1)){
                          if ($row['id_societe']==$row1['id_societe']){
                            $select="selected";
                            }
                            else{
                                  $select="";
                                }
                                  echo "<option {$select} value='{$row1['id_societe']}'>{$row1['nom_societe']}</option>";
                                                                          }
                                echo "</select>";
                                                                      }
                        ?>
                    </div>
                  </div>
                  </div>
                        <div class="input-group row">
                            <div class="col-sm-offset-5"><button  class="btn btn-primary bt"  name="btn-modifier">Modifier &nbsp;<img src="../../style/assets/icons/edit.png" alt="" width="25px"></button></div>
                        </div>
    </form>
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
            <div class="footer-copyright text-center py-3 ">
                © 2021 copyright DEVNAS <br>
				Developper web/Mobile <br>
				devnas.inc@gmail.com <br>
				My Github: Dev2Nas <br>
				OPENSOURCE projet
            </div>
        </footer>
</html>