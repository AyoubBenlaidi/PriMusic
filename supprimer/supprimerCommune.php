<?php

	include("../Query.php");
	$bdd = getDatabaseConnexion();


	$req = $bdd->query("DELETE FROM commune WHERE cmn_id= '".$_POST['cmn_id']."'");


	if($req){
		echo "Commune supprimée avec succès !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
