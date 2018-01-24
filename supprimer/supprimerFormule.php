<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();
	

	$req = $bdd->query("DELETE FROM formule WHERE fml_id= '".$_POST['fml_id']."'");

	if($req){
		echo "Formule supprimée avec succès !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
