<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();

	$req1 = $bdd->query("DELETE FROM paiement WHERE pay_fml= '".$_POST['id']."'");
	$req2 = $bdd->query("DELETE FROM adherent WHERE adh_fml= '".$_POST['id']."'");
	$req3 = $bdd->query("DELETE FROM famille WHERE fml_id= '".$_POST['id']."'");

	if($req1&&$req2&&$req3){
		echo "Famille supprimée avec succès !";
		header("refresh:1;url=../formulaireFamille.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../formulaireFamille.php");
	}

?>
