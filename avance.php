<?php 
include('Query.php');
$currentannee = databaseQuery('SELECT usr_annee FROM users WHERE usr_name = \'admin\'');
 
?>
<div class="row">
<div id="remiseAzero" class="col-6"  >
<h3>Tout remettre à zero </h3>

<form method="post" action="./supprimer/supprimerTout.php" class="form-inline">
<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="password" name="password" placeholder="Mot de passe"  />
	
		<input class="btn btn-danger" type="submit" value="Tout supprimer" />
</form>
</div>





<div id="modifierMdp" class="col-6"  >
<h3>Modifier mot de passe </h3>

<form method="post" action="./modifier/modifierMdp.php" >
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="login" name="login" placeholder="Login"  />
</br>
<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="oldpassword" name="oldpassword" placeholder="Ancien mot de passe"  />
</br>
<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="newpassword" name="newpassword" placeholder="Nouveau mot de passe"  />
</br>
<input type="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="newPasswordVerif" name="newPasswordVerif" placeholder="Confirmez le nouveau mot de passe"  />
	</br>
		<input class="btn btn-danger" type="submit" value="Modifier" />
</form>
</div>


<div id="modifierAnnee" class="col-6" >
<h3>Modifier année en cours </h3>

<form method="post" action="./modifier/modifierAnnee.php" class="form-inline">
<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="annee" name="annee" placeholder="" value="<?php echo($currentannee[0][0] ) ; ?>" />
	
		<input class="btn btn-primary" type="submit" value="Modifier" />
</form>
</div>


<div id="Extarc" class="col-6"  >
<h3>Extraction Excel </h3>

<form method="post" action="extractionExcel.php" class="form-inline">
	<input class="btn btn-success" type="submit" value="Extraire" />
</form>
</div>
</div>
