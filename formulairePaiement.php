<!DOCTYPE html>
<html>
<head>
    <title>Formulaire formule</title>
    <meta charset="utf-8"/>

    <link rel="stylesheet" href="./ressources/bootstrap/css/bootstrap.min.css">
    <script src="./ressources/jquery-3.2.1.min.js"></script>
    <script src="./ressources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./ressources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./ressources/MDL/material.min.css">
    <script defer src="./ressources/MDL/material.min.js"></script>

    <script>
		function calculerTotal(){
			var donnees = $("#formPaiement > form").serialize();
			$.ajax({
            url: "./calculerTotal.php",
			data: donnees,
			method: "POST",
            success: function(result){
                $("#ajaxTotal").html(result);
            }
        });
		}
	
        $("document").ready(function () {
			calculerTotal();
			
			$(".formuleInput").on("change",calculerTotal);
			
            $('#checkAll').click(function (event) {
                var state = this.checked;
                $("input[name='check_list[]']").each(function () {
                    this.checked = state;
                });
            });

            $("form").on("submit",function(){
				checked = $("div.calendar input[type=checkbox]:checked").length;

				if(!checked) {
					alert("Merci de sélectionner au moins un mois.");
					return false;
				}
				
                $("div#bouton_retour").html('<a href="./formulaireFamille.php" class="btn btn-success btn-lg btn-block">Retour</a>');
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

<body>
<?php include("menu.php"); ?>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active"><a href="formulaireFamille.php">Accueil</a></li>
		<li class="breadcrumb-item active"><a href="formulaireFamilleAuto.php">Famille</a></li>
		<li class="breadcrumb-item active"><a href="retrouverAdherentsFamille.php">Adhérent</a></li>
		<li class="breadcrumb-item active" aria-current="page">Paiement</li>
	</ol>
</nav>
<h1 style="text-align: center;">Recapitulatif</h1>
    <div class="recap" style="width:70% ; display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5%;
        margin-bottom: 5%;

    ">
        <?php include('showMembre.php'); ?>
        <?php
            include("Query.php");
            $familleDataArray = databaseQuery('SELECT adh_instr1, adh_instr2, adh_atelier1, adh_atelier2, adh_formation FROM adherent WHERE adh_fml=\'' . $_SESSION['fml_id'] . '\'');
            $nbInstruSolf = 0;
            $nbInstruSeul = 0;
            $nbAtelierInstru = 0;
            $nbAtelierSeul = 0;
            $nbSolfegeSeul = 0;
            $nbEveilPresolf = 0;

            for($index = 0; $index < count($familleDataArray); ++$index){
                //Si il y a un instrument 1
                if($familleDataArray[$index][0] != null){

                    //Au moins 1 atelier
                    if($familleDataArray[$index][2] != null || $familleDataArray[$index][3] != null){
                        ++$nbAtelierInstru;
                    }

                    //Solfege
                    if($familleDataArray[$index][4] != null){
                        if($familleDataArray[$index][4] == 1 || $familleDataArray[$index][4] == 2){
                            ++$nbEveilPresolf;
                            ++$nbInstruSeul;
                        }else{
                            ++$nbInstruSolf;
                        }
                    }else{
                        ++$nbInstruSeul;
                    }

                    //Instrument 2
                    if($familleDataArray[$index][1] != null){

                        //2e instrument
                        ++$nbInstruSeul;

                        //2 ateliers avec instru
                        if($familleDataArray[$index][2] != null && $familleDataArray[$index][3] != null){
                            ++$nbAtelierInstru;
                        }
                    }else{

                        //1 atelier avec instru et 1 atelier seul
                        if($familleDataArray[$index][2] != null && $familleDataArray[$index][3] != null){
                            ++$nbAtelierSeul;
                        }
                    }
                }else{

                    //Si il n'y a pas d'instrument 1 mais qu'il y a un instrument 2
                    if($familleDataArray[$index][1]){

                        //Ateliers
                        if($familleDataArray[$index][2] != null || $familleDataArray[$index][3] != null){
                            //1 Atelier avec instrument
                            ++$nbAtelierInstru;

                            //1 Atelier seul
                            if($familleDataArray[$index][2] != null && $familleDataArray[$index][3] != null){
                                ++$nbAtelierSeul;
                            }
                        }

                        //Solfege
                        if($familleDataArray[$index][4] != null){
                            if($familleDataArray[$index][4] == 1 || $familleDataArray[$index][4] == 2){
                                ++$nbEveilPresolf;
                                ++$nbInstruSeul;
                            }else{
                                ++$nbInstruSolf;
                            }
                        }else{
                            ++$nbInstruSeul;
                        }
                    }else{

                        //Ateliers
                        if($familleDataArray[$index][2] != null || $familleDataArray[$index][3] != null){
                            //1 Atelier seul
                            ++$nbAtelierSeul;

                            //2 Atelier seul
                            if($familleDataArray[$index][2] != null && $familleDataArray[$index][3] != null){
                                ++$nbAtelierSeul;
                            }
                        }

                        //Solfege
                        if($familleDataArray[$index][4] != null){
                            if($familleDataArray[$index][4] == 1 || $familleDataArray[$index][4] == 2){
                                ++$nbEveilPresolf;
                            }else{
                                ++$nbSolfegeSeul;
                            }
                        }
                    }
                }
            }

            $tabRecap [] = $nbInstruSolf;
            $tabRecap [] = $nbInstruSeul;
            $tabRecap [] = 0;
            $tabRecap [] = $nbSolfegeSeul;
            $tabRecap [] = $nbEveilPresolf;
            $tabRecap [] = 0;
            $tabRecap [] = $nbAtelierSeul;
            $tabRecap [] = $nbAtelierInstru;
        ?>
    </div>
</h1>

<h2 style="text-align: center;">Formulaire</h2>

<div id="formPaiement" style="margin-left:10% ;width:70%; ">
    <form method="post" action="./ajouter/ajouterPaiement.php">
        <div class="form-group">
            <label for="nom" class="control-label">Éditer la facture au nom de :</label>
            <div class="input-group">
                <div class="input-group-addon">Nom</div>
                <input id="nom_facture" name="nom_facture" type="text" class="form-control">
            </div>
        </div>

        <div align="justify">

            <div id="all" class="row">
                <h3 class="col-10"><input class="col-2" style="width:30px;height:30px;" type="checkbox"
                                          name="preinscription" value="preinscription"> Période de préinscription</h3>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Formule</th>
                                <th>Quantité</th>
                                </thead>
                                <tbody>
                                <?php
                                for ($i = 0, $size = count($formuleArray);
                                $i < $size;
                                $i++) { ?>
                                <tr>
                                    <td> <?php echo($formuleArray[$i][1]); ?></td>
                                    <td>
                                        <input type="number" class="formuleInput" value="<?php echo($tabRecap[$i]) ?>" name="<?php echo $formuleArray[$i][2] ?>"/></td>
                                    <?php } ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>



                        <br/>
						<div id="ajaxTotal"></div>
						<br/><br/>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Montant en chèques de vacances</div>
                                <input id="cheque" name="cheque" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-group-addon">Montant en liquide</div>
                            <input id="liquide" name="liquide" type="number" class="form-control">
                        </div>

                        <br/>
                        <br/>

                        <div id="all" class="row">
                            <h3 class="col-10"><input class="col-2" style="width:30px;height:30px;" type="checkbox"
                                                      id="checkAll" name="checkAll" value="checkAll"> Tout cocher</h3>
                        </div>

                        <br/>
                        <div class="calendar">
                            <section class="row years clear  fix">
                                <fieldset class="col-xs-12 col-sm-12 yearblock clearfix">
                                    <legend>Selectionnez les mois</legend>
                                    <input id="septembre" value="Septembre" type="checkbox" name="check_list[]"/>
                                    <label for="septembre">Sep</label>
                                    <input id="octobre" value="Octobre" type="checkbox" name="check_list[]"/>
                                    <label for="octobre">Oct</label>
                                    <input id="novembre" value="Novembre" type="checkbox" name="check_list[]"/>
                                    <label for="novembre">Nov</label>
                                    <input id="decembre" value="Décembre" type="checkbox" name="check_list[]"/>
                                    <label for="decembre">Dec</label>
                                    <input id="janvier" value="Janvier" type="checkbox" name="check_list[]"/>
                                    <label for="janvier">Jan</label>
                                    <input id="fevrier" value="Février" type="checkbox" name="check_list[]"/>
                                    <label for="fevrier">Fev</label>
                                    <input id="mars" value="Mars" type="checkbox" name="check_list[]"/>
                                    <label for="mars">Mar</label>
                                    <input id="avril" value="Avril" type="checkbox" name="check_list[]"/>
                                    <label for="avril">Avr</label>
                                    <input id="mai" value="Mai" type="checkbox" name="check_list[]"/>
                                    <label for="mai">Mai</label>
                                    <input id="juin" value="Juin" type="checkbox" name="check_list[]"/>
                                    <label for="juin">Jui</label>

                                </fieldset>

                            </section>
                        </div>


                        <br/>
						<div id="bouton_retour" class="form-group"></div>
                        <br/>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">Valider
                            </button>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</form>
</div>
</body>
</html>
