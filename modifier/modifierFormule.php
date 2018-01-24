<?php
	include("../Query.php");
	$bdd = getDatabaseConnexion();
	
	if(!empty($_POST['soucieu'])){
		$response = $bdd->query("UPDATE formule SET fml_soucieu='".$_POST['soucieu']."' WHERE fml_id= '".$_POST['fml_id']."'");
		}
	if(!empty($_POST['autre'])){
		$response = $bdd->query("UPDATE formule SET fml_autre='".$_POST['autre']."' WHERE fml_id= '".$_POST['fml_id']."'");
	}

	echo "Tarif(s) modifié(s) avec succès !";
	header("refresh:1;url=../administration.php");

?>
