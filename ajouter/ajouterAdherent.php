<?php session_start(); ?>
<?php
	include_once('../Query.php');
	$annee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
	$comptage_adherents = 0;
	while($comptage_adherents < 3){
		if(isset($_POST['adh_prenom'][$comptage_adherents]) && $_POST['adh_prenom'][$comptage_adherents] != ''){
			if ($_POST['adh_sexe'][$comptage_adherents] === '')
			{
				$_POST['adh_sexe'][$comptage_adherents] = NULL;
			}
			if ($_POST['adh_instr1'][$comptage_adherents] === '')
			{
				$_POST['adh_instr1'][$comptage_adherents] = NULL;
			}
			if ($_POST['adh_instr2'][$comptage_adherents] === '')
			{
				$_POST['adh_instr2'][$comptage_adherents] = NULL;
			}
			if ($_POST['adh_prof1'][$comptage_adherents] === '')
			{
				$_POST['adh_prof1'][$comptage_adherents] = NULL;
			}
			if ($_POST['adh_prof2'][$comptage_adherents] === '')
			{
				$_POST['adh_prof2'][$comptage_adherents] = NULL;
			}
			if ($_POST['adh_atelier1'][$comptage_adherents] === '')
			{
				$_POST['adh_atelier1'][$comptage_adherents] = NULL;
			}
			if ($_POST['adh_atelier2'][$comptage_adherents] === '')
			{
				$_POST['adh_atelier2'][$comptage_adherents] = NULL;
			}
			if ($_POST['adh_formation'][$comptage_adherents] === '')
			{
				$_POST['adh_formation'][$comptage_adherents] = NULL;
			}
			if (!isset($_POST['adh_seul'][$comptage_adherents]) or $_POST['adh_seul'][$comptage_adherents] == null or $_POST['adh_seul'][$comptage_adherents] == '')
			{
				$_POST['adh_seul'][$comptage_adherents] = 'non';
			}
			$date = implode('-', array_reverse(explode('/', $_POST['adh_age'][$comptage_adherents])));
			$sql = 'INSERT INTO adherent(adh_fml, adh_nom, adh_prenom, adh_age, adh_instr1, adh_prof1, adh_instr2, adh_prof2, adh_atelier1, adh_atelier2, adh_formation, adh_classe, adh_seul, adh_sexe)
			VALUES(:adh_fml, :adh_nom, :adh_prenom, :adh_age, :adh_instr1, :adh_prof1, :adh_instr2, :adh_prof2, :adh_atelier1, :adh_atelier2, :adh_formation, :adh_classe, :adh_seul, :adh_sexe)';
			$sqlParams = array(
			'adh_fml' => $_POST['adh_fml'][$comptage_adherents],
			'adh_nom' => $_POST['adh_nom'][$comptage_adherents],
			'adh_prenom' => $_POST['adh_prenom'][$comptage_adherents],
			'adh_age' => $date,
			'adh_instr1' => $_POST['adh_instr1'][$comptage_adherents],
			'adh_prof1' => $_POST['adh_prof1'][$comptage_adherents],
			'adh_instr2' => $_POST['adh_instr2'][$comptage_adherents],
			'adh_prof2' => $_POST['adh_prof2'][$comptage_adherents],
			'adh_atelier1' => $_POST['adh_atelier1'][$comptage_adherents],
			'adh_atelier2' => $_POST['adh_atelier2'][$comptage_adherents],
			'adh_formation' => $_POST['adh_formation'][$comptage_adherents],
			'adh_classe' => $_POST['adh_classe'][$comptage_adherents],
			'adh_seul' => $_POST['adh_seul'][$comptage_adherents],
			'adh_sexe' => $_POST['adh_sexe'][$comptage_adherents]
			);
			$rep = databaseQueryWrite($sql,$sqlParams);
			
			$sql2 = 'UPDATE famille SET fml_annee = :fml_annee WHERE fml_id = :fml_id';
			$sqlParams2 = array(
			'fml_id' => $_POST['adh_fml'][$comptage_adherents],
			'fml_annee' => $annee[0][0]
			);
			$rep2 = databaseQueryWrite($sql2,$sqlParams2);
			
			$_SESSION['nb_adh'] = $_SESSION['nb_adh'] +1;
		}

		$comptage_adherents++;
	}
	if($rep){
		echo "Adherent ajouté dans la base de données !";

		if(isset($_POST['revenir'])){
			header("refresh:1;url=../retrouverAdherentsFamille.php");
		}
		else {
			header("refresh:1;url=../formulairePaiement.php");
		}
	}else{
		echo "Echec !";
		header("refresh:1;url=../formulaireFamille.php");
	}
?>
