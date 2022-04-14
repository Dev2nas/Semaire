<?php
  include "../../connexion_db/conn_db.php";
/*-----------------------------Script supprimer participant-------------------------------*/
    if(isset($_GET['Societe'])){
      $idsociete=$_GET['Societe'];
      $cn->query("DELETE FROM societe WHERE id_societe='$idsociete'")
      or die($cn->error);
      // header('location:liste_societe.php'); 
    } ?>
    <script type="text/javascript">
 	document.location='liste_societe.php';
 </script>