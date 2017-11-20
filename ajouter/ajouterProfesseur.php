<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8','root', '');
} catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$response = $bdd->query("SELECT instr_id FROM instrument WHERE instr_id= '".$_POST['instr_id']."'");
$instrument_id = 1;
while ($donnees = $response->fetch()){
	$instrument_id =  $donnees['instr_id'];

}
$req = $bdd->prepare('INSERT INTO professeur (prof_nom, prof_prenom, instr_id) VALUES(:nom, :prenom, :instr_id)');
$req->execute(array(
	'nom' => $_POST['nom'],
	'prenom' => $_POST['prenom'],
	'instr_id' => $instrument_id
	));

	if($req){
	echo "Professeur ajouté dans la base de données !";
	header("refresh:1;url=/administration.php");
}else{
	echo "Echec !";
	header("refresh:1;url=/administration.php");
}


?>
