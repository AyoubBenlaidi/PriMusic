<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();
	if(!empty($_POST['valeur'])){
		$response = $bdd->query("UPDATE reductions SET rdc_valeur='".$_POST['valeur']."' WHERE rdc_id= '".$_POST['rdc_id']."'");
	}

	echo "Réduction modifiée avec succès !";
	header("refresh:1;url=../administration.php");

?>
