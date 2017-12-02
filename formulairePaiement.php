<!DOCTYPE html>
<html>
<head>
  <title>Formulaire formule</title>
  <meta charset="utf-8" />
  <style>
  #all label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: right;
    margin-bottom: 5px;
  }
  #all input,select{
    display: inline-block;
    float: left;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
  $("document").ready(function(){
    $('#checkAll').click(function(event) {
      var state = this.checked;
      $("input[name='check_list[]']").each(function() {
        this.checked = state;
      });
    });
  });
  </script>
</head>

<?php include("menu.php"); ?>

<body>
  <h2>Formulaire</h2>
  <form method="post" action="/ajouter/ajouterPaiement.php">
    <div align="justify">
      <p>
        <div id="all">
          <input type="checkbox" name="preinscription" value="preinscription"> Période de préinscription <br/><br/>
          <?php
          for($i = 0, $size = count($formuleArray); $i < $size; $i++) {?><label><?php
            echo $formuleArray[$i][2],' : ',$formuleArray[$i][1], ' ';?> </label><input type="number"  value="0" name="<?php echo $formuleArray[$i][2] ?>" /><br/>
            <?php
          }
          ?>
        </div>
        <br/>
        <br/>
        <br/>
        <label>Montant chèque vacances : </label><input type="number" name="cheque" value="0"/>
        <label>Montant liquide : </label><input type="number" name="liquide" value="0"/>
        <br/>
        <label></label>
        <br/>
        <label>Payer en : </label>
        <br/>
        <select name="nb_mois" id="nb_mois">
          <?php
          $i = 1;
          while($i<11)
          {
            ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php
            $i = $i +1;
          }
          ?>
        </select>
        <label>      mois </label>
        <br /></br>
        <input type="checkbox" id="checkAll">Tout cocher</input>
        <br/>
        <br>
        <input type="checkbox" name="check_list[]" value="Septembre" id="septembre"> Septembre <br/>
        <input type="checkbox" name="check_list[]" value="Octobre" id="octobre"> <label>Octobre</label> <br/>
        <input type="checkbox" name="check_list[]" value="Novembre" id="novembre"> <label>Novembre</label> <br/>
        <input type="checkbox" name="check_list[]" value="Décembre" id="decembre"> <label>Décembre</label> <br/>
        <input type="checkbox" name="check_list[]" value="Janvier" id="janvier"> <label>Janvier</label> <br/>
        <input type="checkbox" name="check_list[]" value="Février" id="fevrier"> <label>Février</label> <br/>
        <input type="checkbox" name="check_list[]" value="Mars" id="mars"> <label>Mars </label><br/>
        <input type="checkbox" name="check_list[]" value="Avril" id="avril"> <label>Avril</label> <br/>
        <input type="checkbox" name="check_list[]" value="Mai" id="mai"> <label>Mai</label> <br/>
        <input type="checkbox" name="check_list[]" value="Juin" id="juin"> <label>Juin</label> <br/>
        <label></label>
        <br/>
        <label>Éditer la facture au nom de : </label><input type="text" name="nom_facture"/>
        <input type="submit" value = "Valider" />
      </p>
    </div>
  </form>
</body>
</html>
