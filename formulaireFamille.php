<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="utf-8" />
		<style>
label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: right;
	margin-bottom: 5px;
}
input, select {
  display: inline-block;
  float: left;
}

</style>
    </head>
	<?php include("menu.php"); ?>
    <body>
        <h2>Formulaire</h2>

		<form method="post" action="/ajouter/ajouterFamille.php">
      <div align="justify">
			<p>
				<label>Nom : </label><input type="text" name="nom" /> <br />
				<label>Mail : </label><input type="text" name="mail" /> <br />
				<label>Téléphone : </label><input type="text" name="telephone" /> <br />
				<label>Adresse : </label><input type="text" name="adresse" /> <br />
				<label>Code postal : </label><input type="text" name="code_postal" /> <br />
        <label>Commune : </label>
    		<select name="cmn_id" id="cmn_id">
    		<?php
    				for($i = 0, $size = count($communeArray); $i < $size; $i++) {
    		?>
    					<option value="<?php echo $communeArray[$i][0] ?>"><?php echo $communeArray[$i][1] ?></option>
    		    <?php
    				}
    			?>
    		</select> <br /><br/>
			<label></label>
				<input type="submit" value = "Valider" id="valider" />
				<br/>
				<br/>
			</p>
			</div>

		</form>

		<h2>Retrouver une famille déjà existante</h2>
		<form method="post" action="/retrouverNomFamille.php">
      <div >
        <label>Nom : </label>
        <input type="text" name="nom" id="findFml"/> <br />
        <label></label>
        <input type="submit" value = "Valider" />
      </div>
		</form>

    </body>
</html>
