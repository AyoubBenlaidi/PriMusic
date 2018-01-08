<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO commune (cmn_nom , cmn_zip) VALUES(:nom , :zip) ');
$req->execute(array(
	'nom' => $_POST['nom'],
	'zip' => $_POST['zip'],
	));

	if($req){
	echo "Commune ajoutée dans la base de données !";
	header("refresh:1;url=/administration.php");
}else{
	echo "Echec !";
	header("refresh:1;url=/administration.php");
}
?>
