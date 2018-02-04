<?php session_start(); ?>
<?php
	include_once('../Query.php');
	$annee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
	
	$sql = 'INSERT INTO famille(fml_name, fml_mail, fml_phone, fml_address, fml_commune, fml_annee) VALUES(:nom, :mail, :telephone, :adresse, :commune, :fml_annee)';
	$sqlParams = array(
		'nom' => $_POST['nom'],
		'mail' => $_POST['mail'],
		'telephone' => $_POST['telephone'],
		'adresse' => $_POST['adresse'],
		'commune' => $_POST['cmn_id'],
		'fml_annee' => $annee[0][0]
	);
	$rep = databaseQueryWrite($sql,$sqlParams);

	$fml_id = databaseQuery('SELECT fml_id FROM famille WHERE fml_name = \'' . $_POST['nom'] .'\' AND fml_mail = \''.$_POST['mail'].'\' AND fml_phone = \''.$_POST['telephone'].'\' AND fml_address = \''.$_POST['adresse'].'\' AND fml_commune = '.$_POST['cmn_id'].' AND fml_annee = \''.$annee[0][0].'\'');

	$_SESSION['fml_id'] = $fml_id[0][0];
	$_SESSION['fml_nom'] = $_POST['nom'];
	$_SESSION['fml_commune'] = $_POST['cmn_id'];
	$_SESSION['nb_adh'] = 0;

	if($rep){
		echo "Famille ajoutée dans la base de données !";
		header("refresh:1;url=../formulaireAdherent.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../formulaireFamille.php");
	}
?>
