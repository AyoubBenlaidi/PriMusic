<table class="table table-bordered table-striped " >

<tbody>
<?php 
/*
  for(  $i=0 ;$i< $_SESSION['nb_adh'] ; $i++){
	if ($_SESSION['adh_nom'.$i] != null) { 

$adh_prenom=$_SESSION['adh_prenom'.$i];
$adh_nom=$_SESSION['adh_nom'.$i];
$instr1 = databaseQuery('SELECT adh_instr1 FROM adherent WHERE adh_prenom = '.$adh_prenom.' AND adh_nom = '.$adh_nom.';' );
$prof1 =databaseQuery('SELECT adh_prof1 FROM adherent WHERE adh_prenom = '.$adh_prenom.' AND adh_nom = '.$adh_nom.';' );
$instr2=databaseQuery('SELECT adh_instr2 FROM adherent WHERE adh_prenom ='.$adh_prenom.' AND adh_nom = '.$adh_nom.';' );
$prof2=databaseQuery('SELECT adh_prof2 FROM adherent WHERE adh_prenom = '.$adh_prenom.' AND adh_nom = '.$adh_nom.';' );
$atl1=databaseQuery('SELECT adh_atelier1 FROM adherent WHERE adh_prenom = '.$adh_prenom.' AND adh_nom = '.$adh_nom.';' );
$atl2=databaseQuery('SELECT adh_atelier2 FROM adherent WHERE adh_prenom ='.$adh_prenom.' AND adh_nom = '.$adh_nom.';' );
$formation=databaseQuery('SELECT adh_formation FROM adherent WHERE adh_prenom ='.$adh_prenom.' AND adh_nom = '.$adh_nom.';' );


echo("*/
?>



<?php

 for(  $i=0 ;$i< $_SESSION['nb_adh'] ; $i++){
	if ($_SESSION['adh_nom'.$i] != NULL) { 
        echo("<tr>") ;
        echo(
            " <td> Nom :".     $_SESSION['adh_nom'.$i]  ."</td>"
         
         );  echo(
            " <td> Prenom :".     $_SESSION['adh_prenom'.$i] ."</td>" 
         ); 


        for($j = 0, $size = count($instrArray); $j < $size; $j++) {
          if($instrArray[$j][0] == $_SESSION['adh_instr1'.$i] ){
            
               
                echo(
                
               " <td> Instrument 1 :".     $instrArray[$j][1]  ."</td>"
			
            ); 
          }}
          
        for($j = 0, $size = count($instrArray); $j < $size; $j++) {
            if($instrArray[$j][0] == $_SESSION['adh_instr2'.$i] ){
                
              echo(
                 " <td> Instrument 2 :".     $instrArray[$j][1]  ."</td>"
              
              ); 
            }}
            for($j = 0, $size = count($profArray); $j < $size; $j++) {
                if($profArray[$j][0] == $_SESSION['adh_prof1'.$i] ){
                  
                  echo(
                     " <td> Professeur 1 :".     $profArray[$j][1]  ."</td>"
                  
                  ); 
                }}
        
                for($j = 0, $size = count($profArray); $j < $size; $j++) {
                    if($profArray[$j][0] == $_SESSION['adh_prof2'.$i] ){
                       
                      echo(
                          
                         " <td> Professeur 2 :".     $profArray[$j][1]  ."</td>"
                      
                      ); 
                    }}
                    for($j = 0, $size = count($atelierArray); $j < $size; $j++) {
                        if($atelierArray[$j][0] == $_SESSION['adh_atelier1'.$i] ){
                          
                          echo(
                             " <td> Atelier 1 :".     $atelierArray[$j][1]  ."</td>"
                          
                          ); 
                        }}
                        for($j = 0, $size = count($atelierArray); $j < $size; $j++) {
                            if($atelierArray[$j][0] == $_SESSION['adh_atelier2'.$i] ){
                              
                              echo(
                                 " <td> Atelier 2 :".     $atelierArray[$j][1]  ."</td>"
                              
                              ); 
                            }}
        
                            for($j = 0, $size = count($formationArray); $j < $size; $j++) {
                                if($formationArray[$j][0] == $_SESSION['adh_formation'.$i] ){
                                
                                  echo(
                                     " <td>Formation :".     $formationArray[$j][1]  ."</td>"
                                  
                                  ); 
                                }}
            
        
        
        }}
        ?>
 
</tr>
	</tbody>
</table>