<?php

	include("../Query.php");
	$bdd = getDatabaseConnexion();


	$req = $bdd->query("DELETE FROM formation WHERE fmt_id= '".$_POST['fmt_id']."'");


	if($req){
		echo "Formation supprimée avec succès !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
