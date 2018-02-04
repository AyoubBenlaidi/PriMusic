<!DOCTYPE html>
<html>
    <head>
        <title>Retrouver adhérents</title>
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
		if(isset($_POST["id"])){
			$familleDataArray = databaseQuery('SELECT adh_id,adh_nom, adh_prenom, adh_age FROM adherent WHERE adh_fml=\'' . $_POST['id'] .'\'');
		}
		else{
			$familleDataArray = databaseQuery('SELECT adh_id,adh_nom, adh_prenom, adh_age FROM adherent WHERE adh_fml=\'' . $_SESSION['fml_id'] .'\'');
		}
		?>

		<div class="container">
			<div id="corps">
				<h2>Liste des adhérents de cette famille</h2>
				<div class="row">
					<form method="post" action="./formulaireAdherent.php" class="col-2">
						<input type="submit" value="Ajouter nouveau" class="btn btn-primary" />
					</form>
					<form method="post" action="./formulairePaiement.php" class="col-2">
						<input type="submit" value="Valider et payer" id="payment2" class="btn btn-success" />
					</form>
				</div>
				<br>
				<div class="row">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Nom</th>
								<th scope="col">Prénom</th>
								<th scope="col">Date de naissance</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$_SESSION['nb_adh'] = count($familleDataArray);
						for($i = 0, $size = count($familleDataArray); $i < $size; $i++) { ?>
							<tr>
								<td> <?php echo $familleDataArray[$i][1];?> </td>
								<td> <?php echo $familleDataArray[$i][2];?> </td>
								<td> <?php echo $familleDataArray[$i][3];?> </td>
								<td class="row">
									<form method="post" class="col-6" action="./formulaireAdherentAuto.php" id="formModifier<?php echo $familleDataArray[$i][0];?>">
										<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
										<button type="button" famillenum="<?php echo $familleDataArray[$i][0];?>" class="btn btn-primary buttonModifier" title="Modifier"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									</form>
									<form method="post" class="col-6" action="./supprimer/supprimerAdherent.php" id="formSupprimer<?php echo $familleDataArray[$i][0];?>">
										<input type='hidden' name='id' value="<?php echo $familleDataArray[$i][0];?>" />
										<button type="button" famillenum="<?php echo $familleDataArray[$i][0];?>" class="btn btn-danger buttonSupprimer" title="Supprimer"><i class="fa fa-times" aria-hidden="true"></i></button>
									</form>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
			   </div>
			</div>
		</div>

		<script type="text/javascript">
			$( document ).ready(function() {
				$(".buttonModifier").on("click",function(){
					$("#formModifier"+$(this).attr("famillenum")).submit();
				});
				$(".buttonSupprimer").on("click",function(){
					$("#formSupprimer"+$(this).attr("famillenum")).submit();
				});
			});
		</script>
		
    </body>
</html>
