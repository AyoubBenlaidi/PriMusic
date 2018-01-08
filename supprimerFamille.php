<?php

try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$req1 = $bdd->query("DELETE FROM adherent WHERE adh_fml= '".$_POST['id']."'");
$req2 = $bdd->query("DELETE FROM famille WHERE fml_id= '".$_POST['id']."'");

	if($req1&&$req2){
	echo "Famille supprimée avec succès !";
	header("refresh:1;url=/formulaireFamille.php");
}else{
	echo "Echec !";
	header("refresh:1;url=/formulaireFamille.php");
}

?>
