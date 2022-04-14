<?php 
require_once '../connexion_db/conn_db.php';
/*---------------------------Script ajouter participant-----------------------------*/
if(isset($_POST['btn-ajouter'])){
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $mail=$_POST['email'];
  $sexe=$_POST['sexe'];
  $societe=$_POST['societe'];
  $cn->query("INSERT INTO `participant` (`nom`, `prenom`, `sexe`, `email`, `id_societe`) VALUES ('$nom','$prenom','$sexe','$mail','$societe')")
  or die($cn->error);
  header('location:participant/liste_participants.php');
}
/*-----------------------------Script modifier participant-----------------------------*/
  if(isset($_POST['btn-modifier'])){
    $idp=$_POST['idp'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $mail=$_POST['email'];
    $sexe=$_POST['sexe'];
    $societe=$_POST['societe'];
    $cn->query("UPDATE participant SET  nom='$nom' ,prenom='$prenom', sexe='$sexe', email='$mail',id_societe='$societe'  WHERE idp=$idp")
    or die ($cn->error);
    header('location:participant/liste_participants.php');
  }
 
  /*----------------------------Script ajout nouveau societe --------------------------------*/
if(isset($_POST['btn-ajout-societe'])){
  $name=$_POST['nom'];
  $mail=$_POST['email'];
  $cn->query("INSERT INTO societe(nom_societe,email_societe)values('$name','$mail')")
  or die($cn->error);
  header('location:societe/liste_societe.php');
} 
/*-----------------------------Script modifier participant-----------------------------*/ 
if(isset($_POST['btn-modifier-societe'])){
  $id_societe=$_POST['id_societe'];
  $nom_societe=$_POST['nom_societe'];
  $email_societe=$_POST['email_societe'];
  $cn->query("UPDATE societe SET nom_societe='$nom_societe',email_societe='$email_societe' WHERE id_societe=$id_societe")
  or die($cn->error);
  header('location:societe/liste_societe.php');
}
/*---------------------------Script ajouter administration-----------------------------*/
if(isset($_POST['btn-ajouter-admin'])){
  $login=$_POST['login'];
  $mdp=$_POST['mdp'];
  $cn->query("INSERT INTO admin(login,mdp) VALUES ('$login','$mdp')")
  or die($cn->error);
  header('location:../index.php');
}
?>
