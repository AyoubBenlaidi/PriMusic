<?php
	include("menu.php");
	$instrArray = databaseQuery("SELECT * FROM instrument");
	$profArray = databaseQuery("SELECT prof_id, prof_nom, prof_prenom FROM professeur");
	$formationArray = databaseQuery("SELECT * FROM formation");
	$atelierArray = databaseQuery("SELECT atl_id, atl_nom FROM atelier");
?>

<html>
	<head>
		<style>
				table {
					border-collapse: collapse;
					width:100%;
				}

				th, td {
					padding: 8px;
					text-align: left;
					border-bottom: 1px solid #ddd;
				}

				tr:hover{background-color: #aaf5f1}

				h1 {
					text-align: center;
					text-decoration: underline;
				}

				b {
					color: blue;
					font-size: 110%;
				}
		</style>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	<body>
		<h1 text-align:center>Afficher et exporter des listes d'adhérents</h1>
		<br>
			<select name="instr_id" id="instr_id">
				<option value="">Sélectionner un instrument :</option>
				<?php
					for($i = 0, $size = count($instrArray); $i < $size; $i++) {
				?>
						<option value="<?php echo $instrArray[$i][0] ?>"><?php echo $instrArray[$i][1] ?></option>
				<?php
					}
				?>
			</select>

			<select name="prof_id" id="prof_id">
				<option value="">Sélectionner un professeur :</option>
				<?php
					for($i = 0, $size = count($profArray); $i < $size; $i++) {
				?>
						<option value="<?php echo $profArray[$i][0] ?>"><?php echo $profArray[$i][1], ' ', $profArray[$i][2] ?></option>
				<?php
					}
				?>
			</select>

			<select name="fmt_id" id="fmt_id">
				<option value="">Sélectionner une formation :</option>
				<?php
					for($i = 0, $size = count($formationArray); $i < $size; $i++) {
				?>
						<option value="<?php echo $formationArray[$i][0] ?>"><?php echo $formationArray[$i][1] ?></option>
				<?php
					}
				?>
			</select>

			<select name="atl_id" id="atl_id">
				<option value="">Sélectionner un atelier :</option>
				<?php
					for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
				?>
						<option value="<?php echo $atelierArray[$i][0] ?>"><?php echo $atelierArray[$i][1] ?></option>
				<?php
					}
				?>
			</select>

			<select name="cmn_id" id="cmn_id">
				<option value="">Sélectionner une commune :</option>
				<?php
					for($i = 0, $size = count($communeArray); $i < $size; $i++) {
				?>
						<option value="<?php echo $communeArray[$i][0] ?>"><?php echo $communeArray[$i][1] ?></option>
				<?php
					}
				?>
			</select>

			<select name="divers" id="divers">
				<option value="">Extractions diverses : </option>
				<option value="1">Tous les adhérents</option>
				<option value="2">Toutes les familles</option>
				<option value="3">Adhérents -18 ans</option>
				<option value="4">Adhérents -18 ans Jarréziens</option>
				<option value="5">Homme</option>
				<option value="6">Femme</option>
			</select>

		<br>
		<div id="showInstr"></div>
		<button type='button' id='instrButton'>Exporter en CSV</button>
		<div id="showProf"></div>
		<button type='button' id='profButton'>Exporter en CSV</button>
		<div id="showFormation"></div>
		<button type='button' id='formationButton'>Exporter en CSV</button>
		<div id="showAtelier"></div>
		<button type='button' id='atelierButton'>Exporter en CSV</button>
		<div id="showCommune"></div>
		<button type='button' id='communeButton'>Exporter en CSV</button>
		<div id="showDivers"></div>
		<button type='button' id='diversButton'>Exporter en CSV</button>


		<script type="text/javascript" src="script.js"></script>

	</body>
</html>
