<h3>Ajouter un instrument</h3>

<form method="post" action="/ajouter/ajouterInstrument.php" class="form-inline" >
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="instr_nom" name="instr_nom" placeholder="Nom de l'instrument"/>
		
	
	<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Ajouter" />
</form>

<h3>Supprimer un instrument</h3>

<form method="post" action="/supprimer/supprimerInstrument.php">
		
		<select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="instr_id" id="instr_id" >
		<option selected>Instrument</option>
		<?php
				for($i = 0, $size = count($instrArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $instrArray[$i][0] ?>"><?php echo $instrArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Supprimer"/>
</form>
