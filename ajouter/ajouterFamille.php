<?php session_start(); ?>
<?php
$month = date("n");
$year = date("Y");
if ($month < 6) {
	$annee = ($year -1) . "-" . ($year);
} else {
	$annee = ($year) . "-" . ($year + 1);
}
		$bdd = new PDO('mysql:host=localhost;dbname=pritest;charset=utf8', 'root', '');
		$req = $bdd->prepare('INSERT INTO famille(fml_name, fml_mail, fml_phone, fml_address, fml_commune, fml_zip,fml_annee) VALUES(:nom, :mail, :telephone, :adresse, :commune, :code_postal, :fml_annee)');
		$req->execute(array(
		'nom' => $_POST['nom'],
		'mail' => $_POST['mail'],
		'telephone' => $_POST['telephone'],
		'adresse' => $_POST['adresse'],
		'commune' => $_POST['cmn_id'],
		'code_postal' => $_POST['code_postal'],
		'fml_annee' => $annee
		));

		$reponse = $bdd->query('SELECT fml_id FROM famille WHERE fml_mail=\'' . $_POST['mail'] .'\'');
		$adh_fml;
		while ($donnees = $reponse->fetch())
			{
				$adh_fml = $donnees['fml_id'];
			}

		$reponse->closeCursor();
		$_SESSION['fml_id'] = $adh_fml;
		$_SESSION['fml_nom'] = $_POST['nom'];
		$_SESSION['fml_commune'] = $_POST['cmn_id'];
		$_SESSION['nb_adh'] = 0;


			if($req){
				echo "Famille ajoutée dans la base de données !";
				header("refresh:1;url=/formulaireAdherent.php");
			}else{
				echo "Echec !";
				header("refresh:1;url=/formulaireFamille.php");
}


?>
