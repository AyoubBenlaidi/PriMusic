<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO formule (fml_nom, fml_soucieu, fml_autre, fml_num) VALUES(:nom, :soucieu, :autre, :num)');
$req->execute(array(
	'nom' => $_POST['nom'],
	'soucieu' => $_POST['soucieu'],
	'autre' => $_POST['autre'],
	'num' => $_POST['num']
	));

	if($req){
	echo "Formule ajoutée dans la base de données !";
	header("refresh:1;url=/administration.php");
}else{
	echo "Echec !";
	header("refresh:1;url=/administration.php");
}
?>
