<!DOCTYPE html>
<?php

	if(isset($_POST['supprimer'])){
		include("supprimer/supprimerFamille.php");
		header("refresh:1;url=./formulaireFamille.php");
		die();
	}

?>
<html>
	<head>
		<title>Formulaire</title>
		
		<link rel="stylesheet" href="./ressources/bootstrap/css/bootstrap.min.css">
		<script src="./ressources/jquery-3.2.1.min.js"></script>
		<script src="./ressources/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="./ressources/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./ressources/MDL/material.min.css">
		<script defer src="./ressources/MDL/material.min.js"></script>

		<meta charset="utf-8" />

		<script type="text/javascript" src="scriptAdh.js"></script>
	</head>
	
	<body>
		
		<?php
			include("menu.php");
			
			if(isset($_POST["id"])){
				$_SESSION['fml_id'] = $_POST["id"];
			}
			$currentArray = databaseQuery("SELECT fml_id,fml_name, fml_mail, fml_phone, fml_address, cmn_nom, cmn_zip FROM famille INNER JOIN commune ON cmn_id = fml_commune WHERE fml_id='".$_SESSION['fml_id']."'");

		?>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="margin-bottom: 0;">
				<li class="breadcrumb-item active"><a href="formulaireFamille.php">Accueil</a></li>
				<li class="breadcrumb-item active" aria-current="page">Modification</li>
			</ol>
		</nav>
		<div class="container">
			<h2>Formulaire</h2>
			<form method="post" action="./modifier/modifierFamille.php">
				<input type="hidden" id="id" name="id" value="<?php echo $currentArray[0][0]; ?>"/>
				<div class="form-group row">
					<label class="control-label col-3">Nom :</label>
					<div class="col-9">
						<div class="input-group">
							<input type="text" class="form-control" name="nom" value="<?php echo $currentArray[0][1]; ?>"/>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Mail :</label>
					<div class="col-9">
						<div class="input-group">
							<input type="text" class="form-control" name="mail" value="<?php echo $currentArray[0][2]; ?>"/>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Téléphone :</label>
					<div class="col-9">
						<div class="input-group">
							<input type="text" class="form-control" name="telephone" value="<?php echo $currentArray[0][3]; ?>" />
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Adresse :</label>
					<div class="col-9">
						<div class="input-group">
							<input type="text" class="form-control" name="adresse" value="<?php echo $currentArray[0][4]; ?>"/>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Code postal :</label>
					<div class="col-9">
						<select id="code_postal" name="code_postal" class="select form-control">
						<?php
							for($i = 0, $size = count($zipArray); $i < $size; $i++) {
						?>
							<option value="<?php echo $zipArray[$i][0] ?>" <?php if($currentArray[0][6]==$zipArray[$i][0]){echo "selected";}?>><?php echo $zipArray[$i][0] ?></option>
						<?php
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label col-3">Commune :</label>
					<div class="col-9">
						<select name="cmn_id" id="cmn_id" class="select form-control">
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

<script>
$("document").ready(function(){
  $('#code_postal').change(function(){
    var params = {
      action: "getZip",
      zip: $(this).val()
    };
    if($(this).val() != ""){
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "AfficherListe.php",
        data: params,
        success: function(data) {
          var option = '';
          for (var i=0;i<data.length;i++){
            option += '<option value="'+ data[i][0] + '">' + data[i][1] + '</option>';
          }
          $('#cmn_id').html(option);
        }
      });
    } else{
      $('#cmn_id').html("<option value=''></option>");
    }
  }).trigger( "change" );
});
</script>
