<h3>Ajouter une commune</h3>


<?php 
include('Query.php');
  $communeArray = databaseQuery("SELECT cmn_id,cmn_nom FROM commune");
 
?>





<form method="post" action="/ajouter/ajouterCommune.php" class="form-inline">
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nom" name="nom" placeholder="Commune"/>
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="zip" name="zip" placeholder="Code postal"/>
			
		
		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Ajouter" />
</form>

<h3>Supprimer une commune</h3>

<form method="post" action="/supprimer/supprimerCommune.php" class="form-inline" >
	
		<select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="cmn_id" id="cmn_id">
		<option selected>Commune </option>
		<?php
				for($i = 0, $size = count($communeArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $communeArray[$i][0] ?>"><?php echo $communeArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Supprimer"/>
</form>
