<?php
	include_once('../Query.php');
	
	$sql='INSERT INTO formation (fmt_nom) VALUES(:nom)';
	$sqlParams = array(
		'nom' => $_POST['nom'],
	);
	$rep = databaseQueryWrite($sql,$sqlParams);
	
	if($rep){
		echo "Formation ajoutée dans la base de données !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
