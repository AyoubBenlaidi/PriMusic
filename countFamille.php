<?php
	$annee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
	$countFmlArray = databaseQuery('SELECT count(fml_id) as nb_famille FROM famille WHERE fml_annee=\'' . $annee[0][0] .'\'');
	echo $countFmlArray[0][0];
?>
