<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <meta charset="utf-8" />

    </head>
	<?php include("menu.php"); ?>
    <body>
 
	<div class="jumbotron">
<div id="RetrouverFamille"  >
	<h2 style="text-align: center;">Retrouver une famille déjà existante</h2>
		<form class="form-inline" style="margin-left:10% ;" method="post" action="./retrouverNomFamille.php">
		<div class="form-group" style="width:70% ; margin-right:15px ; ">
		<label for="nom" class="control-label"></label> 
		<div class="input-group" style="width:100% ; ">
		  <div class="input-group-addon">
			<i class="fa fa-search"></i>
		  </div> 
		  <input id="nom" name="nom" placeholder="Nom" type="text" class="form-control">
		</div>
	  </div> 
	  <div class="form-group">
		<button name="submit" type="submit" class="btn btn-primary">Valider</button>
	  </div>
		</form>
</div>



        <h2 style="text-align: center;">Ajouter famille</h2>

		<form method="post" action="./ajouter/ajouterFamille.php" style="width:70% ; margin-left:10% ;" >
  
<div class="form-group" >
    <label for="nom" class="control-label">Nom</label> 
    <div class="input-group">
      <div class="input-group-addon">Nom</div> 
      <input id="nom" name="nom" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
  <label for="mail" class="control-label">Mail</label> 
  <div class="input-group">
	<div class="input-group-addon">
	  <i class="fa fa-envelope"></i>
	</div> 
	<input id="mail" name="mail" type="text" class="form-control">
  </div>
</div>
  <div class="form-group">
    <label for="telephone" class="control-label">Téléphone</label> 
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-phone"></i>
      </div> 
      <input id="telephone" name="telephone" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="adresse" class="control-label">Adresse</label> 
    <div class="input-group">
      <div class="input-group-addon">Adresse</div> 
      <input id="adresse" name="adresse" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="code_postal" class="control-label">Code Postal</label> 
    <select id="code_postal" name="code_postal" class="select form-control">
	<?php
    				for($i = 0, $size = count($zipArray); $i < $size; $i++) {
    		?>
    					<option value="<?php echo $zipArray[$i][0] ?>"><?php echo $zipArray[$i][0] ?></option>
    		    <?php
    				}
    			?>
	</select>
  </div>
  <div class="form-group">	
    <label for="cmn_id" class="control-label">Commune</label> 
    <select id="cmn_id" name="cmn_id" class="select form-control">
	<?php
    				for($i = 0, $size = count($communeArray); $i < $size; $i++) {
    		?>
    					<option value="<?php echo $communeArray[$i][0] ?>"><?php echo $communeArray[$i][1] ?></option>
    		    <?php
    				}
    			?>	
	</select>
  </div> 
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Valider</button>
  </div>

		</form>

		
</div>
    </body>
</html>
