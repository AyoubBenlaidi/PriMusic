<?php 
include('Query.php');
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$annee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
$nb_adh = databaseQuery('SELECT count(adh_id) as nb_adh FROM famille fml join adherent adh on adh.adh_fml = fml.fml_id WHERE fml_annee=\'' . $annee[0][0] .'\'');

$sql = "SELECT adh_id,adh_prenom,adh_nom,i.instr_nom,p.prof_prenom,p.prof_nom,ii.instr_nom,pp.prof_prenom,pp.prof_nom,
		a.atl_nom,aa.atl_nom,fmt_nom,adh_classe,adh_age,fml_mail,fml_phone,fml_address,cmn_zip,cmn_nom,adh_seul
		FROM adherent
		INNER JOIN famille ON adh_fml = fml_id
		LEFT OUTER JOIN instrument i ON i.instr_id = adh_instr1
		LEFT OUTER JOIN instrument ii ON ii.instr_id = adh_instr2
		LEFT OUTER JOIN professeur p ON p.prof_id = adh_prof1
		LEFT OUTER JOIN professeur pp ON pp.prof_id = adh_prof2
		LEFT OUTER JOIN atelier a ON a.atl_id = adh_atelier1
		LEFT OUTER JOIN atelier aa ON aa.atl_id = adh_atelier2
		LEFT OUTER JOIN formation ON fmt_id = adh_formation
		INNER JOIN commune ON cmn_id = fml_commune
		WHERE fml_annee = '".$annee[0][0]."'";
$donnees = databaseQuery($sql);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Titre et total d'adhérents
$sheet->setCellValue('A1', 'Adhérents '.$annee[0][0]);
$sheet->setCellValue('A2', $nb_adh[0][0].' adhérents');

// En-têtes du tableau
$sheet->setCellValue('B3', 'Adh');
$sheet->setCellValue('C3', 'Nom');
$sheet->setCellValue('D3', 'Instrument 1');
$sheet->setCellValue('E3', 'Prof 1');
$sheet->setCellValue('F3', 'Instrument 2');
$sheet->setCellValue('G3', 'Prof 2');
$sheet->setCellValue('H3', 'Atelier 1');
$sheet->setCellValue('I3', 'Atelier 2');
$sheet->setCellValue('J3', 'Solfège');
$sheet->setCellValue('K3', 'Classe');
$sheet->setCellValue('L3', 'Date Naissance');
$sheet->setCellValue('M3', 'Âge');
$sheet->setCellValue('N3', 'Mail');
$sheet->setCellValue('O3', 'Téléphone');
$sheet->setCellValue('Q3', 'Adresse');
$sheet->setCellValue('R3', 'CP');
$sheet->setCellValue('S3', 'Commune');
$sheet->setCellValue('U3', 'Rentre seul');

$dateActuelle = new DateTime();

foreach($donnees as $num_ln => $adherent){
	
	// calcul de l'age a partir de la date de naissance
	$age = $dateActuelle->diff(new DateTime($adherent[13]));

	$sheet->setCellValue('A'.($num_ln+4), $num_ln+1);
	$sheet->setCellValue('B'.($num_ln+4), $adherent[0]);	//adh_id
	$sheet->setCellValue('C'.($num_ln+4), $adherent[1].' '.$adherent[2]);	//adh_prenom adh_nom
	$sheet->setCellValue('D'.($num_ln+4), $adherent[3]);	//i.instr_nom
	$sheet->setCellValue('E'.($num_ln+4), $adherent[4].' '.$adherent[5]);	//p.prof_prenom p.prof_nom
	$sheet->setCellValue('F'.($num_ln+4), $adherent[6]);	//ii.instr_nom
	$sheet->setCellValue('G'.($num_ln+4), $adherent[7].' '.$adherent[8]);	//pp.prof_prenom pp.prof_nom
	$sheet->setCellValue('H'.($num_ln+4), $adherent[9]);	//a.atl_nom
	$sheet->setCellValue('I'.($num_ln+4), $adherent[10]);	//aa.atl_nom
	$sheet->setCellValue('J'.($num_ln+4), $adherent[11]);	//fmt_nom
	$sheet->setCellValue('K'.($num_ln+4), $adherent[12]);	//adh_classe
	$sheet->setCellValue('L'.($num_ln+4), $adherent[13]);	//adh_age
	$sheet->setCellValue('M'.($num_ln+4), $age->y);	//age calculé
	$sheet->setCellValue('N'.($num_ln+4), $adherent[14]);	//fml_mail
	$sheet->setCellValue('O'.($num_ln+4), $adherent[15]);	//fml_phone
	$sheet->setCellValue('Q'.($num_ln+4), $adherent[16]);	//fml_address
	$sheet->setCellValue('R'.($num_ln+4), $adherent[17]);	//cmn_zip
	$sheet->setCellValue('S'.($num_ln+4), $adherent[18]);	//cmn_nom
	$sheet->setCellValue('U'.($num_ln+4), $adherent[19]);	//adh_seul
}

// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Adherents_'.$annee[0][0].'.xls"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');

?>