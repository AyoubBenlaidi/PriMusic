<?php

	include("Query.php");

	if (isset($_GET['button']) && !empty($_GET['button'])) { //Checks if button value exists
			$button = $_GET['button'];
			switch($button) { //Switch case for value of button
				case "instrButton": csvInstrument(); break;
				case "profButton": csvProf(); break;
				case "formationButton": csvFormation(); break;
				case "atelierButton": csvAtelier(); break;
				case "communeButton" : csvCommune(); break;
				case "diversButton" : csvDivers(); break;
			}
		}

	function csvInstrument() {
		$instr_id = intval($_GET["id"]);
		$headerArray = databaseQuery("select instr_nom from instrument where instr_id = '".$instr_id."'");
		$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom, fmt.fmt_nom, a.adh_classe, a.adh_seul, c.cmn_nom, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_instr1 ='".$instr_id."' OR a.adh_instr2 = '" .$instr_id."' ORDER BY f.fml_name");

		header('Content-Type: text/csv;charset=UTF-8');
		header( 'Content-Disposition: attachment;filename=Adherents jouant du '.$headerArray[0][0].'.csv');

		$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Commune", "Sexe");

		$fichier = fopen('php://output', 'w');

		// Copie des titres de colonnes dans le fichier
		fputcsv($fichier, $entete,";");

		// Copie de chaque ligne
		foreach ($adhArray as $ligne)
		{
			$ligne[5] = utf8_decode($ligne[5]) . ' ' . utf8_decode($ligne[6]);
			$ligne[8] = utf8_decode($ligne[8]) . ' ' . utf8_decode($ligne[9]);
			unset($ligne[9]);
			unset($ligne[6]);
			$ligne2 = array_values($ligne);
			for ($i = 0; $i < sizeof($ligne2); $i++)
			{
				$ligne2[$i] = utf8_decode($ligne2[$i]);
			}
			fputcsv($fichier, $ligne2,";");
		}

		fclose($fichier);
	}

	function csvProf() {
		$prof_id = intval($_GET["id"]);
		$headerArray = databaseQuery("select prof_prenom, prof_nom from professeur where prof_id = '".$prof_id."'");
		$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom, fmt.fmt_nom, a.adh_classe, a.adh_seul, c.cmn_nom, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_prof1 ='".$prof_id."' OR a.adh_prof2 = '" .$prof_id."' ORDER BY f.fml_name");

		header('Content-Type: text/csv;charset=UTF-8');
		header( 'Content-Disposition: attachment;filename=Adherents eleve '.$headerArray[0][0].' '.$headerArray[0][1].'.csv');

		$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Commune", "Sexe");

		$fichier = fopen('php://output', 'w');

		// Copie des titres de colonnes dans le fichier
		fputcsv($fichier, $entete,";");

		// Copie de chaque ligne
		foreach ($adhArray as $ligne)
		{
			$ligne[5] = utf8_decode($ligne[5]) . ' ' . utf8_decode($ligne[6]);
			$ligne[8] = utf8_decode($ligne[8]) . ' ' . utf8_decode($ligne[9]);
			unset($ligne[9]);
			unset($ligne[6]);
			$ligne2 = array_values($ligne);
			for ($i = 0; $i < sizeof($ligne2); $i++)
			{
				$ligne2[$i] = utf8_decode($ligne2[$i]);
			}
			fputcsv($fichier, $ligne2,";");
		}

		fclose($fichier);
	}

	function csvFormation() {
		$fmt_id = intval($_GET["id"]);
		$headerArray = databaseQuery("select fmt_nom from formation where fmt_id = '".$fmt_id."'");
		$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom, a.adh_classe, a.adh_seul, c.cmn_nom, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_formation ='".$fmt_id."' ORDER BY f.fml_name");

		header('Content-Type: text/csv;charset=UTF-8');
		header( 'Content-Disposition: attachment;filename=Adherents classe solfege '.$headerArray[0][0].'.csv');

		$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", "Classe", "Rentre Seul", "Commune", "Sexe");

		$fichier = fopen('php://output', 'w');

		// Copie des titres de colonnes dans le fichier
		fputcsv($fichier, $entete,";");

		// Copie de chaque ligne
		foreach ($adhArray as $ligne)
		{
			$ligne[5] = utf8_decode($ligne[5]) . ' ' . utf8_decode($ligne[6]);
			$ligne[8] = utf8_decode($ligne[8]) . ' ' . utf8_decode($ligne[9]);
			unset($ligne[9]);
			unset($ligne[6]);
			$ligne2 = array_values($ligne);
			for ($i = 0; $i < sizeof($ligne2); $i++)
			{
				$ligne2[$i] = utf8_decode($ligne2[$i]);
			}
			fputcsv($fichier, $ligne2,";");
		}

		fclose($fichier);
	}

	function csvAtelier() {
		$atl_id = intval($_GET["id"]);
		$headerArray = databaseQuery("select atl_nom from atelier where atl_id = '".$atl_id."'");
		$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom, fmt.fmt_nom, a.adh_classe, a.adh_seul, c.cmn_nom, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_atelier1 ='".$atl_id."' OR  a.adh_atelier2 ='".$atl_id."' ORDER BY f.fml_name");

		header('Content-Type: text/csv;charset=UTF-8');
		header( 'Content-Disposition: attachment;filename=Adherents atelier '.$headerArray[0][0].'.csv');

		$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Commune", "Sexe");

		$fichier = fopen('php://output', 'w');

		// Copie des titres de colonnes dans le fichier
		fputcsv($fichier, $entete,";");

		// Copie de chaque ligne
		foreach ($adhArray as $ligne)
		{
			$ligne[5] = utf8_decode($ligne[5]) . ' ' . utf8_decode($ligne[6]);
			$ligne[8] = utf8_decode($ligne[8]) . ' ' . utf8_decode($ligne[9]);
			unset($ligne[9]);
			unset($ligne[6]);
			$ligne2 = array_values($ligne);
			for ($i = 0; $i < sizeof($ligne2); $i++)
			{
				$ligne2[$i] = utf8_decode($ligne2[$i]);
			}
			fputcsv($fichier, $ligne2,";");
		}

		fclose($fichier);
	}

	function csvCommune() {
		$cmn_id = intval($_GET["id"]);
		$headerArray = databaseQuery("select cmn_nom from commune where cmn_id = '".$cmn_id."'");
		$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom,  fmt.fmt_nom, a.adh_classe, a.adh_seul, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id WHERE f.fml_commune ='".$cmn_id."' ORDER BY f.fml_name");

		header('Content-Type: text/csv;charset=UTF-8');
		header( 'Content-Disposition: attachment;filename=Adherents habitant '.$headerArray[0][0].'.csv');

		$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Sexe");

		$fichier = fopen('php://output', 'w');

		// Copie des titres de colonnes dans le fichier
		fputcsv($fichier, $entete,";");

		// Copie de chaque ligne
		foreach ($adhArray as $ligne)
		{
			$ligne[5] = utf8_decode($ligne[5]) . ' ' . utf8_decode($ligne[6]);
			$ligne[8] = utf8_decode($ligne[8]) . ' ' . utf8_decode($ligne[9]);
			unset($ligne[9]);
			unset($ligne[6]);
			$ligne2 = array_values($ligne);
			for ($i = 0; $i < sizeof($ligne2); $i++)
			{
				$ligne2[$i] = utf8_decode($ligne2[$i]);
			}
			fputcsv($fichier, $ligne2,";");
		}

		fclose($fichier);
	}

	function csvDivers() {
		$month = date("n");
		$year = date("Y");
		if ($month < 6) {
			$annee = ($year -1) . "-" . ($year);
		} else {
			$annee = ($year) . "-" . ($year + 1);
		}
		$divers_id = intval($_GET["id"]);

		function adhList($headerTitle, $adhArray, $entete){
			header('Content-Type: text/csv;charset=UTF-8');
			header( 'Content-Disposition: attachment;filename='.$headerTitle.'.csv');

			$fichier = fopen('php://output', 'w');

			// Copie des titres de colonnes dans le fichier
			fputcsv($fichier, $entete,";");

			// Copie de chaque ligne
			foreach ($adhArray as $ligne)
			{
				$ligne[5] = utf8_decode($ligne[5]) . ' ' . utf8_decode($ligne[6]);
				$ligne[8] = utf8_decode($ligne[8]) . ' ' . utf8_decode($ligne[9]);
				unset($ligne[9]);
				unset($ligne[6]);
				$ligne2 = array_values($ligne);
				for ($i = 0; $i < sizeof($ligne2); $i++)
				{
					$ligne2[$i] = utf8_decode($ligne2[$i]);
				}
				fputcsv($fichier, $ligne2,";");
			}

			fclose($fichier);
		}

		function fmlList($headerTitle, $fmlArray, $entete){
			header('Content-Type: text/csv;charset=UTF-8');
			header( 'Content-Disposition: attachment;filename='.$headerTitle.'.csv');

			$fichier = fopen('php://output', 'w');

			// Copie des titres de colonnes dans le fichier
			fputcsv($fichier, $entete,";");

			// Copie de chaque ligne
			foreach ($fmlArray as $ligne) {
				for ($i = 0; $i < sizeof($ligne); $i++)
				{
					$ligne[$i] = utf8_decode($ligne[$i]);
				}
				fputcsv($fichier, $ligne,";");
			}

			fclose($fichier);
		}

		switch($divers_id) {
			case 1 :
				$headerTitle = "Liste complète Adherents";
				$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom,  fmt.fmt_nom, a.adh_classe, a.adh_seul, c.cmn_nom, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id ORDER BY f.fml_name");
				$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Commune", "Sexe");
				adhList($headerTitle, $adhArray, $entete);
				break;
			case 2 :
				$headerTitle = "Liste complète familles";
				$fmlArray = databaseQuery("select f.fml_id, f.fml_name, f.fml_mail, f.fml_phone, f.fml_address, f.fml_zip, c.cmn_nom, f.fml_annee from famille f JOIN commune c ON f.fml_commune = c.cmn_id");
				$entete = array("Id", "Nom", "eMail", utf8_decode("Téléphone"), "Adresse", "Code Postal", "Commune", utf8_decode("Année d'inscription"));
				fmlList($headerTitle, $fmlArray, $entete);
				break;
			case 3 :
				$headerTitle = "Adherents -18 ans";
				$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom,  fmt.fmt_nom, a.adh_classe, a.adh_seul, c.cmn_nom, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_age > DATE_SUB(CURRENT_DATE(), INTERVAL 18 year) ORDER BY f.fml_name");
				$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Commune", "Sexe");
				adhList($headerTitle, $adhArray, $entete);
				break;
			case 4 :
				$headerTitle = "Adherents -18 ans Jarréziens";
				$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom,  fmt.fmt_nom, a.adh_classe, a.adh_seul, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_age > DATE_SUB(CURRENT_DATE(), INTERVAL 18 year) AND c.cmn_nom = 'Soucieu en Jarrest' ORDER BY f.fml_name");
				$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Sexe");
				adhList($headerTitle, $adhArray, $entete);
				break;
			case 5 :
				$headerTitle = "Adherents homme";
				$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom,  fmt.fmt_nom, a.adh_classe, a.adh_seul, c.cmn_nom from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_sexe = 'homme' ORDER BY f.fml_name");
				$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Commune");
				adhList($headerTitle, $adhArray, $entete);
				break;
			case 6 :
				$headerTitle = "Adherents femme";
				$adhArray = databaseQuery("select f.fml_name, a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom,  fmt.fmt_nom, a.adh_classe, a.adh_seul, c.cmn_nom from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE a.adh_sexe = 'femme' ORDER BY f.fml_name");
				$entete = array("Famille", utf8_decode("Prénom"), "Nom", "Date de naissance", "Instrument 1", "Professeur 1", "Instrument 2", "Professeur 2", "Atelier 1", "Atelier 2", utf8_decode("Classe Solfège"), "Classe", "Rentre Seul", "Commune");
				adhList($headerTitle, $adhArray, $entete);
				break;
		}

	}

?>
