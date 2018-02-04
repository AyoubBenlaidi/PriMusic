<input type="hidden"  name="adh_fml[]" value = "<?php echo $_SESSION['fml_id'];?>"/> <br/>
<div class="form-group">
  <label class="control-label col-xs-4" for="adh_nom" />Nom</label> 
  <div class="col-xs-8">
    <input id="adh_nom" name="adh_nom[]" type="text" value = "<?php echo $_SESSION['fml_nom'];?>" class="form-control" required="required">
  </div>
</div>

<div class="form-group">
  <label for="adh_prenom" class="control-label col-xs-4">Prenom</label> 
  <div class="col-xs-8">
    <input id="adh_prenom" name="adh_prenom[]" type="text" class="form-control">
  </div>
</div>

<div class="form-group">
  <label for="adh_age" class="control-label col-xs-4">Date de naissance</label> 
  <div class="col-xs-8">
    <div class="input-group">
      <input id="adh_age" name="adh_age[]" type="date" class="form-control"> 
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label for="adh_sexe" class="control-label col-xs-4">Sexe</label> 
  <div class="col-xs-8">
    <select id="adh_sexe" name="adh_sexe[]" class="select form-control"> 
		<option value="homme">Homme</option>
		<option value="femme">Femme</option>
	</select>
  </div>
</div>



<div class="form-group">
  <label for="adh_instr1" class="control-label col-xs-4">Instrument n°1</label> 
  <div class="col-xs-8">
    <select id="adh_instr1" name="adh_instr1[]" class="select form-control">
		<option value=""></option>
        <?php
        for($i = 0, $size = count($instrArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $instrArray[$i][0] ?>"><?php echo $instrArray[$i][1] ?></option>
          <?php
        }
        ?>
    </select>
  </div>
</div>
<div class="form-group">
  <label for="adh_prof1" class="control-label col-xs-4">Professeur n°1</label> 
  <div class="col-xs-8">
    <select id="adh_prof1" name="adh_prof1[]" class="select form-control">
		<option value=""></option>
        <?php
        for($i = 0, $size = count($profArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $profArray[$i][0] ?>"><?php echo $profArray[$i][1]." ".$profArray[$i][2] ?></option>
          <?php
        }
        ?>      
    </select>
  </div>
</div>
<div class="form-group">
  <label for="adh_instr2" class="control-label col-xs-4">Instrument n°2</label> 
  <div class="col-xs-8">
    <select id="adh_instr2" name="adh_instr2[]" class="select form-control">
		<option value=""></option>
        <?php
			for($i = 0, $size = count($instrArray); $i < $size; $i++) {
		?>
				<option value="<?php echo $instrArray[$i][0] ?>"><?php echo $instrArray[$i][1] ?></option>
		<?php
			}
        ?>
	</select>
  </div>
</div>
<div class="form-group">
  <label for="adh_prof2" class="control-label col-xs-4">Professeur n°2</label> 
  <div class="col-xs-8">
    <select id="adh_prof2" name="adh_prof2[]" class="select form-control"> <option value=""></option>
        <?php
        for($i = 0, $size = count($profArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $profArray[$i][0] ?>"><?php echo $profArray[$i][1]." ".$profArray[$i][2] ?></option>
          <?php
        }
        ?>   
	</select>
  </div>
</div>
<div class="form-group">
  <label for="adh_atelier1" class="control-label col-xs-4">Atelier n°1</label> 
  <div class="col-xs-8">
    <select id="adh_atelier1" name="adh_atelier1[]" class="select form-control">
		<option value=""></option>
        <?php
        for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $atelierArray[$i][0] ?>"><?php echo $atelierArray[$i][1] ?></option>
          <?php
        }
        ?>
    </select>
  </div>
</div>   
<div class="form-group">
  <label for="adh_atelier2" class="control-label col-xs-4">Atelier n°2</label> 
  <div class="col-xs-8">
    <select id="adh_atelier2" name="adh_atelier2[]" class="select form-control">
		<option value=""></option>
        <?php
        for($i = 0, $size = count($atelierArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $atelierArray[$i][0] ?>"><?php echo $atelierArray[$i][1] ?></option>
          <?php
        }
        ?>
    </select>
  </div>
</div>
<div class="form-group">
  <label for="adh_formation" class="control-label col-xs-4">Classe de solfège</label> 
  <div class="col-xs-8">
    <select id="adh_formation" name="adh_formation[]" class="select form-control">
		<option value=""></option>
        <?php
        for($i = 0, $size = count($formationArray); $i < $size; $i++) {
          ?>
          <option value="<?php echo $formationArray[$i][0] ?>"><?php echo $formationArray[$i][1] ?></option>
          <?php
        }
        ?>
    </select>
  </div>
</div>
<div class="form-group">
  <label for="adh_classe" class="control-label col-xs-4">Classe</label> 
  <div class="col-xs-8">
    <select id="adh_classe" name="adh_classe[]" class="select form-control">
      <option value=""></option>
      <option value="CP">CP</option>
      <option value="CE1">CE1</option>
      <option value="CE2">CE2</option>
      <option value="CM1">CM1</option>
      <option value="CM2">CM2</option>
      <option value="6e">6e</option>
      <option value="5e">5e</option>
      <option value="4e">4e</option>
      <option value="3e">3e</option>
      <option value="2nd">2nd</option>
      <option value="Terminale">Terminale</option>
      <option value="Adulte">Adulte</option>
    </select>
  </div>
</div>
<div class="form-group row">
  <div class="col-4"><label for="adh_seul" class="control-label">Rentre seul</label> </div>
  <div class="col-8">
      <input type="checkbox" name="adh_seul[]" value="oui">
  </div>
</div>   




     