<?php  ?><?php session_start(); ?>
<?php

	include("../Query.php");
	$bdd = getDatabaseConnexion();
	if ($_POST['annee'] === '')
	{   
        echo "L'année en cours ne peut pas être nulle ";
		header("refresh:1;url=../administration.php");

    }
	
	$response = $bdd->query("UPDATE users SET usr_annee='".$_POST['annee']."'");

	if($response){
		echo "Année modifiée avec succès !";
		header("refresh:1;url=../administration.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../administration.php");
	}


?>
