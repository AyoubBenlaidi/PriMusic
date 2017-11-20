<!DOCTYPE html>
<html>
    <head>
        <title>Retrouver adhérents</title>
        <meta charset="utf-8" />
    </head>

    <body>

	<?php include("menu.php"); ?>
	<?php include("Query.php");
	$familleDataArray = databaseQuery('SELECT adh_id,adh_nom, adh_prenom, adh_age FROM adherent WHERE adh_fml=\'' . $_SESSION['fml_id'] .'\'');
	?>

		<div id="corps">
			<h2>Liste des adhérents de cette famille</h2>
			<table style="width:100%">
				<tr>
					<th>Numéro adhérent</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Date de naissance</th>
					<th></th>
				</tr>
			<?php
			$_SESSION['nb_adh'] = count($familleDataArray);
			for($i = 0, $size = count($familleDataArray); $i < $size; $i++) { ?>
			<tr>
				<td> <?php echo $familleDataArray[$i][0];?> </td>
				<td> <?php echo $familleDataArray[$i][1];?> </td>
				<td> <?php echo $familleDataArray[$i][2];?> </td>
				<td> <?php echo $familleDataArray[$i][3];?> </td>
				<td><form method="post" action="/formulaireAdherentAuto.php">
				<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
				<input type="submit" value="Modifier" /></form>
				<form method="post" action="/supprimer/supprimerAdherent.php">
				<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
				<input type="submit" value="Supprimer" /></form><br/></td>
			</tr>
			<?php }
		   ?>
		   <form method="post" action="/formulaireAdherentRevenir.php">
				<input type="submit" value="Ajouter nouveau" /></form>
				<form method="post" action="/formulairePaiement.php">
				<input type="submit" value="Valider et payer" id="payment2"/></form>
		</div>

    </body>
</html>
