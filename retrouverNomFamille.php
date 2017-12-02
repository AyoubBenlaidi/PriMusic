<!DOCTYPE html>
<html>
    <head>
        <title>Retrouver famille</title>
        <meta charset="utf-8" />
    </head>

    <body>

	<?php include("menu.php"); ?>
	<?php include("Query.php");
	$familleDataArray = databaseQuery("SELECT fml_id,fml_name, fml_mail, fml_phone, fml_address, fml_commune, fml_zip FROM famille WHERE fml_name LIKE '%".$_POST['nom']."%'");

	?>

		<div id="corps">
			<h2>Liste des familles dont le nom correspond à la recherche</h2>
			<table style="width:100%">
				<tr>
					<th>Numéro famille</th>
					<th>Nom</th>
					<th>Mail</th>
					<th>Telephone</th>
					<th>Adresse</th>
					<th>Commune</th>
					<th>Code postal</th>
					<th></th>
				</tr>
			<?php
			  for($i = 0, $size = count($familleDataArray); $i < $size; $i++) {
      ?>
  			<tr>
  				<td> <?php echo $familleDataArray[$i][0];?> </td>
  				<td> <?php echo $familleDataArray[$i][1];?> </td>
  				<td> <?php echo $familleDataArray[$i][2];?> </td>
  				<td> <?php echo $familleDataArray[$i][3];?> </td>
  				<td> <?php echo $familleDataArray[$i][4];?> </td>
  				<td> <?php echo $familleDataArray[$i][5];?> </td>
  				<td> <?php echo $familleDataArray[$i][6];?> </td>
  				<td><form method="post" action="/formulaireFamilleAuto.php">
  				<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
  				<input type="submit" value="Choisir" /><br/>
  				<form method="post" action="/supprimer/supprimerFamille.php">
  				<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
  				<input type="submit" name="supprimer" value="Supprimer" /></form></td>
  			</tr>
			<?php
        }
		  ?>
		</div>
    </body>
</html>
