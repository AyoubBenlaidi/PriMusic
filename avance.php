<?php 
include('Query.php');
$currentannee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
 
?>




<h3>Modifier année en cours </h3>

<form method="post" action="./modifier/modifierAnnee.php" class="form-inline">
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="annee" name="annee" placeholder="" value="<?php echo($currentannee[0][0] ) ; ?>" />
	
		<input class="btn btn-danger" type="submit" value="Modifier" />
</form>

<h3>Tout remettre à zero </h3>

<form method="post" action="./supprimer/supprimerTout.php" class="form-inline">
<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="password" name="password" placeholder="Mot de passe"  />
	
		<input class="btn btn-danger" type="submit" value="Tout supprimer" />
</form>

<h3>Extraction Excel </h3>

<form method="post" action="extractionExcel.php" class="form-inline">
	<input class="btn btn-success" type="submit" value="Extraire" />
</form>