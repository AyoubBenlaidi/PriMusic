<h3>Ajouter un atelier</h3>

<?php include('Query.php');
$atelierArray = databaseQuery("SELECT atl_id, atl_nom FROM atelier");
?>


<form method="post" action="./ajouter/ajouterAtelier.php" class="form-inline" >
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nom" name="nom" placeholder="Atelier"/>


		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Ajouter" />
</form>

<h3>Supprimer un atelier </h3>

<form method="post" action="./supprimer/supprimerAtelier.php">
		
		<select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="atl_id" id="atl_id">
		<option selected>Atelier</option>
		<?php
				for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
		?>
					<option value="<?php echo $atelierArray[$i][0] ?>"><?php echo $atelierArray[$i][1] ?></option>
		    <?php
				}
			?>
		</select>
		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Supprimer"/>
</form>
