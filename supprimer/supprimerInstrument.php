<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();


	$req = $bdd->query("DELETE FROM instrument WHERE instr_id= '".$_POST['instr_id']."'");


	if($req){
		echo "Instrument supprimé avec succès !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
