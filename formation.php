<h3>Ajouter une formation musicale</h3>

<form method="post" action="/ajouter/ajouterFormation.php">
		<label>Nom : </label>
		<input type="text" name="nom" />
		<input type="submit" value="Ajouter" />
</form>

<h3>Supprimer une formation</h3>

<form method="post" action="/supprimer/supprimerFormation.php">
	<label>Nom : </label>
	<select name="fmt_id" id="fmt_id">
		<?php
				for($i = 0, $size = count($formationArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $formationArray[$i][0] ?>"><?php echo $formationArray[$i][1] ?></option>
		    <?php
				}
			?>
	</select>
	<input type="submit" value="Supprimer"/>
</form>
