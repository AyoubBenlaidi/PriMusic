<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();

	$req = $bdd->query("DELETE FROM professeur WHERE prof_id= '".$_POST["prof_id"]."'");

	if($req){
		echo "Professeur supprimé avec succès !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}

?>
