<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Administration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

  </head>
  <body>
  <?php
    include("menuAdmin.php");

  ?>
 

<div class="container" style ="margin-top: 20px">
<div class="jumbotron">
            <div class="row">
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-block btn_load_ajax" lien="professeur.php">Professeur</button><br>
                    <button type="button" class="btn btn-primary btn-block btn_load_ajax" lien="instrument.php">Instrument</button><br>
                    <button type="button" class="btn btn-primary btn-block btn_load_ajax" lien="atelier.php">Atelier</button><br>
                    <button type="button" class="btn btn-primary btn-block btn_load_ajax" lien="formule.php">Formule</button><br>
                    <button type="button" class="btn btn-primary btn-block btn_load_ajax" lien="reduction.php">Réduction</button><br>
                    <button type="button" class="btn btn-primary btn-block btn_load_ajax" lien="commune.php">Commune</button><br>
                    <button type="button" class="btn btn-primary btn-block btn_load_ajax" lien="formation.php">Formation musicale</button><br>
                </div>
                <div class="col-sm-9" id="ajax_load_result">

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