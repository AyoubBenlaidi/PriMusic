<!DOCTYPE html>
<html>
<head>
  <title>Insérer</title>
  <meta charset="utf-8" />
  <style>
  label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: right;
    margin-bottom: 5px;
  }
  input, select {
    display: inline-block;
    float: left;
  }
  .submit{
    margin-bottom: 20px;

  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="scriptAdh.js"></script>
</head>
<?php
include("menu.php");
$currentArray = databaseQuery("SELECT adh_id,adh_fml, adh_nom, adh_prenom, adh_age, adh_instr1, adh_prof1, adh_instr2, adh_prof2, adh_atelier1, adh_atelier2, adh_formation, adh_classe, adh_seul, adh_sexe FROM adherent WHERE adh_id='" . $_POST['id'] . "'");
?>
<body>
  <h2>Modifier un adhérent</h2>
  <form method="post" action="/modifier/modifierAdherent.php">
    <div align="justify">
      <label>Numéro de famille :</label> <input type="number"  readonly="readonly" name="adh_fml" value = "<?php echo $currentArray[0][1];?>"/> <br />
      <label>Id :</label>  <input type="number"  readonly="readonly" name="adh_id" value = "<?php echo $currentArray[0][0];?>"/> <br />
      <label>Nom : </label> <input type="text" name="adh_nom" value = "<?php echo $currentArray[0][2];?>"/> <br />
      <label>Prénom :</label>  <input type="text" name="adh_prenom" value = "<?php echo $currentArray[0][3];?>"/> <br />
      <label>Date de naissance : </label> <input type="date" name="adh_age" value = "<?php echo $currentArray[0][4];?>"/> <br />
      <label>Sexe : </label>
      <label>Homme </label> <input type="radio" name="adh_sexe" value="homme" <?php if($currentArray[0][14]=="homme"){echo "checked";}?>>
      <label>Femme </label><input type="radio" name="adh_sexe" value="femme" <?php if($currentArray[0][14]=="femme"){echo "checked";}?>>
      <label>Instrument 1 : </label>
      <select name="adh_instr1" id="adh_instr1" >
        <?php
        for($i = 0, $size = count($instrArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $instrArray[$i][0] ?>"><?php echo $instrArray[$i][1] ?></option>
          <?php
        }
        ?>
      </select>

      <br/>

      <label>Professeur 1 : </label>
      <select name="adh_prof1" id="adh_prof1">
        <option value=""></option>
      </select>

      <br/>

      <label>Instrument 2 : </label>
      <select name="adh_instr2" id="adh_instr2">
        <option value=""></option>
        <?php
        for($i = 0, $size = count($instrArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $instrArray[$i][0] ?>"><?php echo $instrArray[$i][1] ?></option>
          <?php
        }
        ?>
      </select>

      <br/>

      <label>Professeur 2 : </label>
      <select name="adh_prof2" id="adh_prof2">
        <option value=""></option>
      </select>

      <br/>

      <label>Atelier 1 : </label>
      <select name="adh_atelier1" id="adh_atelier1">
        <option value=""></option>
        <?php
        for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $atelierArray[$i][0] ?>"><?php echo $atelierArray[$i][1] ?></option>
          <?php
        }
        ?>
      </select>

      <br/>

      <label>Atelier 2 : </label>
      <select name="adh_atelier2" id="adh_atelier2">
        <option value=""></option>
        <?php
        for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $atelierArray[$i][0] ?>"><?php echo $atelierArray[$i][1] ?></option>
          <?php
        }
        ?>
      </select>

      <br/>

      <label>Classe solfège : </label>
      <select name="adh_formation" id="adh_formation">
        <option value=""></option>
        <?php
        for($i = 0, $size = count($formationArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $formationArray[$i][0] ?>"><?php echo $formationArray[$i][1] ?></option>
          <?php
        }
        ?>
      </select>

      <br/>

      <label>Classe : </label>
      <input type="text" name="adh_classe" /> <br />
      <label>Rentre seul : </label>
      <input type="text" name="adh_seul" /> <br />
      <label></label>
      <input type="submit" value="Valider" />
    </div>
  </form>
</body>
</html>
