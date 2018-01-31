<?php

	include("../Query.php");
	$bdd = getDatabaseConnexion();

	$req = $bdd->query("DELETE FROM atelier WHERE atl_id= '".$_POST['atl_id']."'");

	if($req){
		echo "Atelier supprimé avec succès !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
