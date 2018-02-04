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
			
			$currentArray = databaseQuery("SELECT fml_id,fml_name, fml_mail, fml_phone, fml_address, cmn_nom, cmn_zip FROM famille INNER JOIN commune ON cmn_id = fml_commune WHERE fml_id='" . $_POST['id'] . "'");

		?>
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
