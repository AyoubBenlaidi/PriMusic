<!DOCTYPE html>
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

    </head>
	<?php include("menu.php"); ?>
    <body>
 
	<div class="jumbotron">
<div id="RetrouverFamille"  >
	<h2 style="text-align: center;">Retrouver une famille déjà existante</h2>
		<form class="form-inline" style="margin-left:10% ;" method="post" action="./retrouverNomFamille.php">
		<div class="form-group" style="width:70% ; margin-right:15px ; ">
		<label for="nom" class="control-label"></label> 
		<div class="input-group" style="width:100% ; ">
		  <div class="input-group-addon">
			<i class="fa fa-search"></i>
		  </div> 
		  <input id="nom" name="nom" placeholder="Nom" type="text" class="form-control">
		</div>
	  </div> 
	  <div class="form-group">
		<button name="submit" type="submit" class="btn btn-primary">Valider</button>
	  </div>
		</form>
</div>



        <h2 style="text-align: center;">Ajouter famille</h2>

		<form method="post" action="./ajouter/ajouterFamille.php" style="width:70% ; margin-left:10% ;" >
	  
			<div class="form-group" >
				<label for="nom" class="control-label">Nom</label> 
				<div class="input-group">
				  <div class="input-group-addon">Nom</div> 
				  <input id="nom" name="nom" type="text" class="form-control">
				</div>
			  </div>
			  <div class="form-group">
			  <label for="mail" class="control-label">Mail</label> 
			  <div class="input-group">
				<div class="input-group-addon">
				  <i class="fa fa-envelope"></i>
				</div> 
				<input id="mail" name="mail" type="text" class="form-control">
			  </div>
			</div>
			  <div class="form-group">
				<label for="telephone" class="control-label">Téléphone</label> 
				<div class="input-group">
				  <div class="input-group-addon">
					<i class="fa fa-phone"></i>
				  </div> 
				  <input id="telephone" name="telephone" type="text" class="form-control">
				</div>
			  </div>
			  <div class="form-group">
				<label for="adresse" class="control-label">Adresse</label> 
				<div class="input-group">
				  <div class="input-group-addon">Adresse</div> 
				  <input id="adresse" name="adresse" type="text" class="form-control">
				</div>
			  </div>
			  <div class="form-group">
				<label for="code_postal" class="control-label">Code Postal</label> 
				<select id="code_postal" name="code_postal" class="select form-control">
					<?php
						for($i = 0, $size = count($zipArray); $i < $size; $i++) {
					?>
						<option value="<?php echo $zipArray[$i][0] ?>"><?php echo $zipArray[$i][0] ?></option>
					<?php
						}
					?>
				</select>
			  </div>
			  <div class="form-group">	
				<label for="cmn_id" class="control-label">Commune</label> 
				<select id="cmn_id" name="cmn_id" class="select form-control">
				</select>
			  </div> 
			  <div class="form-group">
				<button name="submit" type="submit" class="btn btn-primary">Valider</button>
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