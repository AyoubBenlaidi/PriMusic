<?php
	include_once('../Query.php');
	
	$sql='INSERT INTO formule (fml_nom, fml_soucieu, fml_autre, fml_num) VALUES(:nom, :soucieu, :autre, :num)';
	$sqlParams = array(
		'nom' => $_POST['nom'],
		'soucieu' => $_POST['soucieu'],
		'autre' => $_POST['autre'],
		'num' => $_POST['num']
	);
	$rep = databaseQueryWrite($sql,$sqlParams);
	
	if($rep){
		echo "Formule ajoutée dans la base de données !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}
?>
