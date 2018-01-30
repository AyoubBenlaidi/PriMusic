<!DOCTYPE html>
<html>
	<head>
		<title>Insérer</title>
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
		<?php
		include("menu.php");
		$currentArray = databaseQuery("SELECT adh_id,adh_fml, adh_nom, adh_prenom, adh_age, adh_instr1, adh_prof1, adh_instr2, adh_prof2, adh_atelier1, adh_atelier2, adh_formation, adh_classe, adh_seul, adh_sexe FROM adherent WHERE adh_id='" . $_POST['id'] . "'");
		?>
		<div class="container">
			<h2>Modifier un adhérent</h2>
			<form method="post" action="./modifier/modifierAdherent.php">
				<input type="hidden"  readonly="readonly" name="adh_fml" value = "<?php echo $currentArray[0][1];?>"/> <br />
				<input type="hidden"  readonly="readonly" name="adh_id" value = "<?php echo $currentArray[0][0];?>"/> <br />
				<div class="form-group row">
					<label class="control-label col-3">Nom : </label>
					<div class="col-9">
						<div class="input-group">
							<input type="text" name="adh_nom" class="form-control" value = "<?php echo $currentArray[0][2];?>"/>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Prénom :</label>
					<div class="col-9">
						<div class="input-group">
							<input type="text" name="adh_prenom" class="form-control" value = "<?php echo $currentArray[0][3];?>"/>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Date de naissance : </label>
					<div class="col-9">
						<div class="input-group">
							<input type="date" name="adh_age" class="form-control" value = "<?php echo $currentArray[0][4];?>"/>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Sexe : </label>
					<div class="col-9">
						<select name="adh_sexe" id="adh_sexe" class="select form-control">
							<option value="homme" <?php if($currentArray[0][14]=="homme"){echo "selected";}?>>Homme</option>
							<option value="femme" <?php if($currentArray[0][14]=="femme"){echo "selected";}?>>Femme</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Instrument 1 : </label>
					<div class="col-9">
						<select name="adh_instr1" id="adh_instr1" class="select form-control">
							<?php
							for($i = 0, $size = count($instrArray); $i < $size; $i++) {
							?>
							<option value="<?php echo $instrArray[$i][0] ?>" <?php if($currentArray[0][5]==$instrArray[$i][0]){echo "selected";}?>><?php echo $instrArray[$i][1] ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Professeur 1 : </label>
					<div class="col-9">
						<select name="adh_prof1" id="adh_prof1" class="select form-control">
							<option value=""></option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Instrument 2 : </label>
					<div class="col-9">
						<select name="adh_instr2" id="adh_instr2" class="select form-control">
							<option value=""></option>
							<?php
							for($i = 0, $size = count($instrArray); $i < $size; $i++) {
							?>
							<option value="<?php echo $instrArray[$i][0] ?>" <?php if($currentArray[0][7]==$instrArray[$i][0]){echo "selected";}?>><?php echo $instrArray[$i][1] ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Professeur 2 : </label>
					<div class="col-9">
						<select name="adh_prof2" id="adh_prof2" class="select form-control">
							<option value=""></option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Atelier 1 : </label>
					<div class="col-9">
						<select name="adh_atelier1" id="adh_atelier1" class="select form-control">
							<option value=""></option>
							<?php
							for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
							?>
							<option value="<?php echo $atelierArray[$i][0] ?>" <?php if($currentArray[0][9]==$atelierArray[$i][0]){echo "selected";}?>><?php echo $atelierArray[$i][1] ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Atelier 2 : </label>
					<div class="col-9">
						<select name="adh_atelier2" id="adh_atelier2" class="select form-control">
							<option value=""></option>
							<?php
							for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
							?>
							<option value="<?php echo $atelierArray[$i][0] ?>" <?php if($currentArray[0][10]==$atelierArray[$i][0]){echo "selected";}?>><?php echo $atelierArray[$i][1] ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Classe solfège : </label>
					<div class="col-9">
						<select name="adh_formation" id="adh_formation" class="select form-control">
							<option value=""></option>
							<?php
							for($i = 0, $size = count($formationArray); $i < $size; $i++) {
							?>
							<option value="<?php echo $formationArray[$i][0] ?>" <?php if($currentArray[0][11]==$formationArray[$i][0]){echo "selected";}?>><?php echo $formationArray[$i][1] ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-3">Classe : </label>
					<div class="col-9">
						<select id="adh_classe" name="adh_classe" class="select form-control">
							<option value="CP" <?php if($currentArray[0][12]=="CP"){echo "selected";}?>>CP</option>
							<option value="CE1" <?php if($currentArray[0][12]=="CE1"){echo "selected";}?>>CE1</option>
							<option value="CE2" <?php if($currentArray[0][12]=="CE2"){echo "selected";}?>>CE2</option>
							<option value="CM1" <?php if($currentArray[0][12]=="CM1"){echo "selected";}?>>CM1</option>
							<option value="CM2" <?php if($currentArray[0][12]=="CM2"){echo "selected";}?>>CM2</option>
							<option value="6e" <?php if($currentArray[0][12]=="6e"){echo "selected";}?>>6e</option>
							<option value="5e" <?php if($currentArray[0][12]=="5e"){echo "selected";}?>>5e</option>
							<option value="4e" <?php if($currentArray[0][12]=="4e"){echo "selected";}?>>4e</option>
							<option value="3e" <?php if($currentArray[0][12]=="3e"){echo "selected";}?>>3e</option>
							<option value="2nd" <?php if($currentArray[0][12]=="2nd"){echo "selected";}?>>2nd</option>
							<option value="1ere" <?php if($currentArray[0][12]=="1ere"){echo "selected";}?>>1ere</option>
							<option value="Terminale" <?php if($currentArray[0][12]=="Terminale"){echo "selected";}?>>Terminale</option>
							<option value="Adulte" <?php if($currentArray[0][12]=="Adulte"){echo "selected";}?>>Adulte</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Rentre seul : </label>
					<div class="col-9">
						<select name="adh_seul" id="adh_seul" class="select form-control">
							<option value="oui" <?php if($currentArray[0][13]=="oui"){echo "selected";}?>>Oui</option>
							<option value="non" <?php if($currentArray[0][13]=="non"){echo "selected";}?>>Non</option>
						</select>
					</div>
				</div>
				
				<div class="form-group row">
					<input type="submit"  class="btn btn-primary btn-block" value = "Valider" />
				</div>   
			</form>
		</div>
	</body>
</html>
