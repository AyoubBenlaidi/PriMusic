<?php session_start(); ?>
<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();
	$annee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
	$response = $bdd->query("UPDATE famille SET fml_name='".$_POST['nom']."', fml_mail='".$_POST['mail']."', fml_phone='".$_POST['telephone']."', fml_address='".$_POST['adresse']."', fml_commune='".$_POST['cmn_id']."', fml_annee='".$annee[0][0]."' WHERE fml_id= '".$_POST['id']."'");
	$_SESSION['fml_id'] = $_POST['id'];
	$_SESSION['fml_nom'] = $_POST['nom'];
	$_SESSION['fml_commune'] = $_POST['cmn_id'];
	$_SESSION['nb_adh'] = 0;

	if($response){
		echo "Famille modifiée avec succès !";
		header("refresh:1;url=../retrouverAdherentsFamille.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../formulaireFamille.php");
	}
?>
