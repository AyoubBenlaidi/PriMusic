<?php
include("Query.php");
	$profArray = databaseQuery("SELECT prof_id,prof_nom,prof_prenom FROM professeur");
	$instrArray = databaseQuery("SELECT instr_id, instr_nom FROM instrument");
	$atelierArray = databaseQuery("SELECT atl_id, atl_nom FROM atelier");
	$formuleArray = databaseQuery("SELECT fml_id, fml_nom, fml_num FROM formule");
	$communeArray = databaseQuery("SELECT cmn_id,cmn_nom FROM commune");
	$formationArray = databaseQuery("SELECT * FROM formation");
	$reductionArray = databaseQuery("SELECT rdc_id, rdc_nom, rdc_valeur, rdc_type FROM reductions");
	if (isset($_SESSION['user'])) {
		if(($_SESSION['user']!='admin')){
		echo "Vous n'êtes pas autorisé à voir ce contenu !";
			header("refresh:1;url=/index.php");
			die();
	}
	}else{
		echo "Vous devez vous connecter !";
			header("refresh:1;url=/index.php");
			die();
	}
	$currentPage = basename("/{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", ".php");
	switch ($currentPage) {
			case "administration":
				$activeAdmin = 'class="active"';
				$activeEditer="";
				$activeForm="";
				break;
			default:
				$activeForm = "";
				$activeEditer="";
				$activeAdmin='class="active"';
	}
    ?>