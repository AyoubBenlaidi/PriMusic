<h3>Modifier une réduction</h3>

<form method="post" action="modifier/modifierReduction.php" class="form-inline">
	
	<select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="rdc_id" id="rdc_id" >
	<option selected> Reduction </option>	
		<?php
			for($i = 0, $size = count($reductionArray); $i < $size; $i++) {
		?>
				<option value="<?php echo $reductionArray[$i][0] ?>"><?php echo $reductionArray[$i][1], ' : ',  $reductionArray[$i][2], $reductionArray[$i][3]?></option>
		<?php
			}
		?>
	</select><br>
	<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="valeur" name="valeur" placeholder="Nouvelle valeur"/>
	
	<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Modifier" />
</form>
