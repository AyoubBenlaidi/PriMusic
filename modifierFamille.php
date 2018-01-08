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
			$response = $bdd->query("UPDATE famille SET fml_name='".$_POST['nom']."', fml_mail='".$_POST['mail']."', fml_phone='".$_POST['telephone']."', fml_address='".$_POST['adresse']."', fml_commune='".$_POST['cmn_id']."', fml_zip='".$_POST['code_postal']."', fml_annee='".$annee."' WHERE fml_id= '".$_POST['id']."'");
			$_SESSION['fml_id'] = $_POST['id'];
			$_SESSION['fml_nom'] = $_POST['nom'];
			$_SESSION['fml_commune'] = $_POST['cmn_id'];
			$_SESSION['nb_adh'] = 0;


				if($response){
					echo "Famille modifiée avec succès !";
					header("refresh:1;url=/retrouverAdherentsFamille.php");
				}else{
					echo "Echec !";
					header("refresh:1;url=/formulaireFamille.php");
				}
?>
