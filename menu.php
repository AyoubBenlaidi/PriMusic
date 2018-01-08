<?php session_start(); ?>
<?php
include("Query.php");
$profArray = databaseQuery("SELECT prof_id,prof_nom,prof_prenom FROM professeur");
$instrArray = databaseQuery("SELECT instr_id, instr_nom FROM instrument");
$atelierArray = databaseQuery("SELECT atl_id, atl_nom FROM atelier");
$formuleArray = databaseQuery("SELECT fml_id, fml_nom, fml_num FROM formule");
$communeArray = databaseQuery("SELECT cmn_id,cmn_nom,cmn_zip FROM commune");
$zipArray=databaseQuery("SELECT DISTINCT cmn_zip from commune") ;
$formationArray = databaseQuery("SELECT * FROM formation");
$reductionArray = databaseQuery("SELECT rdc_id, rdc_nom, rdc_valeur, rdc_type FROM reductions");
if (isset($_SESSION['user'])) {
if(($_SESSION['user']!='membre')){
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
	case "formulaireFamille":
		$activeForm = 'class="active"';
		$activeEditer="";
		$activeAdmin="";
		break;
		case "liste":
		$activeEditer = 'class="active"';
		$activeForm="";
		$activeAdmin="";
		break;
		default:
		$activeForm = "class='active'";
		$activeEditer="";
		$activeAdmin="";
	}
	?>


<!--
<ul>
   
	
	<div class="floatright">
                <li><?php include("countFamille.php"); ?> familles inscrites pour l'année en cours</li><br/>
				<li><?php include("countAdherent.php"); ?> adhérents inscrits pour l'année en cours</li>
    </div>
</ul>
-->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" <?php echo $activeAdmin ?> href="/formulaireFamille.php">Formulaire</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <!--<li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>-->
	  <span style="margin-left: 50px" class="navbar-text">
      <?php include("countFamille.php"); ?> familles inscrites pour l'année en cours
    </span>
	<span style="margin-left: 20px"></span>
	<span class="navbar-text">
	<?php include("countAdherent.php"); ?> adhérents inscrits pour l'année en cours
    </span>
	
      
    </ul>
	
  </div>
  <ul class="navbar-nav" >
  <li class="nav-item">
        <a class="nav-link" href="/login/logout.php">Se déconnecter </a>
      </li></ul>
</nav>
