<?php
  include "../../connexion_db/conn_db.php";
/*-----------------------------Script supprimer participant-------------------------------*/
    if(isset($_GET['btn-sup'])){
      $idp=$_GET['btn-sup'];
      $cn->query("DELETE FROM participant WHERE idp='$idp'")
      or die($cn->error);
      // header('location:liste_participants.php'); 
    } ?>
    <script type="text/javascript">
 	document.location='liste_participants.php';
 </script>