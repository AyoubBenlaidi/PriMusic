<?php
	include_once('../Query.php');
	
	$sql='INSERT INTO atelier (atl_nom) VALUES(:nom)';
	$sqlParams = array(
		'nom' => $_POST['nom'],
	);
	$rep = databaseQueryWrite($sql,$sqlParams);
	
	if($rep){
		echo "Atelier ajouté dans la base de données !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
