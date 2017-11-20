<h3>Modifier une réduction</h3>

<form method="post" action="modifier/modifierReduction.php">
	<label>Réduction : </label>
	<select name="rdc_id" id="rdc_id" >
		<?php
			for($i = 0, $size = count($reductionArray); $i < $size; $i++) {
		?>
				<option value="<?php echo $reductionArray[$i][0] ?>"><?php echo $reductionArray[$i][1], ' : ',  $reductionArray[$i][2], $reductionArray[$i][3]?></option>
		<?php
			}
		?>
	</select><br>
	<label>Nouvelle valeur : </label>
	<input type="float" name="valeur" /></br>
	<input type="submit" value="Modifier" />
</form>
