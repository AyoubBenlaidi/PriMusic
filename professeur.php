
<h3>Ajouter un professeur</h3>
<form method="post" action="/ajouter/ajouterProfesseur.php" class="form-inline" >
	<!--	<label class="sr-only" for="prenom" >Prénom : </label> -->
		<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="prenom" name="prenom" placeholder="Prénom"/>
		

	<!--	<label class="sr-only" for="nom">Nom : </label> -->
		<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nom" name="nom" placeholder="Nom" />
		<div class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="instr_id" id="instr_id"  >
 
		<option selected>Instrument</option>
  <?php
		//		for($i = 1, $size = count($instrArray)+1; $i < $size; $i++) {
			?>
	 <option value="<?php // echo $instrArray[$i][0]; ?>"><?php  //echo $instrArray[$i][1]; ?></option>	
			<?php
		//		}
			?>

   
 
  </div>



		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Ajouter"/>

</form>

<h3>Supprimer un professeur</h3>

<form method="post" action="/supprimer/supprimerProfesseur.php">
<div class="custom-select mb-2 mr-sm-2 mb-sm-0"  name="instr_id" id="instr_id"  >

	   <option selected>Nom</option>
 <?php
	   //		for($i = 1, $size = count($profArray)+1; $i < $size; $i++) {
		   ?>
	<option value="<?php //echo $profArray[$i][0] ?>"><?php // echo $profArray[$i][1], ' ', $profArray[$i][2] ?></option>
	<?php
	   //		}
		   ?>

  

 </div>

		</form>
