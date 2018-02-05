<?php

	if (!function_exists('getDatabaseConnexion')) {
		function getDatabaseConnexion(){

			try{
				$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
			} catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			return $bdd;
		}
	}

	if (!function_exists('databaseQuery')) {
		function databaseQuery($queryString){

			$bdd = getDatabaseConnexion();
			
			$reponse = $bdd->query($queryString);
			$dataArray = array();

			while ($donnees = $reponse->fetch(PDO::FETCH_NUM)) {
				array_push($dataArray, $donnees);
			}

			$reponse->closeCursor(); // Termine le traitement de la requête

			return $dataArray;

		}
	}

	if (!function_exists('databaseQueryWrite')) {
		function databaseQueryWrite($insertString,$insertParam=array()){

			$bdd = getDatabaseConnexion();
			
			$request=$bdd->prepare($insertString);
			$reponse=$request->execute($insertParam);
			
			return $reponse;		
		}
	}

?>
