<h3>Ajouter une formule</h3>

<form method="post" action="/ajouter/ajouterFormule.php">

		<label>Nom : </label>
		<input type="text" name="nom" />
		<label>Tarif Soucieu : </label>
		<input type="float" name="soucieu" />
		<label>Tarif adulte ou ext : </label>
		<input type="float" name="autre" />
		<label>Numéro de la formule : </label>
		<input type="number" name="num" />

		<input type="submit" value="Ajouter" />

</form>

<h3>Modifier les tarifs d'une formule</h3>

<form method="post" action="/modifier/modifierFormule.php">
		<label>Nom : </label>
		<select name="fml_id" id="fml_id">
	<?php
		for($i = 0, $size = count($formuleArray); $i < $size; $i++) {
	?>
				<option value="<?php echo $formuleArray[$i][0] ?>"><?php echo $formuleArray[$i][2], ' : ', $formuleArray[$i][1] ?></option>
	   <?php
			}
	   ?>
			</select></br>
			<label>Tarif Soucieu : </label>
			<input type="float" name="soucieu" /></br>
			<label>Tarif adulte ou ext : </label>
			<input type="float" name="autre" />

			<input type="submit" value="Modifier" />

	</form>

<h3>Supprimer une formule</h3>

<form method="post" action="/supprimer/supprimerFormule.php">
	<label>Nom : </label>
	<select name="fml_id" id="fml_id">
		<?php
				for($i = 0, $size = count($formuleArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $formuleArray[$i][0] ?>"><?php echo $formuleArray[$i][2], ' : ', $formuleArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input type="submit" value="Supprimer"/>

</form>
