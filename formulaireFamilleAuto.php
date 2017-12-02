<!DOCTYPE html>
<?php

	if(isset($_POST['supprimer'])){
		include("supprimer/supprimerFamille.php");
		header("refresh:1;url=/formulaireFamille.php");
		die();
	}

?>
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

	<?php
		include("menu.php");
		$currentArray = databaseQuery("SELECT fml_id, fml_name, fml_mail, fml_phone, fml_address, fml_commune, fml_zip FROM famille WHERE fml_id='" . $_POST['id'] . "'");
	?>
  <body>
    <h2>Formulaire</h2>
		<form method="post" action="/modifier/modifierFamille.php">
 			<div align="justify">
				<label>Id :</label> <input type="text" name="id" readonly="readonly" value="<?php echo $currentArray[0][0]; ?>"/> <br />
				<label>Nom :</label> <input type="text" name="nom" value="<?php echo $currentArray[0][1]; ?>"/> <br />
				<label>Mail :</label> <input type="text" name="mail" value="<?php echo $currentArray[0][2]; ?>"/> <br />
				<label>Téléphone :</label> <input type="text" name="telephone" value="<?php echo $currentArray[0][3]; ?>" /> <br />
				<label>Adresse :</label> <input type="text" name="adresse" value="<?php echo $currentArray[0][4]; ?>"/> <br />
				<label>Code postal :</label> <input type="text" name="code_postal" value="<?php echo $currentArray[0][6]; ?>"/> <br />
				<label>Commune :</label>
				<select name="cmn_id" id="cmn_id">

				<?php
					for($i = 0, $size = count($communeArray); $i < $size; $i++) {
				?>
						<option value="<?php echo $communeArray[$i][0]?>" <?php if($currentArray[0][5]==$communeArray[$i][0]){echo "selected";}?>><?php echo $communeArray[$i][1] ?></option>
   			<?php
   				}
   			?>
				</select>
				<br/>
				<label></label>
				<input type="submit" value = "Valider" />
			</div>
		</form>
  </body>
</html>
