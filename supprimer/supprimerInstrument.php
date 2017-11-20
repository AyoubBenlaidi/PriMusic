<?php

try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$req = $bdd->query("DELETE FROM instrument WHERE instr_id= '".$_POST['instr_id']."'");


	if($req){
	echo "Instrument supprimé avec succès !";
	header("refresh:1;url=/administration.php");
}else{
	echo "Echec !";
	header("refresh:1;url=/administration.php");
}
?>
