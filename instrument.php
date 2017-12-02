<h3>Ajouter un instrument</h3>

<form method="post" action="/ajouter/ajouterInstrument.php">
	<label>Nom : </label>
	<input type="text" name="instr_nom" />
	<input type="submit" value="Ajouter" />
</form>

<h3>Supprimer un instrument</h3>

<form method="post" action="/supprimer/supprimerInstrument.php">
		<label for="instr_id">Instrument : </label>
		<select name="instr_id" id="instr_id" >
		<?php
				for($i = 0, $size = count($instrArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $instrArray[$i][0] ?>"><?php echo $instrArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input type="submit" value="Supprimer"/>
</form>
