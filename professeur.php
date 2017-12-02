<h3>Ajouter un professeur</h3>

<form method="post" action="/ajouter/ajouterProfesseur.php" >
		<label>Prénom : </label>
		<input type="text" name="prenom" />
		<label>Nom : </label>
		<input type="text" name="nom" />
		<label>Instrument : </label>
		<select name="instr_id" id="instr_id">
			<?php
				for($i = 0, $size = count($instrArray); $i < $size; $i++) {
			?>
					<option value="<?php echo $instrArray[$i][0]; ?>"><?php echo $instrArray[$i][1]; ?></option>
			<?php
				}
			?>
			</select>
		<input type="submit" value="Ajouter"/>
</form>

<h3>Supprimer un professeur</h3>

<form method="post" action="/supprimer/supprimerProfesseur.php">
		<label>Nom : </label>
		<select name="prof_id" id="prof_id">
		<?php
				for($i = 0, $size = count($profArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $profArray[$i][0] ?>"><?php echo $profArray[$i][1], ' ', $profArray[$i][2] ?></option>
			<?php
				}
			?>
		</select>
		<input type="submit" value="Supprimer"/>
</form>
