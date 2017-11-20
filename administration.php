<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Administration</title>
  </head>
  <?php
    include("menuAdmin.php");

  ?>
  <body>

  <h1>Page d'administration</h1>

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

  </body>
</html>
