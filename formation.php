<h3>Ajouter une formation musicale</h3>

<?php 
include('Query.php');
   $formationArray = databaseQuery("SELECT * FROM formation");
 
?>



<form method="post" action="./ajouter/ajouterFormation.php" class="form-inline">
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nom" name="nom" placeholder="Formation"/>

		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Ajouter" />
</form>

<h3>Supprimer une formation</h3>

<form method="post" action="./supprimer/supprimerFormation.php" class="form-inline" >
	
	<select  class="custom-select mb-2 mr-sm-2 mb-sm-0" name="fmt_id" id="fmt_id">
	<option selected>Formation </option>	
		<?php
				for($i = 0, $size = count($formationArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $formationArray[$i][0] ?>"><?php echo $formationArray[$i][1] ?></option>
		    <?php
				}
			?>
	</select>
	<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Supprimer"/>
</form>
