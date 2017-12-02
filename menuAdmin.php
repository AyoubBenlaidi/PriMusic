<?php session_start(); ?>
<?php include('menuAdminRecup.php'); ?>
<!-- Récupération de données pour la barre --> 
<!--
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
    <li><a  <?php echo $activeAdmin ?> href="/administration.php">Administration</a></li>
	<li><a href="/login/logout.php">Se déconnecter</a></li>
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
	  <span class="navbar-text">
      Navbar text with an inline element
    </span>
	<span class="navbar-text">
      Navbar text with an inline element
    </span>
	
      
    </ul>
	
  </div>
  <ul class="navbar-nav" >
  <li class="nav-item">
        <a class="nav-link" href="/login/logout.php">Se déconnecter </a>
      </li></ul>
</nav>
