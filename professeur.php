
<h3>Ajouter un professeur</h3>
<?php
include("Query.php");
 $instrArray = databaseQuery("SELECT instr_id, instr_nom FROM instrument");
 
 $profArray= databaseQuery("SELECT prof_id,prof_nom,prof_prenom FROM professeur")  ;
   $atelierArray = databaseQuery("SELECT atl_id, atl_nom FROM atelier");
	 $formuleArray = databaseQuery("SELECT fml_id, fml_nom, fml_num FROM formule");
	 $communeArray = databaseQuery("SELECT cmn_id,cmn_nom FROM commune");
	 $formationArray = databaseQuery("SELECT * FROM formation");
	 $reductionArray = databaseQuery("SELECT rdc_id, rdc_nom, rdc_valeur, rdc_type FROM reductions");


?>


<form method="post" action="./ajouter/ajouterProfesseur.php" class="form-inline" >
	<!--	<label class="sr-only" for="prenom" >Prénom : </label> -->
		<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="prenom" name="prenom" placeholder="Prénom"/>
		

	<!--	<label class="sr-only" for="nom">Nom : </label> -->
		<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nom" name="nom" placeholder="Nom" />
		<select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="instr_id" id="instr_id"  >
 
		<option selected>Instrument</option>
			<?php
				for($i = 0, $size = count($instrArray); $i < $size ; $i++) {
			?>
				<option value="<?php echo $instrArray[$i][0]; ?>"><?php  echo $instrArray[$i][1]; ?></option>	
			<?php
				}
			?>
	</select>

	<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Ajouter"/>

</form>

<h3>Supprimer un professeur</h3>

<form method="post" action="./supprimer/supprimerProfesseur.php">
<select class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="prof_id" id="prof_id"  >
	<option selected>Nom</option>
	<?php
	for($i = 0, $size = count($profArray); $i < $size; $i++) {
   ?>
		<option value="<?php echo $profArray[$i][0] ?>"><?php  echo $profArray[$i][1], ' ', $profArray[$i][2] ?></option>
	<?php
	}
	?>
 </select>
<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Supprimer"/>
		</form>
