<?php
include("Query.php");
require('/fpdf181/fpdf.php');
define('EURO',chr(128));

class PDF extends FPDF
{

  // Better table
  function familyTable($headerFamille, $dataFamille, $headerAdh, $dataAdh, $headerFml, $dataFml, $paiementArray)
  {
	$pcv = 0;
	$pl = 0;
	if(isset($_POST["cheque"]) and $_POST["cheque"] != ""){
		$pcv = $_POST["cheque"];
	}
	if(isset($_POST["liquide"]) and $_POST["liquide"] != ""){
		$pl = $_POST["liquide"];
	}
	  
    $this->SetFont('Arial','BU',15);
    // Move to the right
    $this->Cell(130);
    // Title
    $annee= databaseQuery("SELECT usr_annee FROM users WHERE usr_type='admin' ;" );
    $titre = "Inscription " . $annee[0][0];
    $this->Cell(30,10,$titre,0,0,'C');


   // $this->Cell(40, 7, 'Famille : ' . utf8_decode($dataFamille[0][0]),0,0,'C');

    $this->Ln(14);
 
    $this->SetFillColor(142, 162, 198);
    $fill = true;
    
    // Famille table
    $this->SetFont('Arial','B', 10);
  
    $this->Cell(30,7,"Nom de famille",1,0 ,'C',$fill );
    
    $this->Cell(50,7,utf8_decode($dataFamille[0][0]),1,0,'C');
    
    $this->Cell(30,7,utf8_decode("Téléphone"),1,0 ,'C',$fill );
    
    $this->Cell(40,7,utf8_decode($dataFamille[0][1]),1,0,'C');

    $this->Cell(30,7,"Adresse mail ",1,0 ,'C',$fill );
    
    $this->Cell(100,7,utf8_decode($dataFamille[0][5]),1,0,'C');


    $this->ln();
    $this->Cell(30,7,"Adresse",1,0 ,'C',$fill );
    
    $this->Cell(120,7,utf8_decode($dataFamille[0][2]),1,0,'C');

    $this->Cell(30,7,"Code Postal",1,0 ,'C',$fill );
    
    $this->Cell(20,7,utf8_decode($dataFamille[0][3]),1,0,'C');

    $this->Cell(30,7,"Commune",1,0 ,'C',$fill );
    
    $this->Cell(50 , 7,utf8_decode($dataFamille[0][4]),1,0,'C');



    

    $this->Ln(10);

    // Adherent Table

    $this->SetFont('Arial','B',10);
    $this->SetFillColor(142, 162, 198);
    $fill = true;
    $v = array();
    for($j=0;$j<13;$j++){
      array_push($v, 20);
    }
    $v[0] = 25;
    $v[1] = 35;
    $v[4] = 35;
    $v[5] = 15;
    $v[6] = 35;
    $v[7] = 15;
    $v[8] = 15;
    $v[10] = 20;
    $v[11] = 10;
    $v[12] = 15;
    for($i=0;$i<count($headerAdh);$i++){
      $this->Cell($v[$i],7,utf8_decode($headerAdh[$i]),1,0,'C',$fill);
    }
    $this->Ln();
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('','',10);
    $fill = false;

    for($i=0;$i<count($dataAdh);$i++){
      for($j=0;$j<count($headerAdh);$j++){
        $this->Cell($v[$j],6,utf8_decode($dataAdh[$i][$j]),'LR',0,'L',$fill);
      }
      $this->Ln();
      $fill = !$fill;
    }
    // Closing line
    $this->Cell(280,0,'','T');

    $this->ln(5);
   
    //Récapitulatif paiement
    $this->SetX(190 ); 
    $this->SetFillColor(142, 162, 198);
    $this->Cell(60, 6, 'Formules choisies', 1 , 0, '', true);
    $this->Cell(30, 6, $paiementArray[0].' '. EURO, 1, 1, 'C');
    if($paiementArray[1] > 0){
      $this->SetX(190 ); 
      $this->Cell(60,6, utf8_decode('Réduction'), 1 , 0, '', true);
      $this->Cell(30, 6, '-'.$paiementArray[1] .' '. EURO, 1, 1, 'C');
    }
    if($paiementArray[2] > 0) {
      $this->SetX(190 ); 
      $this->Cell(60, 6, 'Atelier choisis', 1 , 0, '', true);
      $this->Cell(30, 6 , $paiementArray[2] .' '.EURO,1,1,'C');
    }
    $this->SetX(190 ); 
    $this->Cell(60, 6 , utf8_decode('Adhésion'), 1 , 0, '', true);
    $this->Cell(30, 6, $paiementArray[4] .' '. EURO, 1 , 1, 'C');
    if($_SESSION['preinscription']){
      $this->SetX(190 ); 
      $this->Cell(60, 6,'Inscription avant le 01/07', 1 , 0, '', true);
      $this->Cell(30, 6, '-'.$paiementArray[3] .' '.EURO, 1,1,'C');
    }
    $this->SetX(190 ); 
    $this->Cell(60, 6 , utf8_decode('Total à payer '), 1 , 0, '', true);
    $this->Cell(30, 6, number_format($paiementArray[0] + $paiementArray[2] + $paiementArray[4] - $paiementArray[1] - $paiementArray[3], 2).' '.EURO,1,1,'C');
   

    $this->SetY(77) ;
    
    $this->SetFont('Arial','B',10);
    $this->SetFillColor(142, 162, 198);
    $fill = true;
    $w = [60, 60, 20, 30];
    
    for($i=0; $i<count($headerFml);$i++){
      $this->Cell($w[$i],7,utf8_decode($headerFml[$i]),1,0,'C',$fill);
    }

    $this->Ln();
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('','',10);
    $fill = false;

    foreach ($_SESSION['fml_array'] as $key => $value) {
      if($value > 0){
        $this->Cell(60, 6, $dataFml[$key][1], 'LR',0,'L',$fill);
        if($_SESSION['fml_commune'] == $_SESSION['commune_soucieu']) {
          $this->Cell(60, 6, 'Tarif Soucieu : '. $dataFml[$key][2] .' '.EURO,'LR',0,'L',$fill);
          $this->Cell(20, 6, $value,'LR',0,'C',$fill);
          $this->Cell(30, 6, $dataFml[$key][2]*$value.' '.EURO,'LR',0,'C',$fill);
        }
        else {
          $this->Cell(60, 6, 'Tarif adulte ou ext. : '. $dataFml[$key][3] .' '.EURO,'LR',0,'L',$fill);
          $this->Cell(20, 6, $value,'LR',0,'C',$fill);
          $this->Cell(30, 6, $dataFml[$key][3]*$value .' '.EURO,'LR',0,'C',$fill);
        }
        $this->Ln();
        $fill = !$fill;
      }
    }
    // Closing line
    $this->Cell(170,0,'','T');
    




    $totPay = $paiementArray[0] + $paiementArray[2] + $paiementArray[4] - $paiementArray[1] - $paiementArray[3] - $pcv - $pl ;
    $decimal = $totPay - intval($totPay);
   
    $this->SetY(135 ) ;
    // Tableau mois
    $this->SetFont('Arial','B',10);
   // $this->Cell(80, 6 , 'Paiement en ' . count($_POST['check_list']) . ' mois', 0, 1);
    $this->SetFont('','',10);
    for($i = 0 ; $i<count($_POST['check_list']) ; $i++){
      $this->Cell(22, 6 , utf8_decode($_POST['check_list'][$i]), 1, 0, '', true);
    }
    $this->Cell(30, 6, utf8_decode('Montant Chèques vacances'), 1, 0, '', true);
    $this->Cell(30, 6, 'Montant liquide', 1, 0, '', true);
    $this->Ln();
    for($i = 0 ; $i<count($_POST['check_list'])-1 ; $i++){
      $this->Cell(22, 6, variant_int($totPay / count($_POST['check_list'])) . ' ' . EURO,1,0,'C');
    }
    $this->Cell(22,6, ($totPay % count($_POST['check_list']))+variant_int($totPay / count($_POST['check_list']))+$decimal .' '. EURO, 1, 0, 'C');
    $this->Cell(30, 6, $pcv.' '.EURO, 1, 0, 'C');
    $this->Cell(30, 6, $pl.' '. EURO, 1, 0, 'C');

    $this->Ln(10);
    $this->SetFont('Arial','',10 );
    
    $engagement="je soussigné(e) ,              de(s) enfant(s) ci-dessus 

                    O autorise les personnes responsables de l'encadrement des élèves de l'école de musique à faire pratiquer les soins médicaux urgents constatés
                            par un médecin, que l'état de l'enfant désigné ci-dessus pourrait nécéssiter.

                    O autorise Mr ou Mme à prendre en charge mon enfant à la sortie des cours.
                    O autorise mon enfant à rentrer seul
                    O déclare venir chercher mon enfant à la sortie des cours
                    O autorise l'eventuelle publication dans les journaux locaux de photos de mon enfant prises lors des manifestations musicales
    
    J'ai pris connaissance du règlement intérieur et l'accepte.
    Le                                     à :                                                                       lu et approuvé                         signature :" ;
 //   $this->Cell(80, 6 ,utf8_decode($engagement) ,  0, 1);
    $this->MultiCell(0   , 3 , utf8_decode($engagement) ) ;

  }
  function createFacture($dataFamille, $paiementArray){

   
    $annee= databaseQuery("SELECT usr_annee FROM users WHERE usr_type='admin' ;" );
    $this->SetFont('Arial','B',25);
    $titre = "École de Musique César Geoffray";
    $this->Cell(0,10,utf8_decode($titre), 0, 0, 'C');
    $this->Ln(20);
    $this->SetFont('Arial','B',20);
    $this->Cell(0,8,"Facture Inscription " . $annee[0][0], 0, 0, 'C');
    $this->Ln(25);
    $this->SetFont('Arial','B',15);
    $this->Cell(50,7,utf8_decode($_POST['nom_facture']),0,0,'L');
    $this->Ln(20);

    $this->SetFont('Arial','',12);
    // Tableau de facture
    $this->SetX(40, false);
    $this->Cell(60, 8, 'Formules choisies', 1);
    $this->Cell(30, 8, $paiementArray[0] .' '. EURO, 1, 1, 'C');
    if($paiementArray[1] > 0){
      $this->SetX(40, false);
      $this->Cell(60,8, utf8_decode('Réduction'), 1);
      $this->Cell(30, 8, '-'.$paiementArray[1] .' '. EURO, 1, 1, 'C');
    }
    if($paiementArray[2] > 0) {
      $this->SetX(40, false);
      $this->Cell(60, 8, 'Atelier choisis', 1);
      $this->Cell(30, 8, $paiementArray[2] .' '.EURO,1,1,'C');
    }
    if($_SESSION['preinscription']){
      $this->SetX(40, false);
      $this->Cell(60, 8,'Inscription avant le 01/07', 1);
      $this->Cell(30, 8, '-'.$paiementArray[3] .' '.EURO, 1,1,'C');
    }
    $this->SetX(40, false);
    $this->Cell(60, 8, utf8_decode('Adhésion'), 1);
    $this->Cell(30, 8, $paiementArray[4] .' '. EURO, 1 , 1, 'C');
    $this->SetX(40, false);
    $this->Cell(60, 8, utf8_decode('Total à payer '), 1);
    $this->Cell(30, 8, number_format($paiementArray[0] + $paiementArray[2] + $paiementArray[4] - $paiementArray[1] - $paiementArray[3], 2).' '.EURO,1,1,'C');
    $this->Ln(25);
    //Bas de page
    $this->Cell(80);
    $this->Cell(60, 8, utf8_decode('Fait à Soucieu-en-Jarrest le '. date('d-m-Y')));
  }
  function Footer() {
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',7);
    // Print centered page number
    $this->Cell(0,10,utf8_decode('École de Musique César Geoffray - Place Étienne Morillon - 69510 Soucieu-en-Jarrest'),0,0,'C');
  }
}

// Column headings
$headerFamille = array("Téléphone", "Adresse", "CP", "Commune");
$headerAdh = array("Prénom", "Nom", "Date", "Instr 1", "Prof 1", "Inst 2", "Prof 2", "Atelier 1", "Atelier 2", "Formation", "Classe", "Seul", "Sexe");
$headerFml = array("Formule", "Tarif", "Nombre", "Total");


// Data loading
$id_fml = $_SESSION['fml_id'];
$dataFml = databaseQuery("SELECT * FROM formule");
$dataFamille = databaseQuery("SELECT fml_name, fml_phone, fml_address, cmn_zip, cmn_nom , fml_mail from famille JOIN commune ON fml_commune = cmn_id where fml_id ='" . $id_fml . "'");
$dataAdh = databaseQuery("select a.adh_prenom, a.adh_nom, a.adh_age, i1.instr_nom, p1.prof_prenom, p1.prof_nom, i2.instr_nom, p2.prof_prenom, p2.prof_nom, atl1.atl_nom, atl2.atl_nom,  fmt.fmt_nom, a.adh_classe, a.adh_seul, a.adh_sexe from famille f JOIN adherent a ON f.fml_id = a.adh_fml LEFT JOIN atelier atl1 ON a.adh_atelier1 = atl1.atl_id LEFT JOIN atelier atl2 ON a.adh_atelier2 = atl2.atl_id LEFT JOIN professeur p1 ON a.adh_prof1 = p1.prof_id LEFT JOIN professeur p2 ON a.adh_prof2 = p2.prof_id  LEFT JOIN instrument i1 ON a.adh_instr1 = i1.instr_id LEFT JOIN instrument i2 ON a.adh_instr2 = i2.instr_id LEFT JOIN formation fmt ON a.adh_formation = fmt.fmt_id LEFT JOIN commune c ON f.fml_commune = c.cmn_id WHERE f.fml_id ='".$id_fml."' ORDER BY f.fml_name");
foreach ($dataAdh as $key => $ligne)
{
  $ligne[4] = $ligne[4] . ' ' . $ligne[5];
  $ligne[7] = $ligne[7] . ' ' . $ligne[8];
  unset($ligne[5]);
  unset($ligne[8]);

  $dataAdh[$key] = array_values($ligne);
}

$paiementArray = array($somme16, $reduc16, $somme78, $reducPre, $tarif, $sommeFinale, $decimal);

$pdf = new PDF();
$pdf->AddPage('L');
$pdf->familyTable($headerFamille, $dataFamille, $headerAdh, $dataAdh, $headerFml, $dataFml, $paiementArray);
$pdf->AddPage('P');
$pdf->createFacture($dataFamille, $paiementArray);
ob_end_clean();
$pdf->Output('D', "Fiche Famille " . $dataFamille[0][0] .".pdf", true);
?>
