<?php

try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$req = $bdd->query("DELETE FROM adherent WHERE adh_id= '".$_POST['id']."'");

	if($req){
	echo "Adhérent supprimé avec succès !";
	header("refresh:1;url=/retrouverAdherentsFamille.php");
}else{
	echo "Echec !";
	header("refresh:1;url=/administration.php");
}

?>
