<h3>Ajouter une formule</h3>

<form method="post" action="/ajouter/ajouterFormule.php" class="form-inline" >

<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nom" name="nom" placeholder="Nom"/>
<input type="float" class="form-control mb-2 mr-sm-2 mb-sm-0" id="soucieu" name="soucieu" placeholder="Tarif Soucieu"/>
<input type="float" class="form-control mb-2 mr-sm-2 mb-sm-0" id="autre" name="autre" placeholder="Tarif adulte ou ext"/>
<input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" id="num" name="num" placeholder="Numéro de la formule"/>


<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-top: 10px ;"type="submit" value="Ajouter" />

</form>

<h3>Modifier les tarifs d'une formule</h3>

<form method="post" action="/modifier/modifierFormule.php" class="form-inline">
		
		<select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="fml_id" id="fml_id">
		<option selected>Nom</option>
	<?php
		for($i = 0, $size = count($formuleArray); $i < $size; $i++) {
	?>
				<option value="<?php echo $formuleArray[$i][0] ?>"><?php echo $formuleArray[$i][2], ' : ', $formuleArray[$i][1] ?></option>
	   <?php
			}
	   ?>
			</select></br>
			<input type="float" class="form-control mb-2 mr-sm-2 mb-sm-0" id="soucieu" name="soucieu" placeholder="Tarif soucieu"/>
			
			
			</br>
			<input type="float" class="form-control mb-2 mr-sm-2 mb-sm-0" id="autre" name="autre" placeholder="Tarif adulte ou ext"/>
			
			<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Modifier" />

	</form>

<h3>Supprimer une formule</h3>

<form method="post" action="/supprimer/supprimerFormule.php" class="form-inline" >
	
	<select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="fml_id" id="fml_id">
	<option selected>Nom</option>	
		<?php
				for($i = 0, $size = count($formuleArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $formuleArray[$i][0] ?>"><?php echo $formuleArray[$i][2], ' : ', $formuleArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Supprimer"/>

</form>
