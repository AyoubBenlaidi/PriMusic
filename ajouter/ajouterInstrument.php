<?php
	include_once('../Query.php');
	
	$sql='INSERT INTO instrument (instr_nom) VALUES(:nom)';
	$sqlParams = array(
		'nom' => $_POST['instr_nom'],
	);
	$rep = databaseQueryWrite($sql,$sqlParams);
	
	if($rep){
		echo "Instrument ajouté dans la base de données !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
