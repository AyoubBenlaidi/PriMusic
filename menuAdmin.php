<?php session_start(); ?>
<?php include('menuAdminRecup.php'); ?>

<!--
<ul>
   
	
	<div class="floatright">
                <li><?php include("countFamille.php"); ?> familles inscrites pour l'année en cours</li><br/>
				<li><?php include("countAdherent.php"); ?> adhérents inscrits pour l'année en cours</li>
    </div>
</ul>
-->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" <?php echo $activeAdmin ?> href="/administration.php">Administration</a>

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
