<?php

	include("Query.php");

	if (is_ajax()) {
		if (isset($_GET["action"]) && !empty($_GET["action"])) { //Checks if action value exists
			$action = $_GET["action"];
			switch($action) { //Switch case for value of action
				case "getInstrument": getInstrument(); break;
				case "getProf": getProf(); break;
				case "getFormation": getFormation(); break;
				case "getAtelier" : getAtelier(); break;
				case "getCommune" : getCommune(); break;
				case "getDivers" : getDivers(intval($_GET["divers_id"])); break;
				case "getProfByInstr" : getProfByInstr(); break;
			}
		}
	}

	//Function to check if the request is an AJAX request
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

	function  getInstrument() {

		$instr_id = intval($_GET["instr_id"]);
		$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent WHERE adh_instr1= '".$instr_id."' OR adh_instr2= '".$instr_id."'");

		echo json_encode($adhArray);
	}

	function  getProf() {

		$prof_id = intval($_GET["prof_id"]);
		$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent WHERE adh_prof1= '".$prof_id."' OR adh_prof2= '".$prof_id."'");

		echo json_encode($adhArray);
	}

	function  getFormation() {

		$fmt_id = intval($_GET["fmt_id"]);
		$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent WHERE adh_formation= '".$fmt_id."'");

		echo json_encode($adhArray);
	}

	function  getAtelier() {

		$atl_id = intval($_GET["atl_id"]);
		$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent WHERE adh_atelier1= '".$atl_id."' OR adh_atelier2= '".$atl_id."'");

		echo json_encode($adhArray);
	}

	function  getCommune() {

		$cmn_id = intval($_GET["cmn_id"]);
		$adhArray = databaseQuery("SELECT a.adh_nom, a.adh_prenom, a.adh_age, a.adh_seul from adherent a JOIN famille f ON a.adh_fml = f.fml_id WHERE f.fml_commune = '".$cmn_id."'");

		echo json_encode($adhArray);
	}

	function getDivers( $divers_id){
		switch($divers_id) {
			case 1 :
				$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent");
				echo json_encode($adhArray); break;
			case 2 :
				$adhArray = databaseQuery("select f.fml_name, f.fml_mail, f.fml_phone, f.fml_address, c.cmn_nom, f.fml_annee from famille f JOIN commune c ON f.fml_commune = c.cmn_id");
				echo json_encode($adhArray); break;
			case 3 :
				$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent WHERE adh_age > DATE_SUB(CURRENT_DATE(), INTERVAL 18 year)");
				echo json_encode($adhArray); break;
			case 4 :
				$adhArray = databaseQuery("SELECT a.adh_nom, a.adh_prenom, a.adh_age, a.adh_seul FROM adherent a LEFT JOIN famille f on a.adh_fml = f.fml_id WHERE a.adh_age > DATE_SUB(CURRENT_DATE(), INTERVAL 18 year) AND f.fml_commune = '1'");
				echo json_encode($adhArray); break;
			case 5 :
				$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent WHERE adh_sexe = 'homme'");
				echo json_encode($adhArray); break;
			case 6 :
				$adhArray = databaseQuery("SELECT adh_nom, adh_prenom, adh_age, adh_seul FROM adherent WHERE adh_sexe = 'femme'");
				echo json_encode($adhArray); break;
		}
	}

	function  getProfByInstr() {

		$instr_id = intval($_GET["instr_id"]);
		$profArray = databaseQuery("SELECT p.prof_id, p.prof_prenom, p.prof_nom from professeur p  WHERE p.instr_id = '".$instr_id."'");

		echo json_encode($profArray);
	}
?>
