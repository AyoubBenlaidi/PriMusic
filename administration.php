<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>




  </head>
  <body>
  <?php
    include("menuAdmin.php");

  ?>
 

  <!-- <h1>Page d'administration</h1> -->
<!--
  <h2>Professeur</h2>
  <?php include("professeur.php"); ?>

  <h2>Instrument</h2>
  <?php include("instrument.php"); ?>

  <h2>Atelier</h2>
  <?php include("atelier.php"); ?>

  <h2>Formule</h2>
  <?php include("formule.php"); ?>

  <h2>Réduction</h2>
  <?php include("reduction.php"); ?>

  <h2>Commune</h2>
  <?php include("commune.php"); ?>

  <h2>Formation musicale</h2>
  <?php include("formation.php"); ?>
-->
<div class="container">
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
</div>
</div>

  </body>
</html>
