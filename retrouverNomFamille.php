<!DOCTYPE html>
<html>
    <head>
        <title>Retrouver famille</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css">
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<meta charset="utf-8" />

		<script type="text/javascript" src="scriptAdh.js"></script>
    </head>

    <body>

	<?php include("menu.php"); ?>
	<?php include("Query.php");
	$familleDataArray = databaseQuery("SELECT fml_id,fml_name, fml_mail, fml_phone, fml_address, fml_commune, fml_zip FROM famille WHERE fml_name LIKE '%".$_POST['nom']."%'");

	?>

		<div id="corps" class="container">
			<h2>Liste des familles dont le nom correspond à la recherche</h2>
			<table class="table table-striped">
				<tr>
					<th scope="col">Nom</th>
					<th scope="col">Mail</th>
					<th scope="col">Telephone</th>
					<th scope="col">Adresse</th>
					<th scope="col">Commune</th>
					<th scope="col">Code postal</th>
					<th scope="col">Action</th>
				</tr>
			<?php
				for($i = 0, $size = count($familleDataArray); $i < $size; $i++) {
			  ?>
					<tr>
						<td> <?php echo $familleDataArray[$i][1];?> </td>
						<td> <?php echo $familleDataArray[$i][2];?> </td>
						<td> <?php echo $familleDataArray[$i][3];?> </td>
						<td> <?php echo $familleDataArray[$i][4];?> </td>
						<td> <?php echo $familleDataArray[$i][5];?> </td>
						<td> <?php echo $familleDataArray[$i][6];?> </td>
						<td class="row">
							<form method="post" class="col-6" action="./formulaireFamilleAuto.php" id="formChoisir<?php echo $familleDataArray[$i][0];?>">
								<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
								<button type="button" famillenum="<?php echo $familleDataArray[$i][0];?>" class="btn btn-success buttonChoisir" title="Choisir"><i class="fa fa-check" aria-hidden="true"></i></button>
							</form>
							<form method="post" class="col-6" action="./supprimer/supprimerFamille.php" id="formSupprimer<?php echo $familleDataArray[$i][0];?>">
								<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
								<button type="button" famillenum="<?php echo $familleDataArray[$i][0];?>" class="btn btn-danger buttonSupprimer" title="Supprimer"><i class="fa fa-times" aria-hidden="true"></i></button>
							</form>
						</td>
					</tr>
			<?php
				}
		  ?>
		</div>
		
		<script type="text/javascript">
			$( document ).ready(function() {
				$(".buttonChoisir").on("click",function(){
					$("#formChoisir"+$(this).attr("famillenum")).submit();
				});
				$(".buttonSupprimer").on("click",function(){
					$("#formSupprimer"+$(this).attr("famillenum")).submit();
				});
			});
		</script>
		
		
    </body>
</html>
