<table class="table table-bordered table-striped " >

	<thead>
		<tr>
			<td>Nom</td>
			<td>Prénom</td>
			<td>Instrument 1</td>
			<td>Instrument 2</td>
			<td>Professeur 1</td>
			<td>Professeur 2</td>
			<td>Atelier 1</td>
			<td>Atelier 2</td>
			<td>Formation</td>
		</tr>
	</thead>

	<tbody>

	<?php
	
	$familleDataArray = databaseQuery('SELECT adh_nom, adh_prenom, adh_instr1, adh_prof1, adh_instr2, adh_prof2, adh_atelier1, adh_atelier2, adh_formation FROM adherent WHERE adh_fml=\'' . $_SESSION['fml_id'] .'\'');
	
	foreach($familleDataArray as $adh_nb => $adherent){
		echo("<tr>") ;
			echo("<td>".$adherent[0]."</td>");	//adh_nom
			echo("<td>".$adherent[1] ."</td>");	//adh_prenom
			$verif = 0;
			for($j = 0, $size = count($instrArray); $j < $size; $j++) {
				if($instrArray[$j][0] == $adherent[2] ){	//adh_instr1
					echo("<td>".$instrArray[$j][1]."</td>");
					$verif = 1;
				}
			}
			if($verif == 0){
				echo "<td></td>";
			}
			$verif = 0;
			for($j = 0, $size = count($profArray); $j < $size; $j++) {
				if($profArray[$j][0] == $adherent[3] ){	//adh_prof1
					echo("<td>".$profArray[$j][1]."</td>"); 
					$verif = 1;
				}
			}
			if($verif == 0){
				echo "<td></td>";
			}
			$verif = 0;
			for($j = 0, $size = count($instrArray); $j < $size; $j++) {
				if($instrArray[$j][0] == $adherent[4] ){	//adh_instr2
					echo("<td>".$instrArray[$j][1]."</td>"); 
					$verif = 1;
				}
			}
			if($verif == 0){
				echo "<td></td>";
			}
			$verif = 0;
			for($j = 0, $size = count($profArray); $j < $size; $j++) {
				if($profArray[$j][0] == $adherent[5] ){	//adh_prof2
					echo("<td>".$profArray[$j][1]."</td>"); 
					$verif = 1;
				}
			}
			if($verif == 0){
				echo "<td></td>";
			}
			$verif = 0;
			for($j = 0, $size = count($atelierArray); $j < $size; $j++) {
				if($atelierArray[$j][0] == $adherent[6] ){	//adh_atelier1
					echo("<td>".$atelierArray[$j][1]."</td>"); 
					$verif = 1;
				}
			}
			if($verif == 0){
				echo "<td></td>";
			}
			$verif = 0;
			for($j = 0, $size = count($atelierArray); $j < $size; $j++) {
				if($atelierArray[$j][0] == $adherent[7] ){	//adh_atelier2
					echo("<td>".$atelierArray[$j][1]."</td>"); 
					$verif = 1;
				}
			}
			if($verif == 0){
				echo "<td></td>";
			}
			$verif = 0;
			for($j = 0, $size = count($formationArray); $j < $size; $j++) {
				if($formationArray[$j][0] == $adherent[8] ){	//adh_formation
					echo("<td>".$formationArray[$j][1]."</td>"); 
					$verif = 1;
				}
			}
			if($verif == 0){
				echo "<td></td>";
			}
		echo("</tr>") ;
	}
	?>
	</tbody>
</table>