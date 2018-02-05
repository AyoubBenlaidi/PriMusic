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
	
	for(  $i=0 ;$i< $_SESSION['nb_adh'] ; $i++){
		if ($_SESSION['adh_nom'.$i] != NULL) { 
			echo("<tr>") ;
				echo("<td>".$_SESSION['adh_nom'.$i]."</td>"); 
				echo("<td>".$_SESSION['adh_prenom'.$i] ."</td>");
				$verif = 0;
				for($j = 0, $size = count($instrArray); $j < $size; $j++) {
					if($instrArray[$j][0] == $_SESSION['adh_instr1'.$i] ){
						echo("<td>".$instrArray[$j][1]."</td>");
						$verif = 1;
					}
				}
				if($verif == 0){
					echo "<td></td>";
				}
				$verif = 0;
				for($j = 0, $size = count($instrArray); $j < $size; $j++) {
					if($instrArray[$j][0] == $_SESSION['adh_instr2'.$i] ){
						echo("<td>".$instrArray[$j][1]."</td>"); 
						$verif = 1;
					}
				}
				if($verif == 0){
					echo "<td></td>";
				}
				$verif = 0;
				for($j = 0, $size = count($profArray); $j < $size; $j++) {
					if($profArray[$j][0] == $_SESSION['adh_prof1'.$i] ){
						echo("<td>".$profArray[$j][1]."</td>"); 
						$verif = 1;
					}
				}
				if($verif == 0){
					echo "<td></td>";
				}
				$verif = 0;
				for($j = 0, $size = count($profArray); $j < $size; $j++) {
					if($profArray[$j][0] == $_SESSION['adh_prof2'.$i] ){
						echo(" <td>".$profArray[$j][1]."</td>"); 
						$verif = 1;
					}
				}
				if($verif == 0){
					echo "<td></td>";
				}
				$verif = 0;
				for($j = 0, $size = count($atelierArray); $j < $size; $j++) {
					if($atelierArray[$j][0] == $_SESSION['adh_atelier1'.$i] ){
						echo("<td>".$atelierArray[$j][1]."</td>"); 
						$verif = 1;
					}
				}
				if($verif == 0){
					echo "<td></td>";
				}
				$verif = 0;
				for($j = 0, $size = count($atelierArray); $j < $size; $j++) {
					if($atelierArray[$j][0] == $_SESSION['adh_atelier2'.$i] ){
						echo("<td>".$atelierArray[$j][1]."</td>"); 
						$verif = 1;
					}
				}
				if($verif == 0){
					echo "<td></td>";
				}
				$verif = 0;
				for($j = 0, $size = count($formationArray); $j < $size; $j++) {
					if($formationArray[$j][0] == $_SESSION['adh_formation'.$i] ){
						echo("<td>".$formationArray[$j][1]."</td>"); 
						$verif = 1;
					}
				}
				if($verif == 0){
					echo "<td></td>";
				}
			echo("</tr>") ;
		}
	}
	?>
	</tbody>
</table>