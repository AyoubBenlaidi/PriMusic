<!DOCTYPE html>
<html>
<head>
  <title>Formulaire formule</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
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

<style>
.years {
    border: solid #DDD 1px;
    margin-top: 2rem;
    max-width: 25rem;
    padding: 1rem;
  }
  @media screen and (min-width: 768px) {
    .years {
      max-width: 60rem;
    }
  }
  
  .yearblock {
    float: left;
    padding: 1rem;
  }
  .yearblock input[type='checkbox'] {
    position: absolute;
    visibility: hidden;
  }
  .yearblock input[type='checkbox']:hover + label {
    background: #eaeaea;
  }
  .yearblock input[type='checkbox']:checked + label {
    background: #337ab7;
    color: #FFF;
  }
  .yearblock input[type='checkbox']:checked + label:hover {
    background: #3b87c8;
  }
  .yearblock legend {
    margin-bottom: .5rem;
  }
  .yearblock label {
    background: #DDD;
    cursor: pointer;
    display: block;
    float: left;
    font-weight: normal;
    margin: 1px 0 0 1px;
    padding: .5rem 0;
    text-align: center;
    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
    width: calc(25% - 1px);
  }
  .yearblock label:nth-of-type(1), .yearblock label:nth-of-type(2), .yearblock label:nth-of-type(3), .yearblock label:nth-of-type(4) {
    margin-top: 0;
  }
  .yearblock label:nth-of-type(1), .yearblock label:nth-of-type(5), .yearblock label:nth-of-type(9) {
    margin-left: 0;
  }
  
</style>



</head>

<?php include("menu.php"); ?>

<body>
  <h2 style="text-align: center;" >Formulaire</h2>
  <div id="formPaiement" style="margin-left:10% ;width:70%; ">
  <form method="post" action="./ajouter/ajouterPaiement.php">
  <div class="form-group" >
    <label for="nom" class="control-label">Éditer la facture au nom de :</label> 
    <div class="input-group">
      <div class="input-group-addon">Nom</div> 
      <input id="nom_facture" name="nom_facture" type="text" class="form-control">
    </div>
  </div>
   
   
    <div align="justify">
      
        <div id="all" class="row" >
        <h3 class="col-10">  <input class="col-2" style="width:30px;height:30px;"type="checkbox" name="preinscription" value="preinscription"> Période de préinscription</h3> 
          </div>
          <div class="container">
          
	<div class="row">
		
        
        <div class="col-md-12">
     
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
            
                   <th>Formule </th>
                    <th>Quantité</th>
               
                     
                   </thead>
    <tbody>
    
    <?php
          for($i = 0, $size = count($formuleArray); $i < $size; $i++) {?>
          <tr>
      <!--    <td>
          <?php // echo $formuleArray[$i][2]; ?> </td> --> <td> <?php echo($formuleArray[$i][1]) ;?></td> 
          <td>
          <input type="number"  value="0" name="<?php echo $formuleArray[$i][2] ?>" /></td>
        
           
           
            <?php }  ?>
 
            </tr>

 
    
   
    
   
    
    </tbody>
        
</table>


        </div>
        <br/>
        <br/>
        <br/>
        <div class="form-group" >
  
    <div class="input-group">
      <div class="input-group-addon">Montant en chèques de vacances </div> 
      <input id="cheque" name="cheque" type="number" class="form-control">
    </div>
  </div>
  <div class="input-group">
  <div class="input-group-addon">Montant en liquide </div> 
  <input id="liquide" name="liquide" type="number" class="form-control">
</div>

       
       
       
        <br/>
    
<div id="monthSelect" class="row">
        <h4 class="col-12" >Payer en : 
       
        <select  name="nb_mois" id="nb_mois">
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
             mois </h4> </div>
        <br />

        <div id="all" class="row" >
        <h3 class="col-10">  <input class="col-2" style="width:30px;height:30px;"type="checkbox" id="checkAll" name="checkAll" value="checkAll"> Tout cocher</h3> 
          </div>

      
    
        <br/>
        <div class="calendar">
        <section class="row years clear  fix">
          <fieldset class="col-xs-12 col-sm-12 yearblock clearfix">
            <legend>Selectionnez les mois </legend>
            <input id="septembre" value="Septembre" type="checkbox" name="check_list[]"  />
            <label for="septembre" unselectable>Sep</label>
            <input id="octobre" value="Octobre" type="checkbox" name="check_list[]"  />
            <label for="octobre">Oct</label>
            <input id="novembre" value="Novembre" type="checkbox" name="check_list[]"  />
            <label for="novembre">Nov</label>
            <input id="decembre" value="Décembre" type="checkbox" name="check_list[]"  />
            <label for="decembre">Dec</label>
            <input id="janvier" value="Janvier" type="checkbox" name="check_list[]"  />
            <label for="janvier">Jan</label>
            <input id="fevrier" value="Février" type="checkbox" name="check_list[]"  />
            <label for="fevrier">Fev</label>
            <input id="mars" value="Mars" type="checkbox" name="check_list[]"  />
            <label for="mars">Mar</label>
            <input id="avril" value="Avril" type="checkbox" name="check_list[]"  />
            <label for="avril">Avr</label>
            <input id="mai" value="Mai" type="checkbox" name="check_list[]"  />
            <label for="mai">Mai</label>
            <input id="juin" value="Juin" type="checkbox" name="check_list[]"  />
            <label for="juin">Jui</label>
            
          </fieldset>
          
        </section>
        </div>
        
        
        <br />
        <br />
        <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
      </div>
    </div>
  </form>
  </div>
  <br /> <br />
</body>
</html>
