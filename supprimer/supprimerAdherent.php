<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();

	$req = $bdd->query("DELETE FROM adherent WHERE adh_id= '".$_POST['id']."'");

	if($req){
		echo "Adhérent supprimé avec succès !";
		header("refresh:1;url=../retrouverAdherentsFamille.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}

?>
