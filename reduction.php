<h3>Modifier une réduction</h3>
<?php 
include('Query.php');
  $reductionArray = databaseQuery("SELECT rdc_id, rdc_nom, rdc_valeur, rdc_type FROM reductions");

?>



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
	
	<input class="btn btn-primary" type="submit" value="Modifier" />
</form>
