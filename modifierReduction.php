<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

if(!empty($_POST['valeur'])){
	$response = $bdd->query("UPDATE reductions SET rdc_valeur='".$_POST['valeur']."' WHERE rdc_id= '".$_POST['rdc_id']."'");
	}

echo "Réduction modifiée avec succès !";
header("refresh:1;url=/administration.php");

?>
