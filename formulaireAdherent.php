<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter Adhérents</title>
		
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
		<?php include("menu.php"); ?>

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="formulaireFamille.php">Accueil</a></li>
				<li class="breadcrumb-item active"><a href="formulaireFamilleAuto.php">Famille</a></li>
				<li class="breadcrumb-item active" aria-current="page">Adhérents</li>
			</ol>
		</nav>
		
		<h2 style="text-align: center;">Membres de la famille <?php echo $_SESSION['fml_nom']; ?> </h2>
		<div class="container">
			<form class="form-horizontal" method="post" action="./ajouter/ajouterAdherent.php">
				<div class="row">
					<div id="membre1" class="form-group col-3">
						<?php include("addAdherent.php") ; ?>
					</div>
					<div id="membre2" class="form-group col-3">
						<?php include("addAdherent.php") ; ?>
					</div>
					<div id="membre3" class="form-group col-3">
						<?php include("addAdherent.php") ; ?>
					</div>
					<div id="membre4" class="form-group col-3">
						<?php include("addAdherent.php") ; ?>
					</div>
				</div>  
				<div class="form-group row">
					<div class="col-xs-offset-4 col-xs-8" style="display: inline-block;" >
						<div id="submit" >
							<input style="display: inline-block; " type="submit"  class="btn btn-info" name="finish" value="Valider" />
						</div>
					</div>
				</div>   
			</form>
		</div>
	</body>
</html>

<script>
$("document").ready(function(){
	$("#membre1 [id^='adh_']").each(function(){
		$(this).attr("id",$(this).attr("id")+"_1");
	});
	$("#membre2 [id^='adh_']").each(function(){
		$(this).attr("id",$(this).attr("id")+"_2");
	});
	$("#membre3 [id^='adh_']").each(function(){
		$(this).attr("id",$(this).attr("id")+"_3");
	});
	$("#membre4 [id^='adh_']").each(function(){
		$(this).attr("id",$(this).attr("id")+"_4");
	});
	
	$('#adh_instr1_1').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof1_1').html(option);
				}
			});
		} else{
			$('#adh_prof1_1').html("<option value=''></option>");
		}
	}).trigger( "change" );

	$('#adh_instr2_1').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof2_1').html(option);
				}
			});
		} else{
			$('#adh_prof2_1').html("<option value=''></option>");
		}
	}).trigger( "change" );

	$('#adh_instr1_2').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof1_2').html(option);
				}
			});
		} else{
			$('#adh_prof1_2').html("<option value=''></option>");
		}
	}).trigger( "change" );

	$('#adh_instr2_2').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof2_2').html(option);
				}
			});
		} else{
			$('#adh_prof2_2').html("<option value=''></option>");
		}
	}).trigger( "change" );

	$('#adh_instr1_3').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof1_3').html(option);
				}
			});
		} else{
			$('#adh_prof1_3').html("<option value=''></option>");
		}
	}).trigger( "change" );

	$('#adh_instr2_3').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof2_3').html(option);
				}
			});
		} else{
			$('#adh_prof2_3').html("<option value=''></option>");
		}
	}).trigger( "change" );

	$('#adh_instr1_4').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof1_4').html(option);
				}
			});
		} else{
			$('#adh_prof1_4').html("<option value=''></option>");
		}
	}).trigger( "change" );

	$('#adh_instr2_4').change(function(){
		var params = {
			action: "getProfByInstr",
			instr_id: $(this).val()
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
						option += '<option value="'+ data[i][0] + '">' + data[i][1] + ' ' + data[i][2] + '</option>';
					}
					$('#adh_prof2_4').html(option);
				}
			});
		} else{
			$('#adh_prof2_4').html("<option value=''></option>");
		}
	}).trigger( "change" );

	
});

</script>