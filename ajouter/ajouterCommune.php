<?php
	include_once('../Query.php');
	
	$sql='INSERT INTO atelier commune (cmn_nom , cmn_zip) VALUES(:nom , :zip)';
	$sqlParams = array(
		'nom' => $_POST['nom'],
		'zip' => $_POST['zip'],
	);
	$rep = databaseQueryWrite($sql,$sqlParams);
	
	if($rep){
		echo "Commune ajoutée dans la base de données !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
