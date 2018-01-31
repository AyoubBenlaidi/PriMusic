<?php session_start(); ?>
<?php

	include("../Query.php");
	$bdd = getDatabaseConnexion();
	if ($_POST['adh_sexe'] === '')
	{
		$_POST['adh_sexe'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_sexe=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}
	else{
		$response = $bdd->query("UPDATE adherent SET adh_sexe='".$_POST['adh_sexe']."' WHERE adh_id='".$_POST['adh_id']."'");
	}

	if ($_POST['adh_instr1'] === '')
	{
		$_POST['adh_instr1'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_instr1=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}else{
		$response = $bdd->query("UPDATE adherent SET adh_instr1='".$_POST['adh_instr1']."' WHERE adh_id='".$_POST['adh_id']."'");
	}
	if ($_POST['adh_instr2'] === '')
	{
		$_POST['adh_instr2'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_instr2=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}else{
		$response = $bdd->query("UPDATE adherent SET adh_instr2='".$_POST['adh_instr2']."' WHERE adh_id='".$_POST['adh_id']."'");
	}
	if ($_POST['adh_prof1'] === '')
	{
		$_POST['adh_prof1'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_prof1=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}else{
		$response = $bdd->query("UPDATE adherent SET adh_prof1='".$_POST['adh_prof1']."' WHERE adh_id='".$_POST['adh_id']."'");
	}
	if ($_POST['adh_prof2'] === '')
	{
		$_POST['adh_prof2'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_prof2=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}else{
		$response = $bdd->query("UPDATE adherent SET adh_prof2='".$_POST['adh_prof2']."' WHERE adh_id='".$_POST['adh_id']."'");
	}
	if ($_POST['adh_atelier1'] === '')
	{
		$_POST['adh_atelier1'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_atelier1=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}else{
		$response = $bdd->query("UPDATE adherent SET adh_atelier1='".$_POST['adh_atelier1']."' WHERE adh_id='".$_POST['adh_id']."'");
	}
	if ($_POST['adh_atelier2'] === '')
	{
		$_POST['adh_atelier2'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_atelier2=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}else{
		$response = $bdd->query("UPDATE adherent SET adh_atelier2='".$_POST['adh_atelier2']."' WHERE adh_id='".$_POST['adh_id']."'");
	}
	if ($_POST['adh_formation'] === '')
	{
		$_POST['adh_formation'] = NULL;
		$response = $bdd->query("UPDATE adherent SET adh_formation=NULL WHERE adh_id='".$_POST['adh_id']."'");
	}else{
		$response = $bdd->query("UPDATE adherent SET adh_formation='".$_POST['adh_formation']."' WHERE adh_id='".$_POST['adh_id']."'");
	}

	$month = date("n");
	$year = date("Y");
	if ($month < 6) {
	$annee = ($year -1) . "-" . ($year);
	} else {
		$annee = ($year) . "-" . ($year + 1);
	}
	$response = $bdd->query("UPDATE adherent SET adh_nom='".$_POST['adh_nom']."', adh_prenom='".$_POST['adh_prenom']."', adh_age='".$_POST['adh_age']."', adh_classe='".$_POST['adh_classe']."',adh_seul='".$_POST['adh_seul']."' WHERE adh_id='".$_POST['adh_id']."'");

	if($response){
		echo "Adhérent modifié avec succès !";
		header("refresh:1;url=../retrouverAdherentsFamille.php");
	}else{
		echo "Echec !";
		header("refresh:1;url=../retrouverAdherentsFamille.php");
	}


?>
