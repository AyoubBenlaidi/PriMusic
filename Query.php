<?php
if (!function_exists('databaseQuery')) {
	function databaseQuery($queryString){

		try{
			$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
		} catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		$reponse = $bdd->query($queryString);
		$dataArray = array();

		while ($donnees = $reponse->fetch(PDO::FETCH_NUM)) {
			array_push($dataArray, $donnees);
			// print_r($dataArray);
	}

	$reponse->closeCursor(); // Termine le traitement de la requête

	return $dataArray;

	}
}

if (!function_exists('databaseInsert')) {
	function databaseInsert($insertString){

		try{
			$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
		} catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}
}

?>
