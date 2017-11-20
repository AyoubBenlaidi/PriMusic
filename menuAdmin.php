<?php session_start(); ?>
<?php
	include("Query.php");
	$profArray = databaseQuery("SELECT prof_id,prof_nom,prof_prenom FROM professeur");
	$instrArray = databaseQuery("SELECT instr_id, instr_nom FROM instrument");
	$atelierArray = databaseQuery("SELECT atl_id, atl_nom FROM atelier");
	$formuleArray = databaseQuery("SELECT fml_id, fml_nom, fml_num FROM formule");
	$communeArray = databaseQuery("SELECT cmn_id,cmn_nom FROM commune");
	$formationArray = databaseQuery("SELECT * FROM formation");
	$reductionArray = databaseQuery("SELECT rdc_id, rdc_nom, rdc_valeur, rdc_type FROM reductions");
	if (isset($_SESSION['user'])) {
		if(($_SESSION['user']!='admin')){
		echo "Vous n'êtes pas autorisé à voir ce contenu !";
			header("refresh:1;url=/index.php");
			die();
	}
	}else{
		echo "Vous devez vous connecter !";
			header("refresh:1;url=/index.php");
			die();
	}
	$currentPage = basename("/{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}", ".php");
	switch ($currentPage) {
			case "administration":
				$activeAdmin = 'class="active"';
				$activeEditer="";
				$activeForm="";
				break;
			default:
				$activeForm = "";
				$activeEditer="";
				$activeAdmin='class="active"';
	}
?>

<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}

	li {
		float: left;
		color: white;
	}

	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover:not(.active) {
		background-color: #111;
	}

	.active {
		background-color: #4CAF50;
	}
	.floatright {
    float:right;
}
</style>

<ul>
    <li><a <?php echo $activeAdmin ?> href="/administration.php">Administration</a></li>
	<li><a href="/login/logout.php">Se déconnecter</a></li>
	<div class="floatright">
                <li><?php include("countFamille.php"); ?> familles inscrites pour l'année en cours</li><br/>
				<li><?php include("countAdherent.php"); ?> adhérents inscrits pour l'année en cours</li>
    </div>
</ul>
