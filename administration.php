<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Administration</title>
		
	<link rel="stylesheet" href="./ressources/bootstrap/css/bootstrap.min.css">
	<script src="./ressources/jquery-3.2.1.min.js"></script>
	<script src="./ressources/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./ressources/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./ressources/MDL/material.min.css">
	<script defer src="./ressources/MDL/material.min.js"></script>

  </head>
  <body>
  <?php
    include("menuAdmin.php");
   
  ?>
 

<div class="container" style ="margin-top: 20px">
<div class="jumbotron">
            <div class="row">
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="professeur.php">Professeur</button><br>
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="instrument.php">Instrument</button><br>
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="atelier.php">Atelier</button><br>
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="formule.php">Formule</button><br>
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="reduction.php">Réduction</button><br>
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="commune.php">Commune</button><br>
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="formation.php">Formation musicale</button><br>
                    <button type="button" class="btn btn-primary btn-lg btn-block btn_load_ajax" lien="avance.php">Paramètres avancés</button><br>
              
                </div>
                <div class="col-sm-9 card" id="ajax_load_result">

                </div>
            </div>
        </div>
</div>



  </body>
</html>

<script <script type="text/javascript">

$( document ).ready(function() {
    $(".btn_load_ajax").click(function(){
        $.ajax({
            url: $(this).attr("lien"), 
            success: function(result){
                $("#ajax_load_result").html(result);
            }
        });
    });
});

</script>