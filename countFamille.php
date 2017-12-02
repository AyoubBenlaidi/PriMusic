<?php
	$month = date("n");
	$year = date("Y");
	if ($month < 6) {
	$annee = ($year -1) . "-" . ($year);
	} else {
		$annee = ($year) . "-" . ($year + 1);
	}
	$countFmlArray = databaseQuery('SELECT count(fml_id) as nb_famille FROM famille WHERE fml_annee=\'' . $annee .'\'');
	echo $countFmlArray[0][0];
?>
