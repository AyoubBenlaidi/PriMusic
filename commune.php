<h3>Ajouter une commune</h3>

<form method="post" action="/ajouter/ajouterCommune.php">
		<label>Nom : </label>
		<input type="text" name="nom" />
		<input type="submit" value="Ajouter" />
</form>

<h3>Supprimer une commune</h3>

<form method="post" action="/supprimer/supprimerCommune.php">
		<label>Nom : </label>
		<select name="cmn_id" id="cmn_id">
		<?php
				for($i = 0, $size = count($communeArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $communeArray[$i][0] ?>"><?php echo $communeArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input type="submit" value="Supprimer"/>
</form>
