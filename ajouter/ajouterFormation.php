<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO formation (fmt_nom) VALUES(:nom)');
$req->execute(array(
	'nom' => $_POST['nom'],
	));

	if($req){
	echo "Formation ajoutée dans la base de données !";
	header("refresh:1;url=/administration.php");
}else{
	echo "Echec !";
	header("refresh:1;url=/administration.php");
}
?>
