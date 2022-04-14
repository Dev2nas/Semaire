<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
    <script type="text/javascript" src="style/js/jquery.js"></script>
    <script type="text/javascript" src="style/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="style/css/jquery.min.js"></script>
    <script type="text/javascript" src="style/css/bootstrap.min.js"></script>
    <script type="text/javascript" src="style/js/jquery.js"></script>
    <link rel="stylesheet" href="style/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-image: url('style/assets/img/img1_flou.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .F,
        .M {
            font-size: 100px;
        }

        .formBlock {
            padding: 15px;
            margin: 15px;
        }

        h1 {
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

        label {
            font-family: 'Segoe UI';
            font-size: 20px;

        }

        input {
            width: 50px;
        }

        .rado {
            height: 25px;
        }

        .dark {
            background: linear-gradient(to right, #0080ff 0%, #00ffff 100%);
            padding-block: 10px;
        }

        .bt {
            font-size: 20px;
            width: 200px;
        }

        .blank {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <h1>Seminaire</h1>
    <div class=formBlock>
        <div class="container">
            <div class="row register-form">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading dark">
                            <center><h3>Formualire d'inscription</h3></center>
                        </div>
                        <div class="panel-body">
                            <form class="well form-horizontal blank" action="admin/parametre_CRUD.php" method="POST"><br>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="col-md-8  offset-2">
                                        <span><label class="col-md4 control-label" for="prenom">Prénom <i class="fa fa-user" aria-hidden="true"></i></label>
                                            <input name="prenom" type="text" class="form-control form-control-lg" placeholder="Entrer votre prénom" autofocus></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8  offset-2">
                                            <label class="col-md4 control-label" for="nom">Nom <i class="fa fa-user" aria-hidden="true"></i></label>
                                            <input name="nom" type="text" class="form-control form-control-lg" placeholder="Entrer votre nom">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8  offset-2">
                                            <label class="col-md4 control-label" class="radio-inline" for="F">Sexe :&nbsp;<i class="fa fa-female" aria-hidden="true"></i></label>
                                            <input class="radio-inline rado" type="radio" name="sexe" id="F" value="F" required>
                                            <label class="col-md4 control-label" class="radio-inline" for="M">&nbsp;<i class="fa fa-male" aria-hidden="true"></i></label>
                                            <input class="radio-inline rado" type="radio" name="sexe" id="M" value="M" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8  offset-2">
                                            <label class="col-md4 control-label" for="E-amil"> E-mail :&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i></label>
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Entre un adresse e-mail à jour">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8  offset-2">
                                            <label class="col-md4 control-label">Nom societe :&nbsp;<i class="fa fa-building" aria-hidden="true"></i></label>
                                            <?php
                                            $cn = mysqli_connect("localhost", "root", "", "seminaire_db") or die("connection echoué");
                                            $db = "SELECT *  from societe GROUP BY nom_societe";
                                            $participant = mysqli_query($cn, $db) or die("echec de la requette");
                                            if (mysqli_num_rows($participant) > 0) {
                                                echo '<select name="societe"  class="form-control form-control-lg" required><option value=""selected disabled>Selectionner</option>';
                                                while ($row = mysqli_fetch_assoc($participant)) {
                                                    echo "<option value='{$row['id_societe']}'>{$row['nom_societe']}</option>";
                                                }
                                                echo "</select>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5  offset-4">
                                            <button class="btn btn-primary bt" name="btn-ajouter">Soumettre&nbsp;&nbsp;<i class="fa fa-send" aria-hidden="true"></i></button>
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