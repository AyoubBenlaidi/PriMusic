<h3>Modifier année en cours </h3>


<?php 
include('Query.php');
$currrentannee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
 
?>





<form method="post" action="./modifier/modifierAnnee.php" class="form-inline">
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="annee" name="annee" placeholder="" value="<?php echo($currrentannee[0][0] ) ; ?>" />
	
		<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Modifier" />
</form>

<h3>Tout remettre à zero </h3>

<form method="post" action="./supprimer/supprimerTout.php" class="form-inline">
<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="password" name="password" placeholder="Mot de passe"  />
	
		<input class="btn btn-danger " type="submit" value="Tout supprimer" />
</form>