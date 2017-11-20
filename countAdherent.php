<?php
	$month = date("n");
	$year = date("Y");
	if ($month < 6) {
		$annee = ($year -1) . "-" . ($year);
	} else {
		$annee = ($year) . "-" . ($year + 1);
	}
	$countAdhArray = databaseQuery("SELECT count(adh_id) as nb_adh FROM famille fml join adherent adh on adh.adh_fml = fml.fml_id WHERE fml_annee='2016-2017'");
	echo $countAdhArray[0][0];
?>
