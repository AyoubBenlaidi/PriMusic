<h3>Ajouter un atelier</h3>

<form method="post" action="/ajouter/ajouterAtelier.php">
		<label>Nom : </label>
		<input type="text" name="nom" />
		<input type="submit" value="Ajouter" />
</form>

<h3>Supprimer un atelier </h3>

<form method="post" action="/supprimer/supprimerAtelier.php">
		<label>Nom : </label>
		<select name="atl_id" id="atl_id">
		<?php
				for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $atelierArray[$i][0] ?>"><?php echo $atelierArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input type="submit" value="Supprimer"/>
</form>
