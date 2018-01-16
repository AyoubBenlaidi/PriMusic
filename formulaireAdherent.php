<!DOCTYPE html>
<html>
<head>
	<title>Ajouter Adhérents</title>
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

<?php include("menu.php"); ?>

<body>
  <h2 style="text-align: center;">Membres de la famille <?php echo $_SESSION['fml_nom']; ?> </h2>
<div class="container">
	<form class="form-horizontal" method="post" action="/ajouter/ajouterAdherent.php">
		<div class="row">
			<div id="membre1" class="form-group col-4">
				<?php include("addAdherent.php") ; ?>
			</div>
			<div id="membre2" class="form-group col-4">
				<?php include("addAdherent.php") ; ?>
			</div>
			<div id="membre3" class="form-group col-4">
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