<?php
	$annee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
	$countAdhArray = databaseQuery('SELECT count(adh_id) as nb_adh FROM famille fml join adherent adh on adh.adh_fml = fml.fml_id WHERE fml_annee=\'' . $annee[0][0] .'\'');
	echo $countAdhArray[0][0];
?>
